<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Config;
use think\Loader;
use think\Request;
use think\Url;
use think\Session;

/**
 *
 */
class Agent extends AdminBase
{
    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-09-01T14:10:45+0800
     * @return [type] [description]
     */
    
    private function getAdminid(){
        return Session::get(Config::get('login_session_identifier') . '.id');
    }
    
    public function index()
    {
		$wh=$query=array();
        if(input('get.kw')){
            $query['kw']=input('get.kw');
            $wh['agent_name']=array('LIKE','%'.input('get.kw').'%');
        }
        if($this->getAdminid()>5){
            $query['author']=$wh['author']=$this->getAdminid();
        } else if(input('get.author')){
            $query['author']=$wh['author']=input('get.author');
        }

        $agentLists = Loader::model('Agent')::where($wh)->order('agent_id desc')->paginate(10,false,array('query' => $query));
        $this->assign('agentLists', $agentLists);
        $this->assign('pages', $agentLists->render());
        $query['page']=input('get.page');
        $query['gourl']=http_build_query($query);
        $this->assign('query', $query);

        $this->assign('authorArr', Loader::model('Agent')->getAuthor());

        return $this->fetch();
    }


    public function add()
    {
        $request = Request::instance();
        if ($request->isAjax()) {
            $params = $request->param();
            $params['author'] = Session::get(Config::get('login_session_identifier') . '.id');

            if (loader::validate('Agent')->scene('add')->check($params) === false) {
                return $this->error(loader::validate('Agent')->getError());
            }
            if (($agent_id = Loader::model('Agent')->agentAdd($params)) === false) {
                return $this->error(Loader::model('Agent')->getError());
            }

            Loader::model('BackstageLog')->record("添加渠道：[{$agent_id}]");

            return $this->success('渠道添加成功', Url::build('admin/agent/index'));
        }

        $this->assign('authorArr', Loader::model('Agent')->getAuthor());

        return $this->fetch();
    }


    public function edit($agent_id)
    {
        $request = Request::instance();

        if ($request->isAjax()) {
            $params       = $request->param();
            $params['agent_id'] = $agent_id;

            if (loader::validate('Agent')->scene('edit')->check($params) === false) {
                return $this->error(loader::validate('Agent')->getError());
            }

            if (($id = Loader::model('Agent')->agentEdit($params)) === false) {
                return $this->error(Loader::model('Agent')->getError());
            }
            Loader::model('BackstageLog')->record("修改渠道：[{$agent_id}]");
            return $this->success('渠道修改成功', Url::build('admin/agent/index').'?'.$params['gourl']);
        }     

        $agent = Loader::model('Agent')::get($agent_id);
        $this->assign('agent', $agent);
        $this->assign('authorArr', Loader::model('Agent')->getAuthor());

        return $this->fetch();
    }

    public function site()
    {
        $wh=$query=array();
		if(input('get.agent_id')>100){
            $query['agent_id']=$wh['agent_id']=input('get.agent_id');
        }
        if(input('get.kw')){
            $query['kw']=input('get.kw');
            $wh['site_name']=array('LIKE','%'.input('get.kw').'%');
        }
        if($this->getAdminid()>5){
            $query['author']=$wh['author']=$this->getAdminid();
        } else if(input('get.author')){
            $query['author']=$wh['author']=input('get.author');
        }
        $siteLists = Loader::model('Agent')::table('__AGENT_SITE__')->where($wh)->order('site_id desc')->paginate(10,false,array('query' => $query));
        $this->assign('siteLists', $siteLists);
        $this->assign('pages', $siteLists->render());
        $query['page']=input('get.page');
        $query['gourl']=http_build_query($query);
        $this->assign('query', $query);
        $this->assign('webUrl', Config::get('webUrl'));
        $this->assign('payType', Config::get('paytype'));
        $agentList = Loader::model('Agent')::field('agent_id,agent_name')->order('agent_id','desc')->select();
        $this->assign('agentList', $agentList);
        $this->assign('authorArr', Loader::model('Agent')->getAuthor());
        return $this->fetch();
    }

