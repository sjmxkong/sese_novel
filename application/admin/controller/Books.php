<?php
namespace app\admin\controller;

use app\admin\model\Books as BooksModel;
use app\common\controller\AdminBase;
use app\common\tools\Strings;
use think\Config;
use think\Loader;
use think\Request;
use think\Url;

/**
 *
 */
class Books extends AdminBase
{
    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-08-26T14:10:45+0800
     * @return [type] [description]
     */
    public function index()
    {
		$wh=$query=array();
        if(input('get.kw')){
			$query['kw']=input('get.kw');
            $wh['bookname']=array('LIKE','%'.input('get.kw').'%');
        }
		$query['order']=input('get.order');
		switch($query['order']){
			case '2':
				$order=array('charnum'=>'desc');
			break;
			case '3':
				$order=array('ischeck'=>'asc');
			break;
			case '4':
				$order=array('status'=>'asc');
			break;
			case '5':
				$order=array('iscommend'=>'desc');
			break;
            case '6':
                $order=array('isnew'=>'desc');
            break;
            case '7':
                $order=array('ishot'=>'desc');
            break;
            case '8':
                $order=array('update_time'=>'desc');
            break;
			default:
				$query['order']=1;
				$order=array('bid'=>'desc');
			break;
		}
		if(input('get.catid')>0){
			$query['catid']=$wh['catid']=input('get.catid');
		}
		if(input('get.bid')>0){
			$query['bid']=$wh['bid']=input('get.bid');
		}
        $bookLists = BooksModel::listField()->where($wh)->order($order)->paginate(10,false,array('query' => $query));
        $this->assign('bookLists', $bookLists);
        $this->assign('pages', $bookLists->render());
		$query['page']=input('get.page');
		$query['gourl']=http_build_query($query);
        $this->assign('query', $query);
		
		$result = Loader::model('Category')::select();
		foreach($result as $re){
			$cataRow[$re['id']]=$re['title'];
		}
        $this->assign('cataRow', $cataRow);
        return $this->fetch();
    }


    public function add()
    {
        $request = Request::instance();
        if ($request->isAjax()) {
            $params = $request->param();

            if (loader::validate('Books')->scene('add')->check($params) === false) {
                return $this->error(loader::validate('Books')->getError());
            }

            if (($pageId = Loader::model('Books')->booksAdd($params)) === false) {
                return $this->error(Loader::model('Books')->getError());
            }

            Loader::model('BackstageLog')->record("添加图书：[{$pageId}]");

            return $this->success('图书添加成功', Url::build('admin/books/index'));
        }

        $cataRow = Loader::model('Category')::select();
        $this->assign('cataRow', $cataRow);

        return $this->fetch();
    }


    public function edit($bid)
    {
        $request = Request::instance();
        $book = BooksModel::get($bid);

        if ($request->isAjax()) {
            $params       = $request->param();
            $params['bid'] = $bid;

            if (loader::validate('Books')->scene('edit')->check($params) === false) {
                return $this->error(loader::validate('Books')->getError());
            }

            if (($pageId = Loader::model('Books')->booksEdit($params)) === false) {
                return $this->error(Loader::model('Books')->getError());
            }
            Loader::model('BackstageLog')->record("修改图书：[{$bid}]");
            if($params['bookname']!=$book['bookname']){
                Loader::model('Books')->booknameEdit($bid,$params['bookname']);
                $this->cacheBookAricle($bid);
            }
            if($params['catid']!=$book['catid']){
                Loader::model('Books')->catidEdit($bid,$params['catid']);
                $this->cacheBookAricle($bid);
            }
            //缓存
            $this->cacheBook($bid);

            return $this->success('图书修改成功', Url::build('admin/books/index').'?'.$params['gourl']);
        }     

        $this->assign('book', $book);

		$cataRow = Loader::model('Category')::select();
        $this->assign('cataRow', $cataRow);

        $this->assign('imgUrl', Config::get('imgUrl'));
		$this->assign('gourl',$request->param()['gourl']);

        return $this->fetch();
    }

 
    public function destroy($bid)
    {
        $booksModel = Loader::model('Books');

        if ($booksModel->deleteBooks($bid) === false) {
            return $this->error($booksModel->getError());
        }
        Loader::model('BackstageLog')->record("删除图书,ID:[{$bid}]");

        return $this->success('图书删除成功', Url::build('admin/books/index'));
    }
	
	  public function editcommend()
    {
         $request = Request::instance();
         if ($request->isAjax()) {
            $params       = $request->param();
            $booksModel = Loader::model('Books');
            if (($id = $booksModel->commendEdit($params)) === false) {
                echo $booksModel->getError(); exit;
            }
            $this->cacheIndex();
            echo 1; exit;
        }
        echo 0; exit;
    }
	
	 public function feedback()
    {
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m-d');
        $query['tdate']=$tdate;
        $wh.=" and addtime>=".strtotime($tdate);
        $edate=input('get.edate');
        if(!$edate) $edate=date('Y-m-d');
        $query['edate']=$edate;
        $wh.=" and addtime<=".strtotime($edate.' 23:59:59');
		$ischeck=input('get.ischeck')+0;
		$query['ischeck']=$ischeck;
		$wh.=" and ischeck='$ischeck'";
        $this->assign('query', $query);
		$this->assign('feedType', array('-1'=>'已拒绝','0'=>'未审核','1'=>'已审核'));
		$data=Loader::model('Books')->feedback($wh);
        $this->assign('data', $data);
		$res = BooksModel::field('bid,bookname')->order('bid','desc')->select();
		foreach($res as $r){
			$bookList[$r['bid']]=$r['bookname'];
		}
        $this->assign('bookList', $bookList);
        
        return $this->fetch();
    }

	 public function feedback_add()
    {
		$request = Request::instance();
		if ($request->isAjax()) {
            $params = $request->param();
			if($params['ids']){
				$ids=implode(',',$params['ids']);
				$type=$params['type'];
				$result = Loader::model('Books')->feedback_add($ids,$type);
				if($result){
					return $this->success('批量操作成功');
				} else {
					return $this->error('批量操作失败');
				}
			} else {
				return $this->error('未勾选评论');
			}  
        }
		return $this->error('非法提交');
		exit;
    }

}
