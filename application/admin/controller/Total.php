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
class Total extends AdminBase
{
    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-10-02T14:10:45+0800
     * @return [type] [description]
     */
    
    private function getAdminid(){
        return Session::get(Config::get('login_session_identifier') . '.id');
    }

    public function index()
    {
		$wh=array();
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m-d');
        $wh['tdate']=$tdate;
        if(input('get.site_id')>0){
            $wh['site_id']=input('get.site_id');
        }
        if(input('get.agent_id')>0){
            $wh['agent_id']=input('get.agent_id');
        }
        if($this->getAdminid()>5){
            $wh['author']=$this->getAdminid();
        } else if(input('get.author')){
            $wh['author']=input('get.author');
        }
        $this->assign('query', $wh);
		$data=Loader::model('Total')->index($wh);
        foreach ($data as $val) {
            $total['regnum']+=$val['regnum'];
            $total['newnum']+=$val['newnum'];
            $total['newmoney']+=$val['newmoney'];
            $total['paynum']+=$val['paynum'];
            $total['paymoney']+=$val['paymoney'];
        }
        $this->assign('total', $total);
        $this->assign('data', $data);
        $this->assign('authorArr', Loader::model('Agent')->getAuthor());
        
        return $this->fetch();
    }

    public function top()
    {
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m-d');
        $query['tdate']=$tdate;
        $wh.=" and a.addtime>=".strtotime($tdate);
        $edate=input('get.edate');
        if(!$edate) $edate=date('Y-m-d');
        $query['edate']=$edate;
        $wh.=" and a.addtime<=".strtotime($edate.' 23:59:59');
        $site_id=input('get.site_id');
        if($site_id>0){
            $wh.=" and a.site_id=".$site_id;
        }
        $query['site_id']=$site_id;
        $this->assign('query', $query);
        $data=Loader::model('Total')->top($wh);

        $this->assign('data', $data);
        
        return $this->fetch();
    }

    public function cost()
    {
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m-d');
        $query['tdate']=$tdate;
        $wh.=" and addtime>=".strtotime($tdate);
        $edate=input('get.edate');
        if(!$edate) $edate=date('Y-m-d');
        $query['edate']=$edate;
        $wh.=" and addtime<=".strtotime($edate.' 23:59:59');
        $this->assign('query', $query);
        $data=Loader::model('Total')->cost($wh);
        
        $this->assign('data', $data);
        
        return $this->fetch();
    }

    public function thour()
    {
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m-d');
        $query['tdate']=$tdate;
        $wh.=" and tdate='{$tdate}'";
        $site_id=input('get.site_id');
        if($site_id>0){
            $query['site_id']=$site_id;
            $wh.=" and site_id=".$site_id;
        }
        $this->assign('query', $query);
        $data=Loader::model('Total')->thour($wh);
        foreach ($data as $val) {
            $data_thour[]=$val['thour'];
            $data_char['注册数'][]=$val['regnum'];
            $data_char['登录数'][]=$val['loginnum'];
            $data_char['充值人数'][]=$val['paynum'];
            $data_char['充值金额'][]=$val['paymoney'];
            $data_char['阅读免费章节'][]=$val['chapfree'];
            $data_char['阅读收费章节'][]=$val['chapcost'];
            $data_char['消费人数'][]=$val['costnum'];
            $data_char['消费金额'][]=round($val['costgold']/100,2);

            $total['regnum']+=$val['regnum'];
            $total['loginnum']+=$val['loginnum'];
            $total['paynum']+=$val['paynum'];
            $total['paymoney']+=$val['paymoney'];
            $total['chapfree']+=$val['chapfree'];
            $total['chapcost']+=$val['chapcost'];
            $total['costnum']+=$val['costnum'];
            $total['costgold']+=$val['costgold'];
        }
        $this->assign('total', $total);
        $this->assign('data', $data);
        $this->assign('data_thour', $data_thour);
        $this->assign('data_char', $data_char);
        
        return $this->fetch();
    }

    public function tdate()
    {
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m').'-01';
        $query['tdate']=$tdate;
        $wh.=" and tdate>='{$tdate}'";
        $edate=input('get.edate');
        if(!$edate) $edate=date('Y-m-d');
        $query['edate']=$edate;
        $wh.=" and tdate<='{$edate}'";
        $site_id=input('get.site_id');
        if($site_id>0){
            $query['site_id']=$site_id;
            $wh.=" and site_id=".$site_id;
        }
		$agent_id=input('get.agent_id');
        if($agent_id>0){
            $query['agent_id']=$agent_id;
            $wh.=" and agent_id=".$agent_id;
        }
        $this->assign('query', $query);
        $data=Loader::model('Total')->tdate($wh);
        foreach ($data as $val) {
            $data_tdate[]=$val['tdate'];
            $data_char['注册数'][]=$val['regnum'];
            $data_char['登录数'][]=$val['loginnum'];
            $data_char['充值人数'][]=$val['paynum'];
            $data_char['充值金额'][]=$val['paymoney'];
            $data_char['新增充值人数'][]=$val['newnum'];
            $data_char['新增充值金额'][]=$val['newmoney'];
            $data_char['消费人数'][]=$val['costnum'];
            $data_char['消费金额'][]=round($val['costgold']/100,2);

            $total['regnum']+=$val['regnum'];
            $total['loginnum']+=$val['loginnum'];
            $total['paynum']+=$val['paynum'];
            $total['paymoney']+=$val['paymoney'];
            $total['newnum']+=$val['newnum'];
            $total['newmoney']+=$val['newmoney'];
            $total['costnum']+=$val['costnum'];
            $total['costgold']+=$val['costgold'];
        }
        $this->assign('total', $total);
        $this->assign('data', $data);
        $this->assign('data_tdate', $data_tdate);
        $this->assign('data_char', $data_char);
        
        return $this->fetch();
    }
	
	 public function bookchap()
    {
        $tdate=input('get.tdate');
        if(!$tdate) $tdate=date('Y-m-d');
        $query['tdate']=$tdate;
        $wh.=" and tdate>='$tdate'";
        $edate=input('get.edate');
        if(!$edate) $edate=date('Y-m-d');
        $query['edate']=$edate;
        $wh.=" and tdate<='$edate'";
		$bid=input('get.bid');
		if($bid>0){
        	$query['bid']=$bid;
        	$wh.=" and bid='$bid'";
			$data=Loader::model('Total')->bookchap($wh);
			if($data){
				foreach($data as $val){
					$total+=$val['num'];
				}
				$this->assign('total', $total);
				$this->assign('data', $data);
			}
		}
        $this->assign('query', $query);
        
		$bookList = Loader::model('Books')::field('bid,bookname')->order('bid','desc')->select();
        $this->assign('bookList', $bookList);
		
        return $this->fetch();
    }


}
