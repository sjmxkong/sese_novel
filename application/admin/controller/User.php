<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use \think\Db;
use \think\Loader;
use \think\Request;
use \think\Url;

class User extends AdminBase
{
    /**
     * 后台主面板
     * @author yongle
     * @dateTime 2016-08-26T17:32:36+0800
     * @return [type] [description]
     */
    public function index()
    {
        $userModel = Loader::model('User');
        $userRows  = $userModel::paginate(25);

        $this->assign('userRows', $userRows);
        $this->assign('pages', $userRows->render());

        return $this->fetch();
    }

 
    public function add()
    {
        $request = Request::instance();
        if ($request->isAjax()) {
            $params = $request->param();

            if (($userId = Loader::model('User')->userAdd($params)) === false) {
                return $this->error(loader::model('User')->getError());
            }

            Loader::model('BackstageLog')->record("添加后台用户：[{$userId}]");

            return $this->success('后台用户添加成功', Url::build('admin/user/index'));
        }

        $roleModel = Loader::model('Role');
        $roleRows  = $roleModel::all();
        $this->assign('roleRows', $roleRows);

        return $this->fetch();
    }

 
    public function edit($id)
    {
        $request = Request::instance();
        if ($request->isAjax()) {
            $params    = $request->param();
            $userModel = Loader::model('User');

            $params['id'] = (int) $id;
    
            // if (loader::validate('User')->scene('edit')->check($params) === false) {
            //     return $this->error(loader::validate('User')->getError());
            // }

            if (Loader::model('User')->profileEdit($params) === false) {
                return $this->error(loader::model('User')->getError());
            }

            Loader::model('BackstageLog')->record("修改后台用户：[{$id}]");

            return $this->success('后台用户修改成功', Url::build('admin/user/index'));

        }

        $roleModel = Loader::model('Role');
        $roleRows  = $roleModel::all();

        $userRow   = Db::table('__ADMIN__')->find($id);

        $this->assign('roleRows', $roleRows);
        $this->assign('userRow', $userRow);

        return $this->fetch();
    }

  
    public function profile()
    {
        $request = Request::instance();
        if ($request->isAjax()) {

            $params       = $request->post();
            $params['id'] = $this->userRow['id'];

            if (Loader::model('User')->profileEdit($params) === false) {
                return $this->error(Loader::model('User')->getError());
            }

            Loader::model('BackstageLog')->record("个人资料修改");

            return $this->success('个人资料修改成功', Url::build('admin/user/profile'));

        }
        $userRow = Db::table('__ADMIN__')->find($this->userRow['id']);
        $this->assign('userRow', $userRow);

        return $this->fetch();
    }


    public function destroy($id)
    {
        if (Loader::model('User')->deleteUser($id) === false) {
            return $this->error(loader::model('User')->getError());
        }

        Loader::model('BackstageLog')->record("删除后台用户：[{$id}]");

        return $this->success('后台用户删除成功', Url::build('admin/user/index'));

    }
}
