<?php
namespace app\admin\controller;

use app\admin\model\Aricle as AricleModel;
use app\admin\model\Books as BooksModel;
use app\common\controller\AdminBase;
use think\Loader;
use think\Request;
use think\Url;

class Cache extends AdminBase
{
    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-08-30T10:39:15+0800
     * @return [type] [description]
     */
    public function index()
    {
		$request = Request::instance();
		if ($request->isAjax()) {
            $params = $request->param();
            if($params['ctype']==4){
                $this->cacheIndex();
            } else {
                if($params['bids']){
                    foreach ($params['bids'] as $bid) {
                        if($params['ctype']==1 || $params['ctype']==3){
                            $this->cacheBook($bid);
                        }
                        if($params['ctype']==2 || $params['ctype']==3){
                            $this->cacheBookAricle($bid);
                        }
                    }
                }
            }
            return $this->success('缓存更新成功');
        }
		
        $booklist1 = Loader::model('Books')::where('ischeck','>=',1)->order('bid','desc')->select();
        $this->assign('booklist1', $booklist1);

        $booklist2 = Loader::model('Books')::where('ischeck',0)->order('bid','desc')->select();
        $this->assign('booklist2', $booklist2);

        return $this->fetch();
    }

    
}
