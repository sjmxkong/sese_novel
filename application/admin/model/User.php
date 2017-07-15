<?php
namespace app\admin\model;

use \app\common\tools\Strings;
use \think\Config;
use \think\Db;
use \think\Loader;
use \think\Model;
use \think\Session;

class User extends Model
{
    protected $insert = ['password'];
    protected $table = '__ADMIN__';

    protected $type = [
        'id'          => 'integer',
        'role_id'     => 'integer',
        'status'      => 'integer',
        'sex'         => 'integer',
        'update_time' => 'timestamp',
        'create_time' => 'timestamp',
    ];

    public function role()
    {
        return $this->belongsTo('Role');
    }

    /**
     * 用户登录
     * @author yongle
     * @dateTime 2016-08-27T11:31:15+0800
     * @params    array                   $value = array(
     *                                                'email'=>'',
     *                                                'password'=> ''
     *                                             ) [description]
     * @return [type] [description]
     */
    public function login(array $params)
    {
        $userRow = Db::table('__ADMIN__')->field([
            'id', 'name', 'role_id', 'status', 'password', 'sex', 'birthday', 'tel', 'email',
        ])->where('email', $params['email'])->find();

        if (empty($userRow) || $userRow['status'] == 0 || $userRow['password'] != $this->setPasswordAttr($params['password'])) {

            if (empty($userRow)) {
                $this->error = '用户名/邮箱不存在！';
            } elseif ($userRow['status'] == 0) {
                $this->error = '该用户已被禁用，请联系管理员。';
            } elseif ($userRow['password'] != $this->setPasswordAttr($params['password'])) {
                $this->error = '密码错误！';
            }

            Loader::model('BackstageLog')->record("登录失败,email:[{$params['email']}] password:[" . Strings::replaceToStar($params['password']) . ']');

            return false;
        }

        unset($userRow['password']);

        Session::set(Config::get('login_session_identifier'), $userRow);
        Loader::model('BackstageLog')->record('登录');

        return $userRow;
    }

 
    public function profileEdit(array $data)
    {
        if (isset($data['password']) && $data['password'] == '') {
            unset($data['password']);
        } else {
            $data['password'] = $this->setPasswordAttr($data['password']);
        }

        $pk = $this->getPk();
        if (!isset($data[$pk])) {
            $this->error = '参数不对！';

            return false;
        }

        $profile = $this->find($data[$pk]);
        if (isset($data['head']) && $profile['head'] != $data['head']) {
            $this->deleteHead($profile['head']);
        }

        return $this->profileEditField()->save($data, [$pk => $data[$pk]]);

    }

 
    public function userAdd(array $data)
    {
        return $this->userAddField()->save($data);
    }

  
    public function deleteUser($id)
    {
        $profile = $this->find($id);
        return $profile->delete();
    }

    public function userAddField()
    {
        return $this->allowField(['name', 'email', 'password', 'status', 'sex', 'head', 'birthday', 'tel', 'role_id']);
    }


    protected function profileEditField()
    {
        return $this->allowField(['name', 'password', 'status', 'sex', 'head', 'birthday', 'tel', 'role_id']);
    }

    public function getStatusAttr($value)
    {
        $status = [0 => '禁用', 1 => '启用'];

        return $status[$value];
    }

 
    public function getSexAttr($value)
    {
        $status = [0 => '保密', 1 => '男', 2 => '女'];

        return $status[$value];
    }


    protected function setPasswordAttr($password, $data = array())
    {
        return Strings::password($password);
    }

    protected function setBirthdayAttr($birthday, $data = array())
    {
        if ($birthday == '') {
            return "1970-01-01";
        }
        return $birthday;
    }

}
