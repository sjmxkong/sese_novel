<?php
namespace app\admin\validate;

use \think\Validate;

class Aricle extends Validate
{
    use \app\common\validate\Validate;

    protected $rule = [
        'bid'           => ['require'],
        'title'            => ['require', 'max:40'],
        'ischeck'          => ['in:0,1'],
        'isfree'           => ['in:0,1'],
        'sortid'           => ['require', 'integer'],
    ];

    protected $message = [
        'bid.require'       => '图书必须选择',
        'title.require'        => '标题必须填写',
        'title.max'            => '标题长度不能超来40个字符',
        'ischeck.in'           => '发布状态值不可用',
        'isfree.in'            => '收费状态值不可用',
        'sortid.require'       => '章节号必须填写',
        'sortid.integer'       => '章节号不正确',

    ];

    protected $scene = [
        'add'  => ['bid', 'title', 'ischeck', 'isfree', 'sortid'],
        'edit' => ['bid', 'title', 'ischeck', 'isfree', 'sortid'],
    ];
}
