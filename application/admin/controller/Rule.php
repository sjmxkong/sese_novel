<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use \think\Loader;
use \think\Request;
use \think\Url;

class Rule extends AdminBase
{
    /**
     * 菜单列表
     * @author yongle
     * @dateTime 2016-08-26T11:30:49+0800
     * @return [type] [description]
     */
    public function index()
    {
        $ruleModel = Loader::model('Rule');
        $lists     = $ruleModel->where('parent_id', 0)->order('sort', 'asc')->select();

        $this->assign('lists', $lists);

        return $this->fetch();
    }

    public function add()
    {
        $request = Request::instance();
        if ($request->isAjax()) {
            $params = $request->param();

            if (loader::validate('Rule')->scene('add')->check($params) === false) {
                return $this->error(loader::validate('Rule')->getError());
            }
			
            if (($userId = Loader::model('Rule')->save($params)) === false) {
                return $this->error(loader::model('Rule')->getError());
            }

            Loader::model('BackstageLog')->record("添加菜单,ID:[{$userId}]");

            return $this->success('菜单添加成功', Url::build('admin/rule/index'));
        }
        $ruleRows = Loader::model('Rule')->getMenusByParentId(0);
        $this->assign('ruleRows', $ruleRows);

        return $this->fetch();

    }

    public function edit($id)
    {
        $ruleModel = Loader::model('Rule');

        $ruleRow = $ruleModel::get($id);
        if ($ruleRow === false) {
            $this->error('没有找到对应的数据');
        }

        $request = Request::instance();
        if ($request->isAjax()) {
            $params       = $request->param();
            $params['id'] = $id;

            // if (loader::validate('Rule')->scene('edit')->check($params) === false) {
            //     return $this->error(loader::validate('Rule')->getError());
            // }
            if (Loader::model('Rule')->save($params, ['id' => $id]) === false) {
                return $this->error(loader::model('Rule')->getError());
            }
            Loader::model('BackstageLog')->record("修改菜单,ID:[{$id}]");

            return $this->success('菜单修改成功', Url::build('admin/rule/index'));
        }

        $ruleRows = $ruleModel->getMenusByParentId(0);
        $this->assign('ruleRow', $ruleRow);
        $this->assign('ruleRows', $ruleRows);

        return $this->fetch();

    }

    public function destroy($id)
    {
        $ruleModel = Loader::model('Rule');

        if ($ruleModel->deleteRule($id) === false) {
            return $this->error($ruleModel->getError());
        }
        Loader::model('BackstageLog')->record("删除菜单,ID:[{$id}]");

        return $this->success('菜单删除成功', Url::build('admin/rule/index'));
    }
}
