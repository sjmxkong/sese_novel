<?php
namespace app\admin\model;

use \think\Config;
use \think\Model;
use \think\Session;

class BackstageLog extends Model
{
    protected $updateTime = false;
    protected $insert     = ['ip', 'user_id'];
    protected $type       = [
        'create_time' => 'timestamp',
    ];

    /**
     * 设置登录用户的ip
     * @author yongle
     * @dateTime 2016-08-27T10:33:05+0800
     * @param    [type]                   $ip [description]
     */
    protected function setIpAttr()
    {
        return \app\common\tools\Visitor::getIP();
    }


    protected function setUserIdAttr()
    {
        $user_id = 0;
        if (Session::has(Config::get('login_session_identifier')) !== false) {
            $user_id = Session::get(Config::get('login_session_identifier') . '.id');
        }
        return $user_id;
    }

    public function record($remark)
    {
        $this->save(['remark' => $remark]);
    }

}
