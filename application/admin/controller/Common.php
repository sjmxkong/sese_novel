<?php
namespace app\admin\controller;

use think\Controller;
use think\Loader;
use think\Request;
use think\Url;

/**
 *
 */
class Common extends Controller
{

    /**
     * 后台用户登录
     * @author yongle
     * @dateTime 2016-08-26T17:32:23+0800
     * @return [type] [description]
     */
    public function login()
    {
        $request = Request::instance();

        if ($request->isAjax()) {
            $data   = $request->param();
            $result = $this->validate($data, "User.login");

            if ($result !== true) {
                return ['status' => 0, 'data' => $result];
            }

            $userModel = Loader::model('User');

            $userRow = $userModel->login([
                'email'    => $data['email_login'],
                'password' => $data['password'],
            ]);

            if ($userRow === false) {
                return $this->error($userModel->getError());
            }

            return $this->success('登录成功', Url::build('admin/index/index'));

        } else {
            return $this->fetch();
        }

    }

}
