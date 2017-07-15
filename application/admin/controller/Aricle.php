<?php
namespace app\admin\controller;

use app\admin\model\Aricle as AricleModel;
use app\admin\model\Books as BooksModel;
use app\common\controller\AdminBase;
use app\common\tools\Strings;
use think\Config;
use think\Loader;
use think\Request;
use think\Url;

class Aricle extends AdminBase
{

    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-08-26T10:40:30+0800
     * @return [type] [description]
     */
    public function index()
    {
        $wh=$query=array();
        if(input('get.bid')>0){
             $wh['bid']=$query['bid']=input('get.bid');
        }
		if(input('get.kw')){
             $wh['body']=array('like','%'.input('get.kw').'%');
			 $query['kw']=input('get.kw');
        }
		if(input('get.sid')>0){
             $wh['sortid']=array('>=',input('get.sid'));
			 $query['sid']=input('get.sid');
        }
        $query['order']=input('get.order');
        switch ($query['order']) {
            case '1':
                $order=array('bid,sortid'=>'desc');
            break;
            case '3':
                $order=array('bid,charnum'=>'desc');
            break;
            case '4':
                $order=array('bid,charnum'=>'asc');
            break;
            default:
                $query['order']=2;
                $order=array('bid,sortid'=>'asc');
            break;
        }
		if(input('get.pnum')){
             $pnum=input('get.pnum');
        } else {
			 $pnum=10;
		}
		$query['pnum']=$pnum;
        $aricleRows = AricleModel::listField()->where($wh)->order($order)->paginate($pnum,false,array('query' => $query));
        $this->assign('aricleRows', $aricleRows);
        $this->assign('pages', $aricleRows->render());
        $bookList = BooksModel::field('bid,bookname')->order('bid','desc')->select();
        $this->assign('bookList', $bookList);
		$query['page']=input('get.page');
		$query['gourl']=http_build_query($query);
        $this->assign('query', $query);
		$this->assign('webUrl', Config::get('webUrl'));
        return $this->fetch();
    }


    public function add()
    {
        $request = Request::instance();

        if ($request->isAjax()) {
            $params = $request->param();

            if (loader::validate('Aricle')->scene('add')->check($params) === false) {
                return $this->error(loader::validate('Aricle')->getError());
            }

            $row = BooksModel::field('bookname')->where(['bid'=>$params['bid']])->find();
            $params['bookname'] = $row['bookname'];

            if (($aricleId = Loader::model('Aricle')->aricleAdd($params)) === false) {
                return $this->error(Loader::model('Aricle')->getError());
            }

            Loader::model('BackstageLog')->record("添加文章：[{$aricleId}]");

            return $this->success('文章添加成功', Url::build('admin/aricle/index'));
        }

        $bookList = BooksModel::field('bid,bookname')->order('bid','desc')->select();
        $this->assign('bookList', $bookList);
		$this->assign('bid', $request->param()['bid']);

        return $this->fetch();
    }

 
    public function edit($id)
    {
        $request = Request::instance();
       
        if ($request->isAjax()) {
            $params       = $request->param();
            $params['id'] = $id;

            if (loader::validate('Aricle')->scene('edit')->check($params) === false) {
                return $this->error(loader::validate('Aricle')->getError());
            }
            $aricleModel = Loader::model('Aricle');

            if (($aricleId = $aricleModel->aricleEdit($params)) === false) {
                return $this->error($aricleModel->getError());
            }

            Loader::model('BackstageLog')->record("修改文章：[{$aricleId}]");

            $charnum = $aricleModel->getBookCharnum($params['bid']);
            Loader::model('Books')->updateBookCharnum($params['bid'],$charnum);

            //缓存
            $this->cacheBook($params['bid']);
            $this->cacheAricle($id);

            return $this->success('文章修改成功', Url::build('admin/aricle/index').'?'.$params['gourl']);
        }

        $aricleRow   = AricleModel::get($id);

        $this->assign('aricleRow', $aricleRow);
		$this->assign('gourl',$request->param()['gourl']);
		
        return $this->fetch();
    }

    public function destroy($id)
    {
		$request = Request::instance();

        if (Loader::model('Aricle')->deleteAricle($id) === false) {
            return $this->error(Loader::model('Aricle')->getError());
        }
        Loader::model('BackstageLog')->record("删除文章,ID:[{$id}]");

        return $this->success('文章添加成功', Url::build('admin/aricle/index').'?'.$request->param()['gourl']);
    }

    public function edittitle()
    {
         $request = Request::instance();
         if ($request->isAjax()) {
            $params       = $request->param();
            $aricleModel = Loader::model('Aricle');
            if (($aricleId = $aricleModel->titleEdit($params)) === false) {
                echo $aricleModel->getError(); exit;
            }
            echo 1; exit;
        }
        echo 0; exit;
    }
	
	 public function editall()
    {
		$request = Request::instance();
		if ($request->isAjax()) {
            $params = $request->param();
            if(!$params['etype']){
				 return $this->error('未选择更新选项');
			}
			if($params['aids']){
				$ids=implode(',',$params['aids']);
				switch($params['etype']){
					case 1: $up['isfree']=0;break;
					case 2: $up['isfree']=1;break;
					case 3: $up['ischeck']=1;break;
					case 4: $up['ischeck']=0;break;
					default:return $this->error('选择更新选项选择错误');break;
				}
				$result = AricleModel::where('id','in',$ids)->update($up);
				if($result){
					foreach($params['aids'] as $id){
						$this->cacheAricle($id);
					}
					return $this->success('批量更新状态成功，请及时更新图书缓存');
				}
			} else {
				return $this->error('未勾选文章内容');
			}  
        }
		return $this->error('批量更新失败');
		exit;
    }
}
