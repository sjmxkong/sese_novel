<?php
namespace app\admin\model;

use app\common\tools\Strings;
use \think\Model;

class Aricle extends Model
{

    protected $table = '__CONTENT__';


    /**
     * [aricleAdd description]
     * @author yongle
     * @dateTime 2016-08-27T16:07:16+0800
     * @param  array  $params [description]
     * @return [type] [description]
     */
    public function aricleAdd(array $params)
    {
		$body = Strings::nl2p($params['body']);
        $charnum = Strings::getStrChar($body);
        $price = Strings::getStrPrice($charnum);

        return $this->save([
            'bid'        => $params['bid'],
            'bookname'   => $params['bookname'],
            'title'      => $params['title'],
            'title2'     => $params['title2'],
            'sortid'     => $params['sortid'],
            'ischeck'    => $params['ischeck'],
            'isfree'     => $params['isfree'],
            'body'       => $body,
            'charnum'    => $charnum,
            'price'      => $price,
        ]);
    }

    public function aricleEdit(array $params)
    {
        $aricleRow = self::get($params['id']);

        if ($aricleRow === false) {
            $this->error = "文章不存在或者已删除！";
            return false;
        }
		$body = Strings::nl2p($params['body']);
        $charnum = Strings::getStrChar($body);
        $price = Strings::getStrPrice($charnum);

        return $this->save([
            'bid'        => $params['bid'],
            'title'      => $params['title'],
            'title2'     => $params['title2'],
            'sortid'     => $params['sortid'],
            'ischeck'    => $params['ischeck'],
            'isfree'     => $params['isfree'],
            'body'       => $body,
            'charnum'    => $charnum,
            'price'      => $price,
        ], ['id' => $params['id']]);

    }

    public function deleteAricle($id)
    {
        $aricleRow = self::get($id);
        if ($aricleRow === false) {
            $this->error = "文章不存在或者已删除！";

            return false;
        }
        return $aricleRow->delete();
    }

     public function titleEdit(array $params)
    {
        $aricleRow = self::get($params['id']);

        if ($aricleRow === false) {
            $this->error = "文章不存在或者已删除！";
            return false;
        }

        return $this->save([
            'title'      => $params['title'],
        ], ['id' => $params['id']]);

    }

    public function getBookCharnum($bid){
        return self::where(array('bid'=>$bid))->sum('charnum');
    }
	
	public function getAricleNum(){
        $data['total'] = self::count('id');
		$data['ischeck'] = self::where(array('ischeck'=>1))->count('id');
		$data['isfree'] = self::where(array('ischeck'=>1,'isfree'=>1))->count('id');
		return $data;
    }

    public static function listField()
    {
        return self::field('id,title,title2,sortid,ischeck,isfree,charnum,price,update_time,bookname');
    }
    

}