    public function site_add($agent_id)
    {
        $agent = Loader::model('Agent')::field('agent_id,agent_name')->find($agent_id);
        $request = Request::instance();

        if ($request->isAjax()) {
            $params = $request->param();
            $params['agent_name'] = $agent['agent_name'];
            $params['author'] = Session::get(Config::get('login_session_identifier') . '.id');

            if (($site_id = Loader::model('Agent')->siteAdd($params)) === false) {
                return $this->error(Loader::model('Agent')->getError());
            }

            Loader::model('BackstageLog')->record("添加广告位：[{$site_id}]");

            return $this->success('广告位添加成功', Url::build('admin/agent/site'));
        }
        
        $this->assign('agent', $agent);
        $this->assign('payType', Config::get('paytype'));
        $this->assign('authorArr', Loader::model('Agent')->getAuthor());
        return $this->fetch();
    }

    public function site_edit($site_id)
    {
        $request = Request::instance();

        if ($request->isAjax()) {
            $params       = $request->param();
            $params['site_id'] = $site_id;
            if (($id = Loader::model('Agent')->siteEdit($params)) === false) {
                return $this->error(Loader::model('Agent')->getError());
            }
            Loader::model('BackstageLog')->record("修改广告位：[{$site_id}]");

            return $this->success('广告位修改成功', Url::build('admin/agent/site').'?'.$params['gourl']);
        }     

        $site = Loader::model('Agent')::table('__AGENT_SITE__')->find($site_id);
        $this->assign('site', $site);
        $this->assign('payType', Config::get('paytype'));
        $this->assign('authorArr', Loader::model('Agent')->getAuthor());

        return $this->fetch();
    }

    public function material(){
        $wh=$query=array();
        if(input('get.kw')){
            $query['kw']=input('get.kw');
            $wh['title']=array('LIKE','%'.input('get.kw').'%');
        }
        if(input('get.bid')>0){
            $query['bid']=input('get.bid');
            $wh['bid']=input('get.bid');
        }
		if(input('get.type')>0){
            $query['type']=input('get.type');
            $wh['type']=input('get.type');
        }
        $material = Loader::model('Agent')::table('__MATERIAL__')->where($wh)->order('rank asc')->paginate(10,false,array('query' => $query));
        $this->assign('material', $material);
        $this->assign('pages', $material->render());
        $query['page']=input('get.page');
        $query['gourl']=http_build_query($query);
        $this->assign('query', $query);
        $this->assign('imgUrl', Config::get('imgUrl'));
        $result = Loader::model('Category')::select();
        foreach($result as $re){
            $mrtype[$re['id']]=$re['title'];
        }
        $this->assign('mrtype', $mrtype);
        $bookList = Loader::model('Books')::field('bid,bookname')->order('bid','desc')->select();
        $this->assign('bookList', $bookList);
        return $this->fetch();
    }

    public function material_add(){
        $request = Request::instance();

        if ($request->isAjax()) {
            $params = $request->param();

            if (($materid = Loader::model('Agent')->materialAdd($params)) === false) {
                return $this->error(Loader::model('Agent')->getError());
            }

            Loader::model('BackstageLog')->record("添加素材：[{$materid}]");
			$this->cacheMaterial();
            return $this->success('添加素材成功', Url::build('admin/agent/material'));
        }
		$result = Loader::model('Category')::select();
        foreach($result as $re){
            $mrtype[$re['id']]=$re['title'];
        }
        $this->assign('mrtype', $mrtype);
        $bookList = Loader::model('Books')::field('bid,bookname')->order('bid','desc')->select();
        $this->assign('bookList', $bookList);
        return $this->fetch();
    }

    public function material_edit($id)
    {
        $request = Request::instance();

        if ($request->isAjax()) {
            $params       = $request->param();
            $params['id'] = $id;
            if (($id = Loader::model('Agent')->materialEdit($params)) === false) {
                return $this->error(Loader::model('Agent')->getError());
            }
            Loader::model('BackstageLog')->record("修改素材[{$id}]");
			$this->cacheMaterial();
            return $this->success('素材修改成功', Url::build('admin/agent/material').'?'.$params['gourl']);
        }     

        $mater = Loader::model('Agent')::table('__MATERIAL__')->find($id);
        $this->assign('mater', $mater);
        $this->assign('imgUrl', Config::get('imgUrl'));
		$result = Loader::model('Category')::select();
        foreach($result as $re){
            $mrtype[$re['id']]=$re['title'];
        }
        $this->assign('mrtype', $mrtype);
        $bookList = Loader::model('Books')::field('bid,bookname')->order('bid','desc')->select();
        $this->assign('bookList', $bookList);
        return $this->fetch();
    }
	
