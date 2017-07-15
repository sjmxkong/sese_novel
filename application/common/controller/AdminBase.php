<?php
namespace app\common\controller;

use app\admin\model\Aricle as AricleModel;
use app\admin\model\Books as BooksModel;
use app\admin\model\Agent as AgentModel;
use app\common\tools\Strings;
use think\Config;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

/**
 *
 */
class AdminBase extends Controller
{
    protected $userRow = [];
    /**
     * [__construct description]
     * @author yongle
     * @dateTime 2016-05-23T15:07:02+0800
     */
    public function __construct()
    {
        parent::__construct();

        // defined('IS_AJAX') or define('IS_AJAX', Request::instance()->isAjax());
        defined('STATIC_PATH') or define('STATIC_PATH', dirname(ROOT_PATH) . DS . 'static');
        
        defined('CODE_DIR') or define('CODE_DIR', '/data/www/cache.dushu5.com/');

        // 当前位置
        $this->getBreadcrumb();
        //userRow赋值
        $this->userRow = Session::get(Config::get('login_session_identifier'));
    }

    /**
     * 退出登录
     * @author yongle
     * @dateTime 2016-05-16T17:38:10+0800
     * @return   [type]                   [description]
     */
    public function logout()
    {
        Session::clear();

        return $this->success('退出成功！', '/admin/common/login');
    }

    /**
     * 获取当前位置
     * @author yongle
     * @dateTime 2016-05-18T09:33:02+0800
     * @return   [type]                          [description]
     */
    protected function getBreadcrumb()
    {
        $breadcrumb = [];

        $request = Request::instance();
        $rule    = $request->controller() . '/' . $request->action();

        $isHere = Db::table('__RULE__')
            ->field('parent_id,title,name')
            ->where('name', $rule)->find();

        if (empty($isHere)) {
            return false;
        }

        if ($isHere['parent_id'] !== 0) {
            $breadcrumb[] = Db::table('__RULE__')
                ->field('parent_id,title,name')
                ->where('id', $isHere['parent_id'])->find();
        }

        $breadcrumb[] = $isHere;

        $this->assign('breadcrumb', $breadcrumb);
    }

    protected function cacheBook($bid){
         $book = BooksModel::get($bid);
         Strings::makeCache($bid,$book,'books');

         $bookChap = AricleModel::field('id,title,sortid,isfree')->where(['bid'=>$bid,'ischeck'=>1])->order(['sortid'=>'desc'])->select();
         foreach ($bookChap as $val) {
             $chaps[$val['sortid']]['id']=$val['id'];
             $chaps[$val['sortid']]['title']=$val['title'];
             $chaps[$val['sortid']]['sortid']=$val['sortid'];
             $chaps[$val['sortid']]['isfree']=$val['isfree'];
         }
         unset($bookChap);
         Strings::makeCache($bid,$chaps,'chaps');
    }

    protected function cacheBookAricle($bid){
        $storys = AricleModel::where(['bid'=>$bid])->select();
        foreach($storys as $story){
            $this->cacheAricle($story['id'],$story);
        }
        unset($storys);
    }

    protected function cacheAricle($id,$story=''){
        if(!$story){
             $story = AricleModel::get($id);
        }
        $dir=Strings::getAricleDir($id);
        Strings::makeCache($id,$story,$dir);
    }

    protected function cacheIndex(){
        $field = 'bid,catid,bookname,author,litpic,create_time,description';
        $fieldArr = explode(',',$field);

        $data = BooksModel::field($field)->where(['ischeck'=>1])->order(['iscommend'=>'desc'])->limit(8)->select();
        foreach ($data as $key=>$val) {
            foreach ($fieldArr as $k) {
                if($key>0 && $k=='description') continue;
                $indexCommend[$key][$k]=$val[$k];
            }
        }
        Strings::makeCache('indexCommend',$indexCommend,'datas');

        $data = BooksModel::field($field)->where(['ischeck'=>1])->order(['isnew'=>'desc'])->limit(8)->select();
        foreach ($data as $key=>$val) {
            foreach ($fieldArr as $k) {
                //if($key>0 && $k=='description') continue;
                $indexNew[$key][$k]=$val[$k];
            }
        }
        Strings::makeCache('indexNew',$indexNew,'datas');

        $data = BooksModel::field($field)->where(['ischeck'=>1])->order(['ishot'=>'desc'])->limit(8)->select();
        foreach ($data as $key=>$val) {
            foreach ($fieldArr as $k) {
                //if($key>0 && $k=='description') continue;
                $indexClick[$key][$k]=$val[$k];
            }
        }
        Strings::makeCache('indexClick',$indexClick,'datas');
        
        $this->cacheAppIndex();
    }
    
    protected function cacheAppIndex(){
    	$field = 'bid,catid,bookname,author,litpic,create_time,description';
    	$fieldArr = explode(',',$field);
    
    	$data = BooksModel::field($field)->where(['ischeck'=>1])->order(['iscommend'=>'desc'])->limit(8)->select();
    	foreach ($data as $key=>$val) {
    		foreach ($fieldArr as $k) {
    			$appIndexBannerList[$key][$k]=$val[$k];
    			$appIndexFinishList[$key][$k]=$val[$k];
    			if($key>0 && $k=='description') continue;
    			$appIndexHotList[$key][$k]=$val[$k];
    			$appIndexFreeList[$key][$k]=$val[$k];
    			$appIndexVipList[$key][$k]=$val[$k];
    			if($k=='description') continue;
    			$appIndexGodList[$key][$k]=$val[$k];
    			$appIndexEditorList[$key][$k]=$val[$k];
    		}
    	}
    	Strings::makeCache('appIndexBannerList',$appIndexBannerList,'datas');
    	Strings::makeCache('appIndexHotList',$appIndexHotList,'datas');
    	Strings::makeCache('appIndexGodList',$appIndexGodList,'datas');
    	Strings::makeCache('appIndexFreeList',$appIndexFreeList,'datas');
    	Strings::makeCache('appIndexEditorList',$appIndexEditorList,'datas');
    	Strings::makeCache('appIndexVipList',$appIndexVipList,'datas');
    	Strings::makeCache('appIndexFinishList',$appIndexFinishList,'datas');
    }
    
    
    
    
	
	protected function cacheMaterial(){
        $material = AgentModel::table('__MATERIAL__')->field('bid,title,type,state')->select();
		$i=0;
        foreach($material as $ma){
			$data[$ma['type']][$i]['bid']=$ma['bid'];
			$data[$ma['type']][$i]['title']=$ma['title'];
			$data[$ma['type']][$i]['state']=$ma['state'];
			$i++;
		}
		Strings::makeCache('materialCache',$data,'datas');
    }
}
