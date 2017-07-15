<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/data/www/sese.dushu5.com/public/../application/admin/view/aricle/index.html";i:1478785853;s:70:"/data/www/sese.dushu5.com/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">文章列表</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="<?php echo url('admin/aricle/index'); ?>" method="get" style="width: 80%;float: left;">
                            <select name="bid">
                                <option value="0">全部</option>
                                <?php if(is_array($bookList) || $bookList instanceof \think\Collection): $i = 0; $__LIST__ = $bookList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $book['bid']; ?>" <?php if($query['bid'] == $book['bid']): ?>selected="selected"<?php endif; ?>><?php echo $book['bid']; ?>:<?php echo $book['bookname']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <select name="order">
                                <option value="1" <?php if($query['order'] == 1): ?>selected="selected"<?php endif; ?>>章节降序</option>
                                <option value="2" <?php if($query['order'] == 2): ?>selected="selected"<?php endif; ?>>章节升序</option>
                                <option value="3" <?php if($query['order'] == 3): ?>selected="selected"<?php endif; ?>>字数降序</option>
                                <option value="4" <?php if($query['order'] == 4): ?>selected="selected"<?php endif; ?>>字数升序</option>
                            </select>
                            <select name="pnum">
                                <option value="10" <?php if($query['pnum'] == 10): ?>selected="selected"<?php endif; ?>>10/页</option>
				<option value="20" <?php if($query['pnum'] == 20): ?>selected="selected"<?php endif; ?>>20/页</option>
                                <option value="50" <?php if($query['pnum'] == 50): ?>selected="selected"<?php endif; ?>>50/页</option>
                                <option value="100" <?php if($query['pnum'] == 100): ?>selected="selected"<?php endif; ?>>100/页</option>
                                <option value="500" <?php if($query['pnum'] == 500): ?>selected="selected"<?php endif; ?>>500/页</option>
                                <option value="1000" <?php if($query['pnum'] == 1000): ?>selected="selected"<?php endif; ?>>1000/页</option>
                            </select>
                            <input type="text" value="<?php echo $query['sid']; ?>" name="sid" size=4 placeholder="章节ID">
                            <input type="text" value="<?php echo $query['kw']; ?>" name="kw" placeholder="内容关键字">
                        <button type="submit" class="btn btn-primary">提交</button> <a href="<?php echo url('admin/aricle/add',['bid'=>$query['bid']]); ?>" class="btn btn-success">添加</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                <form action="<?php echo url('admin/aricle/editall'); ?>" method="post"  class="form-horizontal ajax-form">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                        	<th><input class="check-all" type="checkbox" value=""></th>
                            <th>章节</th>
                            <th>标题(双击编辑)</th>
                            <th>原标题</th>
                            <th>图书</th>
                            <th>字数</th>
                            <th>书币</th>
                            <th>是否收费</th>
                            <th>是否发布</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($aricleRows) || $aricleRows instanceof \think\Collection): $i = 0; $__LIST__ = $aricleRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aricleRow): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>>
                        	<td><input class="check" type="checkbox" name="aids[]" value="<?php echo $aricleRow->id; ?>"></td>
                            <td><?php echo $aricleRow['sortid']; ?></td>
                            <td class="text-left content" id="<?php echo $aricleRow['id']; ?>"><?php echo $aricleRow->title; ?></td>
                            <td class="text-left"><?php echo $aricleRow->title2; ?></td>
                            <th>《<?php echo $aricleRow->bookname; ?>》</th>
                            <td><?php echo $aricleRow->charnum; ?></td>
                            <td><?php echo $aricleRow->price; ?></td>
                            <td><?php if($aricleRow->isfree == 1): ?><span class="label label-success">免费</span><?php else: ?><span class="label label-warning">收费</span><?php endif; ?></td>
                            <td><?php if($aricleRow->ischeck == 1): ?><span class="label label-success">已发布</span><?php else: ?><span class="label label-warning">未审核</span><?php endif; ?></td>
                            <td><?php echo date("Y-m-d",$aricleRow->update_time); ?></td>
                            <td>
                                <a class="btn btn-xs btn-default" href="<?php echo url('admin/aricle/edit',['id'=>$aricleRow['id'],'gourl'=>$query['gourl']]); ?>">编辑</a>
                                <a class="btn btn-xs btn-default delete" href="<?php echo url('admin/aricle/destroy',['id'=>$aricleRow['id'],'gourl'=>$query['gourl']]); ?>">删除</a>
                                <a class="btn btn-xs btn-default" target="_blank" href="<?php echo $webUrl; ?>story-id-<?php echo $aricleRow['id']; ?>.html">查看</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                     <label><input type="radio" name="etype" value="1">收费</label>
                     <label><input type="radio" name="etype" value="2">免费</label>
                     <label><input type="radio" name="etype" value="3">发布</label>
                     <label><input type="radio" name="etype" value="4">未发布</label>
                     <button type="submit" class="btn btn-primary">批量修改文章状态</button>
                    </form>
                </div>
            </div>
            <div class="panel-footer">
            <?php echo $pages; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
    $(".content").dblclick(function(){
        var inval = $(this).html(); 
        var id = $(this).attr("id");
        $(this).html("<input type='text' id='edit"+id+"' value='"+inval+"'>");
        $("#edit"+id).focus().blur(function() {
            var editval = $(this).val();
            if(!editval || editval==inval){
                $(this).parent().html(inval);
                return;
            } else {
                $(this).parent().html(editval);
                $.post("<?php echo url('admin/aricle/edittitle'); ?>",{id:id,title:editval},function(data) {
                })
            }
        })
    })
})
$(function(argument) {
    $('form.ajax-form').formYlBook([]);
});
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
