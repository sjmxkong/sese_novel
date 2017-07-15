<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\common\tools\Strings;
use think\Config;
use think\Loader;
use think\Request;

class Upload extends AdminBase
{
    /**
     * 个人资料修改
     * @author yongle
     * @dateTime 2016-08-26T15:26:15+0800
     * @return   [type]                   [description]
     */
    public function uploadpic()
    {
        $request = Request::instance();
        if ($request->isPost()) {
            $optput = ['error' => 1, 'message' => '上传失败'];
            $file = $request->file('imgFile');
            $info = $file->move(STATIC_PATH . DS . 'editor' . DS);
            if ($info) {
                $optput['url']   = Strings::fileWebLink($info->getRealPath());
                $optput['error'] = 0;
            } else {
                $optput['message'] = $file->getError();
            }

            return json_encode($optput, JSON_HEX_QUOT);
        }
    }

 
    public function index($id = 'editor')
    {
        $request = Request::instance();
        if ($request->isPost()) {
            $optput = ['error' => '上传失败'];

            $file = $request->file('imgFile');
            $info = $file->move(STATIC_PATH . DS . $id . DS);
            if ($info) {
                $optput['file']  = Strings::fileWebLink($info->getRealPath());
                $optput['error'] = null;
            } else {
                $optput['error'] = $file->getError();
            }

            return $optput;
        }
        $this->assign('id', $id);
        $this->assign('imgUrl', Config::get('imgUrl'));
        return $this->fetch();
    }
}
