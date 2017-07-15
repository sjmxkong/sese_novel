<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\common\tools\Strings;
use think\Loader;
use think\Request;
use think\Url;

class Category extends AdminBase
{
    /**
     * [index description]
     * @author yongle
     * @dateTime 2016-08-26T10:39:15+0800
     * @return [type] [description]
     */
    public function index()
    {
        $CategoryRows = Loader::model('Category')::order('sort asc')->select();
        $this->assign('CategoryRows', $CategoryRows);

        foreach($CategoryRows as $cat){
            $cate[$cat['id']]=$cat['title'];
        }
        Strings::makeCache('CategoryRows',$cate,'datas');

        return $this->fetch();
    }


    public function add()
    {
        $request = Request::instance();
        if ($request->isAjax()) {
            $params = $request->param();

            if (($CategoryId = Loader::model('Category')->CategoryAdd($params)) === false) {
                return $this->error(Loader::model('Category')->getError());
            }

            Loader::model('BackstageLog')->record("添加文章分类：[{$CategoryId}]");

            return $this->success('文章分类添加成功', Url::build('admin/Category/index'));
        }

        return $this->fetch();
    }

    public function edit($id)
    {
        $request = Request::instance();
        if ($request->isAjax()) {
            $params       = $request->param();
            $params['id'] = $id;

            if (($CategoryId = Loader::model('Category')->CategoryEdit($params)) === false) {
                return $this->error(Loader::model('Category')->getError());
            }

            Loader::model('BackstageLog')->record("修改文章分类页面：[{$id}]");

            return $this->success('文章分类修改成功', Url::build('admin/Category/index'));
        }

        $CategoryRow  = Loader::model('Category')::where(['id' => $id])->find();
        $this->assign('CategoryRow', $CategoryRow);

        return $this->fetch();
    }


    public function destroy($id)
    {
        $CategoryModel = Loader::model('Category');

        if ($CategoryModel->deleteCategory($id) === false) {
            return $this->error($CategoryModel->getError());
        }
        Loader::model('BackstageLog')->record("删除文章分类页面,ID:[{$id}]");

        return $this->success('文章分类删除成功', Url::build('admin/Category/index'));
    }
}
