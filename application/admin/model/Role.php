<?php
namespace app\admin\model;

use \PDOException;
use \think\Db;
use \think\Model;

class Role extends Model
{
    protected $auto = ['status'];

    protected $type = [
        'id'          => 'integer',
        'status'      => 'integer',
        'update_time' => 'timestamp',
        'create_time' => 'timestamp',
    ];

    /**
     * 获取状态
     * @author yongle
     * @dateTime 2016-08-27T16:00:40+0800
     * @param    string                   $value [description]
     * @return   [type]                          [description]
     */
    public function getStatusAttr($value, $data)
    {
        $status = [1 => '<span class="label label-success">启用</span>', 0 => '<span class="label label-warning">禁用</span>'];
        return $status[$value];
    }


    public function getUserCountAttr($value, $data)
    {
        return $this->user()->count();
    }


    public function rule()
    {
        return $this->belongsToMany('Rule', '__ROLE_RULE__', 'rule_id', 'role_id');
    }

    public function user()
    {
        return $this->hasMany('User', 'role_id', 'id');
    }

    public function addRole(array $data)
    {
        return Db::transaction(function () use ($data) {
            $roleModel = new Role;

            $roleId = $roleModel->save([
                'status' => $data['status'],
                'name'   => $data['name'],
                'remark' => $data['remark'],
            ]);

            if ($roleId === false) {
                throw new PDOException($roleModel->getError());
            }
            $roleId++;
            if (isset($data['rules']) && is_array($data['rules']) && !empty($data['rules'])) {
                $roleModel     = $roleModel->find($roleId);
                $data['rules'] = array_map('intval', $data['rules']);
                //插入关联表
                $roleModel->rule()->saveAll($data['rules']);
            }

            return $roleId;
        });
    }


    public function editRole(array $data)
    {
        return Db::transaction(function () use ($data) {
            // 更新
            if ($this->save([
                'status' => $data['status'],
                'name'   => $data['name'],
                'remark' => $data['remark'],
            ], ['id' => $data['id']]) === false) {
                throw new PDOException($this->getError());
            }

            //先删除关联数据
            Db::table('__ROLE_RULE__')->where(['role_id' => $this->id])->delete();

            if (isset($data['rules']) && is_array($data['rules']) && !empty($data['rules'])) {
                $data['rules'] = array_map('intval', $data['rules']);
                //插入关联表
                $this->rule()->saveAll($data['rules']);
            }

        });
    }

  
    public function deleteRole($id)
    {
        $roleModel = $this->find($id);
        if ($roleModel == false) {
            $this->error = '用户组不存在，或者已删除！';
            return false;
        }

        if ($roleModel->user()->count() > 0) {
            $this->error = '用户组下存在用户，不能删除！';
            return false;
        }

        return Db::transaction(function () use ($roleModel) {
            // 先删除关联中间表的数据
            \think\Db::table('role_rule')->where('role_id', $roleModel->id)->delete();

            $roleModel->delete();
        });
    }

}
