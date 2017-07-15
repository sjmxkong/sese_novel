<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use \think\Loader;

class Index extends AdminBase
{
    /**
     * 后台主面板
     * @author yongle
     * @dateTime 2016-08-26T17:32:36+0800
     * @return [type] [description]
     */
    public function index()
    {
        $ruleData = Loader::model('Rule')->getMenusByRoleId($this->userRow['role_id']);
        $this->assign('userRow', $this->userRow);
        $this->assign('ruleData', $ruleData);

        return $this->fetch();
    }

    /**
     * 主面板
     * @author yongle
     * @dateTime 2016-05-17T10:13:54+0800
     * @return [type] [description]
     */
    public function main()
    {
	if($this->userRow['role_id']<=2){
		$totalData['book']   =  Loader::model('Books')->getBookNum();
		$totalData['aircle'] =  Loader::model('Aricle')->getAricleNum();
        $totalData['user']   =  Loader::model('Total')->getUserNum();
        $totalData['pay']    =  Loader::model('Total')->getPayCount();
        $totalData['cost']    =  Loader::model('Total')->getCostCount();
		$this->assign('totalData', $totalData);
	}
        return $this->fetch();
    }

    public function auth()
    {
        return "没有权限！";
    }
}
