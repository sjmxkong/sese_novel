<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/data/www/sese.dushu5.com/public/../application/admin/view/agent/material.html";i:1478785771;s:70:"/data/www/sese.dushu5.com/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">素材列表</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                     <form action="<?php echo url('admin/agent/material'); ?>" method="get" style="width: 80%;float: left;">
                     	<select name="type">
                            <option value="0">-请选择-</option>
                            <?php if(is_array($mrtype) || $mrtype instanceof \think\Collection): $i = 0; $__LIST__ = $mrtype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($query['type'] == $key): ?>selected="selected"<?php endif; ?>><?php echo $pt; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <select name="bid">
                            <option value="0">-请选择-</option>
                            <?php if(is_array($bookList) || $bookList instanceof \think\Collection): $i = 0; $__LIST__ = $bookList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $book['bid']; ?>" <?php if($query['bid'] == $book['bid']): ?>selected="selected"<?php endif; ?>><?php echo $book['bid']; ?>:<?php echo $book['bookname']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                            标题名：<input type="text" name="kw" value="<?php echo $query['kw']; ?>">
                        <button type="submit" class="btn btn-primary">提交</button> <a href="<?php echo url('admin/agent/material_add'); ?>" class="btn btn-success">添加</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th>素材ID</th>
                            <th>排序</th>
                            <th>素材类型</th>
                            <th width="20%">素材图片</th>
                            <th>推广标题</th>
                            <th>推广链接</th>
                            <th>增加时间</th>
                            <th>状态</th>
                        </tr>
                        <?php if(is_array($material) || $material instanceof \think\Collection): $i = 0; $__LIST__ = $material;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mate): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>>
                            <td><?php echo $mate->id; ?></td>
                            <td class="dbclick" id="<?php echo $mate['id']; ?>"><?php echo $mate->rank; ?></td> 
                            <td><?php echo $mrtype[$mate->type]; ?></td>
                            <td class="text-left"><a href="<?php echo $imgUrl; ?><?php echo $mate->pic; ?>"><?php echo $imgUrl; ?><?php echo $mate->pic; ?></a></td>  
                            <td class="text-left"><?php echo $mate->title; ?></td>  
                            <td class="text-left"><a href="<?php echo $mate->url; ?>"><?php echo $mate->url; ?></a></td>
                            <td><?php echo date("Y-m-d H:i:s",$mate->addtime); ?></td>
                            <td class="text-left"><?php if($mate->state==1): ?>正常<?php else: ?>下架<?php endif; ?></td>
                            <td>
                                <a class="btn btn-xs btn-default" href="<?php echo url('admin/agent/material_edit',['id'=>$mate['id'],'gourl'=>$query['gourl']]); ?>">编辑</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
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
    $(".dbclick").dblclick(function(){
        var inval = $(this).html(); 
        var id = $(this).attr("id");
        $(this).html("<input size='3' type='text' id='editmate"+id+"' value='"+inval+"'>");
        $("#editmate"+id).focus().blur(function() {
            var editval = $(this).val();
            if(!editval || editval==inval || editval<=0){
                $(this).parent().html(inval);
                return;
            } else {
                $(this).parent().html(editval);
                $.post("<?php echo url('admin/agent/editmaterank'); ?>",{id:id,val:editval},function(data) {
                })
            }
        })
    })
})
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
