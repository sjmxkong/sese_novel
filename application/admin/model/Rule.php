<?php
namespace app\admin\model;

use think\Config;
use think\Db;
use think\Model;
use think\Request;
use think\Session;

class Rule extends Model
{
    protected $autoWriteTimestamp = false;

    /**
     * [user description]
     * @author yongle
     * @dateTime 2016-08-26T14:36:59+0800
     * @return   [type]                   [description]
     */
    public function parent()
    {
        return $this->hasMany('Rule', 'parent_id', 'id');
    }


    public function getIslinkAttr($islink, $data)
    {
        $islinks = [0 => '<span class="label label-success">操作</span>', 1 => '<span class="label label-info">菜单</span>'];
        return $islinks[$islink];
    }

  
    public function getIconAttr($islink, $data)
    {
        return ($islink === '') ? '' : '<i class="' . $islink . '"></i>';
    }

    public function getSortAttr($sort, $data)
    {
        return '<input type="text" value="' . $sort . '" class="sort"/>';
    }

    public function getRulesByRoleId($roleId)
    {
        return Db::table('__ROLE_RULE__')
            ->field('r.id,r.name,r.title')
            ->alias('rr')
            ->join('__RULE__ as r', 'rr.rule_id=r.id')
            ->where(['rr.role_id'=>$roleId])
            ->order('r.parent_id ASC , r.sort ASC')
            ->select();
    }

    public function checkRule($roleId = 0, $name = '')
    {
        // 没有传role_id 获取登陆用户的用户组
        if ($roleId == 0) {
            if (Session::has(Config::get('login_session_identifier'))) {
                $roleId = Session::get(Config::get('login_session_identifier') . ".role_id");
            }
        }
        // 没有传auth地址获取当前
        if ($name == '') {
            $request = Request::instance();
            $name    = $request->controller() . '/' . $request->action();
            // $name = CONTROLLER_NAME . "/" . ACTION_NAME;
        }

        $rule = Db::table('__ROLE_RULE__')
            ->alias('rr')
            ->join('__RULE__ as r', 'rr.rule_id=r.id')
            ->where('rr.role_id', $roleId)
            ->where('r.name', $name)
            ->count('r.id');
        if ($rule > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getMenusByRoleId($roleId)
    {
        $ruleRows = Db::table('__ROLE_RULE__')
            ->field('r.id,r.name,r.title,r.parent_id,r.icon')
            ->alias('rr')
            ->join('__RULE__ as r', 'rr.rule_id=r.id')
            ->where(['rr.role_id'=>$roleId])
            ->order('r.parent_id ASC , r.sort ASC')
            ->select();

            // Db::table('__RULE__')
            // ->field('id, parent_id,name,title,icon')
            // ->where('islink', 1)
            // ->order('parent_id ASC , sort ASC')
            // ->select();

        if (empty($ruleRows)) {
            return [];
        }

        $ruleData = [];
        foreach ($ruleRows as $key => $ruleRow) {
            if ($ruleRow['parent_id'] == 0) {
                if (isset($ruleData[$ruleRow['id']])) {
                    $ruleData[$ruleRow['id']] = array_merge($ruleData[$ruleRow['id']], $ruleRow);
                } else {
                    $ruleData[$ruleRow['id']] = $ruleRow;
                }
            } else {
                $ruleData[$ruleRow['parent_id']]['sub'][$ruleRow['id']] = $ruleRow;
            }
        }

        return $ruleData;
    }


    public function getAllRule()
    {
        $rules = $this->getMenusByParentId(0, false);

        foreach ($rules as $key => $rule) {
            $rules[$key]['sub'] = $this->getMenusByParentId($rule['id'], false);
        }

        return $rules;
    }


    public function getMenusByParentId($parentId = 0, $islink = true)
    {
        if ($islink) {
            $this->where('islink', 1);
        }
        return $this
            ->field('id,title')
            ->where('parent_id', $parentId)
            ->order('parent_id ASC , sort ASC')
            ->select();
    }


    public function deleteRule($id)
    {
        $ruleModel = $this->find($id);
        if ($ruleModel == false) {
            $this->error = '权限不存在，或者已删除！';
            return false;
        }

        if ($ruleModel->parent()->count() > 0) {
            $this->error = '权限下存在其他，不能删除！';
            return false;
        }

        return Db::transaction(function () use ($ruleModel) {
            // 先删除关联中间表的数据
            Db::table('__ROLE_RULE__')->where('rule_id', $ruleModel->id)->delete();

            $ruleModel->delete();
        });
    }
}
