<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Loader;

/**
 *
 */
class Service extends AdminBase
{
    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-09-01T14:10:45+0800
     * @return [type] [description]
     */
    
	private function getPayType(){
		return array(1=>'支付宝',2=>'微信',3=>'收付通',4=>'公众号',5=>'一键注册赠送',6=>'绑定手机赠送',7=>'抽奖活动');
	}
	
    public function user()
    {
		$wh=$query=array();
        if(input('get.kw')){
            $query['kw']=$wh['uname']=input('get.kw');
        }
		if(input('get.mobile')){
            $query['mobile']=$wh['mobile']=input('get.mobile');
        }

		if($wh){
			$ulist = Loader::model('Agent')::table('__MEMBER__')->field('mid,uname,mtype,gold,money,mobile,regtime,agent_id,site_id')->where($wh)->order('regtime desc')->limit(10)->select();
			$this->assign('ulist', $ulist);
			$this->assign('query', $query);
			$this->assign('rtype', array(1=>'官网',2=>'微信',3=>'QQ',4=>'公众号'));
		}

        return $this->fetch();
    }
	
	 public function pay()
    {
		$wh=$query=array();
        if(input('get.kw')){
            $query['kw']=$wh['uname']=input('get.kw');
        }
		if(input('get.orderid')){
            $query['orderid']=input('get.orderid');
	    $wh['orderid|trade_order|trade_orderid']=input('get.orderid');
        }
		
		if($wh){
			$wh['succ']=1;
			$plist = Loader::model('Agent')::table('__PAYORDER__')->field('orderid,trade_order,trade_orderid,uname,money,gold,gift,ch_id,notifytime')->where($wh)->order('notifytime desc')->limit(10)->select();
			$this->assign('plist', $plist);
			$this->assign('query', $query);
			$this->assign('ptype', $this->getPayType());
		}

        return $this->fetch();
    }
	
	 public function paylist($mid)
    {
		if(!$mid){
			return $this->error('非法访问，用户ID不能为空');
		}
        $query['mid']=$mid;

		$plist = Loader::model('Agent')::table('__PAYLIST__')->field('orderid,ch_id,uname,money,gold,gift,addtime')->where($query)->order('addtime desc')->paginate(20,false,array('query' => $query));
		$this->assign('plist', $plist);
		$this->assign('ptype', $this->getPayType());
		$this->assign('pages', $plist->render());
        return $this->fetch();
    }


	 public function costlist($mid)
    {
		if(!$mid){
			return $this->error('非法访问，用户ID不能为空');
		}
        $query['mid']=$mid;

		$clist = Loader::model('Agent')::table('__COSTLIST__')->field('type,price,bookname,title,addtime')->where($query)->order('addtime desc')->paginate(20,false,array('query' => $query));
		$this->assign('clist', $clist);
		$this->assign('pages', $clist->render());
		$this->assign('ctype', array(1=>'订阅',2=>'奖赏',3=>'抽奖'));
        return $this->fetch();
    }
	
}
