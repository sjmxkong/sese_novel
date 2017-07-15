<?php
namespace app\admin\model;

use \think\Model;

class Category extends Model
{
    protected $type = [
        'id'          => 'integer',
        'sort'        => 'integer',
        'update_time' => 'timestamp',
        'create_time' => 'timestamp',
    ];


    /**
     * [ariclecategoryAdd description]
     * @author yongle
     * @dateTime 2016-08-26T16:58:42+0800
     * @param    array                    $params [description]
     * @return   [type]                           [description]
     */
    public function categoryAdd(array $params)
    {
        return $this->save([
            'title'       => $params['title'],
            'sort'        => $params['sort'],
        ]);
    }


    public function categoryEdit(array $params)
    {
        return $this->save([
            'title'       => $params['title'],
            'sort'        => $params['sort'],
        ], ['id' => $params['id']]);
    }

  
    public function deleteCategory($id)
    {
        $categoryRow = self::get($id);

        if ($categoryRow == false) {
            $this->error = "分类不存在";
            return false;
        }

        return $categoryRow->delete();
    }
}
