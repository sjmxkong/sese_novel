<?php
namespace app\admin\model;

use \think\Model;
use think\Db;

class Total extends Model
{

    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-10-02T15:31:22+0800
     * @param    array                    $params [description]
     * @return   [type]                           [description]
     */
    public function index(array $params)
    {
        foreach ($params as $key => $val) {
            if(!$val || !$key) continue;
            if($key=='author'){
                $wh.=" and b.`author`='$val'";
            } else {
                $wh.=" and a.`$key`='$val'";
            }
        }
        $sql="select a.*,b.site_name,b.agent_name,b.author from db_center.tg_agent_total a left join db_books.bk_story_agent_site b on a.site_id=b.site_id where 1 $wh order by regnum desc";
        return Db::query($sql);
    }

    public function top($wh)
    {
        $sql="select sum(a.money) as mo,count(distinct a.orderid) as num,a.agent_id,a.site_id,a.mid,b.site_name,b.agent_name from bk_story_paylist a left join bk_story_agent_site b on a.site_id=b.site_id where a.money>0 $wh  group by a.mid,a.agent_id,a.site_id order by mo desc limit 30";
        return Db::query($sql);
    }

    public function cost($wh)
    {
        $sql="select sum(price) as gold,count(distinct mid) as num,count(id) as count,bid,bookname from bk_story_costlist where 1 $wh  group by bid,bookname order by gold desc limit 30";
        return Db::query($sql);
    }

    public function thour($wh)
    {
        $sql="select sum(regnum) as regnum,sum(loginnum) as loginnum,sum(paynum) as paynum,sum(paymoney) as paymoney,sum(costnum) as costnum,sum(costgold) as costgold,sum(chapfree) as chapfree,sum(chapcost) as chapcost,thour from db_center.tg_agent_thour where 1 $wh  group by thour order by thour asc";
        return Db::query($sql);
    }

    public function tdate($wh)
    {
        $sql="select sum(regnum) as regnum,sum(loginnum) as loginnum,sum(paynum) as paynum,sum(paymoney) as paymoney,sum(costnum) as costnum,sum(costgold) as costgold,sum(newnum) as newnum,sum(newmoney) as newmoney,tdate from db_center.tg_agent_total where 1 $wh  group by tdate order by tdate asc";
        return Db::query($sql);
    }
	
	public function bookchap($wh)
    {
        $sql="select sum(num) as num,sortid from db_center.tg_book_chap where 1 $wh  group by sortid order by sortid asc";
        return Db::query($sql);
    }


    public function getUserNum(){
        $data['total'] = Db::table('__MEMBER__')->count('mid');
        $data['tdate'] = Db::table('__MEMBER__')->whereTime('regtime', 'today')->count('mid');
        $data['ldate'] = Db::table('__MEMBER__')->whereTime('regtime', 'yesterday')->count('mid');
        return $data;
    }

    public function getPayCount(){
        
        $data['money_tdate'] = Db::table('__PAYLIST__')->whereTime('addtime', 'today')->sum('money');
        $data['money_new']  = Db::table('__PAYLIST__')->whereTime('addtime', 'today')->whereTime('regtime','today')->sum('money');
        $data['num_tdate']   = Db::table('__PAYLIST__')->where('money','>',0)->whereTime('addtime', 'today')->count('distinct mid');

        $data['money_yesdate'] = Db::table('__PAYLIST__')->whereTime('addtime', 'yesterday')->sum('money');
        $data['num_yesdate']   = Db::table('__PAYLIST__')->where('money','>',0)->whereTime('addtime', 'yesterday')->count('distinct mid');
        
        return $data;
    }

    public function getCostCount(){
		/*
        $ttime=strtotime(date('Y-m-d'));
        $ytime=strtotime(date('Y-m-d',time()-86400));
        $sql="select sum(price) as gold,count(distinct mid) as num,type from bk_story_costlist where addtime>=$ttime  group by type";
        $res=Db::query($sql);
        foreach ($res as $val) {
            $data[$val['type']]['tdate']=$val;
        }
        
        $sql="select sum(price) as gold,count(distinct mid) as num,type from bk_story_costlist where addtime>=$ytime and addtime<$ttime group by type";
        $res=Db::query($sql);
        foreach ($res as $val) {
            $data[$val['type']]['yesdate']=$val;
        }
        return $data;
		*/
    }

    

}
