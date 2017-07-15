<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/data/www/sese.axs8.net/public/../application/admin/view/rule/add.html";i:1472295815;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1475852854;}*/ ?>
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
                    <li><a href="<?php echo url('index/main'); ?>">首页</a></li>
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
            <div class="panel-heading">菜单添加</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="<?php echo url('admin/rule/add'); ?>" class="form-horizontal ajax-form" method="post" name="rule">
                            <div class="form-group">
                                <label for="inputparent_id" class="col-sm-3 control-label">上级菜单</label>
                                <div class="col-sm-5">
                                    <select name="parent_id" id="inputparent_id" class="form-control">
                                        <option value="0">顶级菜单</option>
                                        <?php if(is_array($ruleRows) || $ruleRows instanceof \think\Collection): $i = 0; $__LIST__ = $ruleRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></option>
                                        <?php if(is_array($vo->parent) || $vo->parent instanceof \think\Collection): $i = 0; $__LIST__ = $vo->parent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['id']; ?>">------<?php echo $v['title']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTitle" class="col-sm-3 control-label">菜单名称</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" id="inputTitle" placeholder="菜单名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">菜单链接</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" id="inputName" placeholder="菜单链接"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputIcon"> ICON图标 </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="icon" id="inputIcon" placeholder="ICON图标"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputislink"> 是否菜单链接 </label>
                                <div class="col-sm-5">
                                    <input type="checkbox" name="islink" id="inputislink" value="1" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputSort"> 排序 </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control " name="sort" value="255" id="inputSort" placeholder="越小越靠前">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(argument) {
    $('form.ajax-form').formYlBook([{
        name: "parent_id",
        display: '上级菜单',
        rules: 'required|integer'
    }, {
        name: "title",
        display: "菜单名称",
        rules: "required"
    },{
        name: "name",
        display: "菜单链接",
        rules: "required|rule_name"
    },{
        name: "sort",
        display: "排序",
        rules: "required|integer"
    }]);
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
