<?php
namespace app\common\tools;

/**
 * 获取受访者信息
 */
class Strings
{

    /**
     * 替换字符串中间位置字符为星号
     * @author yongle
     * @dateTime 2016-08-27T10:29:46+0800
     * @param  [type] $str [description]
     * @return [type] [description]
     */
    public static function replaceToStar($str)
    {
        $len = strlen($str) / 2;

        return substr_replace($str, str_repeat('*', $len), floor(($len) / 2), $len);
    }

    /**
     * 获取文件访问地址
     * @author yongle
     * @dateTime 2016-08-27T12:46:17+0800
     * @param string $value [description]
     */
    public static function fileWebLink($realPath)
    {
        $replace = dirname(ROOT_PATH);
        $link = str_replace($replace, '', $realPath);
        return str_replace('/static', '', $link);
    }

    /**
     * 通过文件访问地址获取 文件绝对地址
     * @author yongle
     * @dateTime 2016-08-27T10:10:03+0800
     * @param  string $value [description]
     * @return [type] [description]
     */
    public static function fileWebToServer($webLink)
    {
        $replace = dirname(ROOT_PATH);

        return $replace . $webLink;
    }

    /**
     * 删除文件
     * @author yongle
     * @dateTime 2016-08-28T15:31:35+0800
     * @param  string $value [description]
     * @return [type] [description]
     */
    public static function deleteFile($filename)
    {
        if (!file_exists($filename)) {
            $filename = self::fileWebToServer($filename);
        }

        if (file_exists($filename) && is_file($filename)) {
            unlink($filename);
        }
    }

    public static function makeCache($name, $data, $type){
       $dir=CODE_DIR.$type;
       if(!is_dir($dir)){
           mkdir($dir, 0755);
       }
       $filename=$dir.'/'.md5($name).'.php';
       $content='<?php if(ACCESS_GRANT!=1){die("Forbidden Access");} ';
       if(is_array($data)){
           $content.='$cache_type=\'array\'; ';
           $data=serialize($data);
       }
        $data=str_replace("'","”",$data);
       $content.='$cache_data=\''.$data.'\'; ';
       $content.='?>';
       
       if(!$fp = fopen($filename, "wa")){      
          return 'open fail';
       }     
       if(!fwrite($fp, $content)){
          fclose($fp);     
          return 'write fail';     
       }             
       fclose($fp);
       return true; 
    }

    public static function getAricleDir($id){
        return 'storys/'.floor($id%1000);
    }

    public static function password($string)
    {
        return md5($string);
    }

    public static function getStrChar($str){
		$str = strip_tags($str);
		$str = str_replace(PHP_EOL, '', $str);
		$str = strtr($str,array("\x0D" => ""));
        return mb_strlen($str, 'UTF-8');
    }
	
	public static function nl2p($string) {
		return $string;
	/*
		if(!strstr($string,'<br')) return $string;
		$string = str_replace(array('<br/>','<br />'), '<br>', $string);
		$string = str_replace(PHP_EOL, '', $string);
		$string = str_replace(array('<br><br>'), '<br>', $string);
        $string = str_replace(array('<p>','</p>','&nbsp;'), '', $string);
        $string = '<p>'.preg_replace("/<br>/i", "</p><p>", trim($string)).'</p>';
		$string = str_replace('<p></p><p>', '<p>', $string);
		$string = str_replace('</p><p></p>', '</p>', $string);
		return $string;
	*/
}

    public static function getStrPrice($num){
        return floor($num/200);
    }
}
