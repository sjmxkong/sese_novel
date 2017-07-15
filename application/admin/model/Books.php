<?php
namespace app\admin\model;

use \think\Model;
use think\Db;

class Books extends Model
{

    /**
     * [booksAdd description]
     * @author yongle
     * @dateTime 2016-08-27T15:31:22+0800
     * @param    array                    $params [description]
     * @return   [type]                           [description]
     */
    public function booksAdd(array $params)
    {
        return $this->save([
            'catid'   => $params['catid'],
            'bookname'    => $params['bookname'],
            'description' => $params['description'],
            'ischeck'     => $params['ischeck'],
            'iscommend'   => $params['iscommend'],
            'status'      => $params['status'],
            'author'      => $params['author'],
            'litpic'      => $params['litpic'],
			'memo'        => $params['memo'],
        ]);
    }

    public function booksEdit(array $params)
    {
        return $this->save([
            'catid'       => $params['catid'],
            'bookname'    => $params['bookname'],
            'description' => $params['description'],
            'ischeck'     => $params['ischeck'],
            'iscommend'   => $params['iscommend'],
            'status'      => $params['status'],
            'author'      => $params['author'],
            'litpic'      => $params['litpic'],
			'memo'        => $params['memo'],
        ], ['bid' => $params['bid']]);
    }

    public function booknameEdit($bid,$bookname)
    {
        return Db::table('__CONTENT__')->where('bid',$bid)->update([
            'bookname'    => $bookname,
        ]);
    }

    public function catidEdit($bid,$catid)
    {
        return Db::table('__CONTENT__')->where('bid',$bid)->update([
            'catid'    => $catid,
        ]);
    }

    public function deleteBooks($bid)
    {
        $row = self::get($bid);
        if ($row == false) {
            $this->error = "图书不存在";
            return false;
        }
        return $row->delete();
    }
	
	 public function commendEdit(array $params)
    {
        $row = self::get($params['bid']);
        if ($row === false) {
            $this->error = "图书不存在或者已删除！";
            return false;
        }
        return $this->save([
            $params['utype']  => $params['iscommend']+0,
        ], ['bid' => $params['bid']]);

    }

    public static function listField()
    {
        return self::field('bid,bookname,catid,charnum,price,author,ischeck,iscommend,isnew,ishot,status,memo,update_time');
    }
	
	 public function updateBookCharnum($bid,$charnum)
    {
        return $this->save([
            'charnum'       => $charnum,
        ], ['bid' => $bid]);
    }
	
	public function getBookNum(){
        $data['total'] = self::count('bid');
		$data['ischeck'] = self::where(array('ischeck'=>1))->count('bid');
		$data['isfinish'] = self::where(array('status'=>1))->count('bid');
		return $data;
    }
	
	public function feedback($wh)
    {
        $sql="select * from bk_story_feedback where 1 $wh";
        return Db::query($sql);
    }
	
	 public function feedback_add($ids,$type)
    {
		if(!$ids) return false;
		if(!in_array($type,array(-1,1))) return false;
        $sql="update bk_story_feedback set ischeck='$type' where id in($ids)";
		return Db::execute($sql);
    }

}
