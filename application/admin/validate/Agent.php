<?php
namespace app\admin\validate;

use \think\Validate;

class Agent extends Validate
{
    use \app\common\validate\Validate;

    protected $rule = [
        'agent_name'   => ['require', 'max:20'],
        'user_name'    => ['require', 'max:20'],
        'user_pwd'     => ['require', 'max:20'],
    ];

    protected $message = [
        'agent_name.require'  => '渠道名必须填写',
        'agent_name.max'       => '渠道名不能超20个字符',
        'user_name.require'   => '登录名必须填写',
        'user_name.max'       => '登录名不能超20个字符',
        'user_pwd.require'   => '登录密码必须填写',
        'user_pwd.max'    => '登录密码不能超20个字符',

    ];

    protected $scene = [
        'add'  => ['agent_name', 'user_name', 'user_pwd'],
        'edit' => ['agent_name', 'user_name', 'user_pwd'],
    ];
}
