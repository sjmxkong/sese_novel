<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/data/www/sese.axs8.net/public/../application/admin/view/cache/index.html";i:1475668136;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta>
    <title>首页</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap.css">
    <!-- 可选的Bootstrap主题文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap-axs8.css">
    <link rel="stylesheet" href="/static/admin/js/messenger/css/messenger.css">
    <link rel="stylesheet" href="/static/admin/js/messenger/css/messenger-theme-air.css">
    <link rel="stylesheet" href="/static/admin/js/icheck-1.x/skins/minimal/green.css">
    <link href="/static/admin/js/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <?php if(isset($breadcrumb)): ?>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <?php if(is_array($breadcrumb) || $breadcrumb instanceof \think\Collection): $i = 0; $__LIST__ = $breadcrumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?php echo url($vo['name']); ?>"><?php echo $vo['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ol>
            </div>
        </div>
        <?php endif; ?>
        

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">选择书本和选择缓存更新类型</div>
            <div class="panel-body">
            	 <form action="<?php echo url('admin/cache/index'); ?>" class="form-horizontal ajax-form" method="post" name="cache">
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th><input class="check-all" type="checkbox" value="">全选  > <a href="javascript:showbl(1);">已发布</a> <a href="javascript:showbl(2);">未发布</a></th> 
                        </tr>
                        <tr><td>
                        <table id="blist1" class="table  table-bordered table-hover">
                            <tr>
                        	<?php if(is_array($booklist1) || $booklist1 instanceof \think\Collection): $i = 0; $__LIST__ = $booklist1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?>
                            <td class="text-left"><input class="check" name="bids[]" type="checkbox" value="<?php echo $book->bid; ?>">(<?php echo $book->bid; ?>)<?php echo $book->bookname; ?></td>
                            <?php if($key%5==4): ?></tr><tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </tr>
                        </table>
                        </td></tr>
                        <tr><td>
                        <table id="blist2" style="display: none;" class="table  table-bordered table-hover">
                        <tr>
                            <?php if(is_array($booklist2) || $booklist2 instanceof \think\Collection): $i = 0; $__LIST__ = $booklist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?>
                            <td class="text-left"><input class="check" name="bids[]" type="checkbox" value="<?php echo $book->bid; ?>">(<?php echo $book->bid; ?>)<?php echo $book->bookname; ?></td>
                            <?php if($key%5==4): ?></tr><tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        </table>
                        </td></tr>
                        <tr>
                        	<td class="active">
                            	<label><input type="radio" name="ctype" value="4">更新首页内容</label>
                            	<label><input type="radio" name="ctype" value="1">仅更新图书</label>
                                <label><input type="radio" name="ctype" value="2">仅更新章节</label>
                                <label><input type="radio" name="ctype" value="3">更新图书和章节</label>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="5"> <button type="submit" class="btn btn-primary">提交</button></td>
                        </tr>
                    </table>
                </div>
            </div>
             </form>
            <div class="panel-footer">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(argument) {
    $('form.ajax-form').formYlBook([]);
});
function showbl(type){
    if(type==1){
        $('#blist1').show();
        $('#blist2').hide();
    } else {
        $('#blist1').hide();
        $('#blist2').show();
    }
}
</script>

    </div>
    <script type="text/javascript" src="/static/admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="/static/admin/js/bootbox.js"></script>
    <script type="text/javascript" src="/static/admin/js/messenger/js/messenger.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/validate.js"></script>
    <script type="text/javascript" src="/static/admin/js/icheck-1.x/icheck.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="/static/admin/js/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript" src="/static/admin/js/luffyuploadpic.js"></script>
    <script type="text/javascript" src="/static/admin/js/global.js"></script>
    <script type="text/javascript" src="/static/admin/js/start.js"></script>
</body>

</html>
