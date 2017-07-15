<?php
namespace app\admin\model;

use \think\Model;
use think\Db;

class Agent extends Model
{

    /**
     * [booksAdd description]
     * @author yongle
     * @dateTime 2016-09-01T15:31:22+0800
     * @param    array                    $params [description]
     * @return   [type]                           [description]
     */
    public function agentAdd(array $params)
    {
        return $this->insertGetId([
            'agent_name'    => $params['agent_name'],
            'user_name'     => $params['user_name'],
            'user_pwd'      => $params['user_pwd'],
            'person'        => $params['person'],
            'email'         => $params['email'],
            'qq'            => $params['qq'],
            'mobile'        => $params['mobile'],
            'bank'          => $params['bank'],
            'account_name'  => $params['account_name'],
            'account'       => $params['account'],
            'author'       =>  $params['author'],
            'create_time'   => time(),
            'update_time'   => time(),
        ]);
    }

    public function agentEdit(array $params)
    {
        return $this->save([
            'agent_name'    => $params['agent_name'],
            'user_name'     => $params['user_name'],
            'user_pwd'      => $params['user_pwd'],
            'person'        => $params['person'],
            'email'         => $params['email'],
            'qq'            => $params['qq'],
            'mobile'        => $params['mobile'],
            'bank'          => $params['bank'],
            'account_name'  => $params['account_name'],
            'account'       => $params['account'],
            'author'       =>  $params['author'],
        ], ['agent_id' => $params['agent_id']]);
    }


    public function siteAdd(array $params){
        return Db::table('__AGENT_SITE__')->insertGetId([
            'agent_id'     => $params['agent_id'],
            'agent_name'   => $params['agent_name'],
            'site_name'    => $params['site_name'],
            'deduct'       => $params['deduct'],
            'divide'       => $params['divide'],
            'price'        => $params['price'],
            'paytype'      => $params['paytype'],
            'author'       => $params['author'],
            'create_time'  => time(),
            'update_time'  => time(),
        ]);
    }

    public function siteEdit(array $params)
    {
        return Db::table('__AGENT_SITE__')->where('site_id',$params['site_id'])->update([
            'site_name'    => $params['site_name'],
            'deduct'       => $params['deduct'],
            'divide'       => $params['divide'],
            'price'        => $params['price'],
            'paytype'      => $params['paytype'],
            'author'       =>  $params['author'],
            'update_time'  => time(),
        ]);
    }

    public function materialAdd(array $params){
        return Db::table('__MATERIAL__')->insertGetId([
            'title'    => $params['title'],
            'url'      => $params['url'],
            'pic'      => $params['tg'],
            'content'  => $params['content'],
			'type'     => $params['type'],
            'bid'      => $params['bid'],
            'addtime'  => time(),
        ]);
    }

    public function materialEdit(array $params)
    {
        return Db::table('__MATERIAL__')->where('id',$params['id'])->update([
            'title'    => $params['title'],
            'url'      => $params['url'],
            'pic'      => $params['tg'],
            'state'    => $params['state'],
            'content'  => $params['content'],
			'type'     => $params['type'],
            'bid'      => $params['bid'],
        ]);
    }
	
	public function materankEdit(array $params)
    {
		return Db::table('__MATERIAL__')->where('id',$params['id'])->update([
            'rank'    => $params['val'],
        ]);
    }
	
	public function pay($wh)
    {
        $sql="select a.*,b.site_name,b.agent_name,b.paytype,b.author from db_center.tg_agent_pay a left join db_books.bk_story_agent_site b on a.site_id=b.site_id where 1 $wh";
        return Db::query($sql);
    }
	
	 public function payAdd($ids)
    {
		if(!$ids) return false;
        $sql="update db_center.tg_agent_pay set state=1,pay_time='".time()."' where id in($ids)";
		return Db::execute($sql);
    }
	
	public function cost($wh)
    {
        $sql="select a.*,b.site_name,b.agent_name,b.author from db_center.tg_agent_cost a left join db_books.bk_story_agent_site b on a.site_id=b.site_id where 1 $wh order by tdate desc";
        return Db::query($sql);
    }
	
	public function costAdd(array $params){
        return Db::table('db_center.tg_agent_cost')->insertGetId([
            'tdate'    => $params['tdate'],
            'edate'    => $params['edate'],
            'site_id'  => $params['site_id'],
            'money'    => $params['money'],
			'memo'     => $params['memo'],
            'addtime'  => time(),
        ]);
    }


    public function getAuthor()
    {
        $sql="select id,name from bk_story_admin where id>1";
        $res=Db::query($sql);
        foreach ($res as $val) {
            $data[$val['id']]=$val['name'];
        }
        return $data;
    }

}
