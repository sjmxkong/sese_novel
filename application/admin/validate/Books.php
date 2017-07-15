<?php
namespace app\admin\validate;

use \think\Validate;

class Books extends Validate
{
    use \app\common\validate\Validate;

    protected $rule = [
        'catid'   => ['require'],
        'bookname'    => ['require', 'max:40'],
        'description' => ['max:500'],
        'iscommend'   => ['integer'],
        'status'   => ['integer'],
    ];

    protected $message = [
        'catid.require'  => '图书分类必须填写',
        'bookname.require'   => '图书名必须填写',
        'bookname.max'       => '图书名不能超40个字符',
        'description.max'    => '简介不能超500个字符',
        'iscommend.integer'  => '推荐指数只能为整数',

    ];

    protected $scene = [
        'add'  => ['catid', 'bookname', 'iscommend', 'status', 'description'],
        'edit' => ['catid', 'bookname', 'iscommend', 'status', 'description'],
    ];
}