	 public function editmaterank()
    {
         $request = Request::instance();
         if ($request->isAjax()) {
            $params       = $request->param();
            if (($id = Loader::model('Agent')->materankEdit($params)) === false) {
                echo Loader::model('Agent')->getError(); exit;
            }
            echo 1; exit;
        }
        echo 0; exit;
    }
	
	 public function pay()
    {
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m-d');
        $query['tdate']=$tdate;
        $wh.=" and tdate>='$tdate'";
        $edate=input('get.edate');
        if(!$edate) $edate=date('Y-m-d');
        $query['edate']=$edate;
        $wh.=" and tdate<='$edate'";
		$agent_id=input('get.agent_id');
		if($agent_id>0){
        	$query['agent_id']=$agent_id;
        	$wh.=" and a.agent_id='$agent_id'";
		}
        if($this->getAdminid()>5){
            $query['author']=$this->getAdminid();
            $wh.=" and b.author='".$this->getAdminid()."'";
        } else if(input('get.author')){
            $query['author']=input('get.author');
            $wh.=" and b.author='".input('get.author')."'";
        }
        $this->assign('query', $query);
		$this->assign('payType', Config::get('paytype'));
        
		$data=Loader::model('Agent')->pay($wh);
		foreach($data as $val){
			$total['amount']+=$val['amount'];
			$total['commision']+=$val['commision'];
		}
		$this->assign('total', $total);
        $this->assign('data', $data);
        $this->assign('authorArr', Loader::model('Agent')->getAuthor());
        
        return $this->fetch();
    }

	 public function pay_add()
    {
		$request = Request::instance();
		if ($request->isAjax()) {
            $params = $request->param();
			if($params['ids']){
				$ids=implode(',',$params['ids']);
				$result = Loader::model('Agent')->payAdd($ids);
				if($result){
					return $this->success('批量结算成功');
				} else {
					return $this->error('批量结算提交失败');
				}
			} else {
				return $this->error('未勾选结算记录');
			}  
        }
		return $this->error('非法提交');
		exit;
    }
	
	 public function cost()
    { 
		$site_id=input('get.site_id');
		if($site_id>0){
        	$query['site_id']=$site_id;
        	$wh.=" and a.site_id='$site_id'";
		} else {
			$tdate=input('get.tdate');
			if(!$tdate) $tdate=date('Y-m-d',time()-86400*30);
			$query['tdate']=$tdate;
			$wh.=" and tdate>='$tdate'";
			$edate=input('get.edate');
			if(!$edate) $edate=date('Y-m-d');
			$query['edate']=$edate;
			$wh.=" and edate<='$edate'";
		}
        if($this->getAdminid()>5){
            $query['author']=$this->getAdminid();
            $wh.=" and b.author='".$this->getAdminid()."'";
        } else if(input('get.author')){
            $query['author']=input('get.author');
            $wh.=" and b.author='".input('get.author')."'";
        }
        $this->assign('query', $query);
        
		$data=Loader::model('Agent')->cost($wh);
		foreach($data as $val){
			$total['money']+=$val['money'];
			$total['paymoney']+=$val['paymoney'];
		}
		$this->assign('total', $total);
        $this->assign('data', $data);
        $this->assign('authorArr', Loader::model('Agent')->getAuthor());
        
        return $this->fetch();
    }
	
	 public function cost_add(){
        $request = Request::instance();

        if ($request->isAjax()) {
            $params = $request->param();
			if(!$params['site_id']){
				return $this->error('请选择一个广告位');
			}
			if(!$params['tdate'] || !$params['tdate']){
				return $this->error('请选择投放周期');
			}
			if(!$params['money']){
				return $this->error('投放金额不能为0');
			}
            if (($materid = Loader::model('Agent')->costAdd($params)) === false) {
                return $this->error(Loader::model('Agent')->getError());
            }

            Loader::model('BackstageLog')->record("添加消耗：[{$materid}]");

            return $this->success('添加消耗成功', Url::build('admin/agent/cost'));
        }
		$siteLists = Loader::model('Agent')::table('__AGENT_SITE__')->field('site_id,site_name,agent_id,agent_name')->where('paytype','3')->order('site_id desc')->select();
		$this->assign('siteLists', $siteLists);
        return $this->fetch();
    }

}
