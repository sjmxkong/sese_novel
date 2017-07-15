<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/data/www/sese.axs8.net/public/../application/admin/view/role/edit.html";i:1473234388;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">用户组添加</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="<?php echo url('admin/role/edit',['id'=>$roleRow['id']]); ?>" class="form-horizontal ajax-form" method="post" name="rule">
                            <div class="form-group">
                                <label for="inputname" class="col-sm-3 control-label">用户组名称</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" id="inputname" value="<?php echo $roleRow['name']; ?>" placeholder="菜单名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputstatus"> 是否启用 </label>
                                <div class="col-sm-5">
                                    <?php if($roleRow->getData('status') == 1): ?>
                                    <input type="checkbox" name="status" checked="checked" id="inputstatus" value="1" />
                                    <?php else: ?>
                                    <input type="checkbox" name="status" id="inputstatus" value="1" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputremark"> 简单说明 </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="remark" id="inputremark"><?php echo $roleRow['remark']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">权限管理</label>
                                <div class="col-sm-8">
                                    <div class="widget-group">
                                    <?php if(is_array($ruleRows) || $ruleRows instanceof \think\Collection): $i = 0; $__LIST__ = $ruleRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rules): $mod = ($i % 2 );++$i;?>
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h5 class="widget-title">
                                                    <label>
                                                        <?php if(in_array($rules['id'], $myRuleRows)): ?>
                                                        <input name="rules[]" class="ace ace-checkbox-2 father" checked="checked" type="checkbox" value="<?php echo $rules['id']; ?>">
                                                        <?php else: ?>
                                                        <input name="rules[]" class="ace ace-checkbox-2 father" type="checkbox" value="<?php echo $rules['id']; ?>">
                                                        <?php endif; ?>
                                                        <span class="lbl"> <?php echo $rules['title']; ?> </span>
                                                    </label>
                                                </h5>
                                            </div>
                                            <div class="widget-body collapse in">
                                                <div class="widget-main row">
                                                   <?php if(is_array($rules['sub']) || $rules['sub'] instanceof \think\Collection): $i = 0; $__LIST__ = $rules['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rule): $mod = ($i % 2 );++$i;?>
                                                    <label class="col-xs-4">
                                                    <?php if(in_array($rule['id'], $myRuleRows)): ?>
                                                    <input name="rules[]" class="ace ace-checkbox-2 children" checked="checked" type="checkbox" value="<?php echo $rule['id']; ?>">
                                                    <?php else: ?>
                                                        <input name="rules[]" class="ace ace-checkbox-2 children" type="checkbox" value="<?php echo $rule['id']; ?>">
                                                    <?php endif; ?>
                                                        <span class="lbl"> <?php echo $rule['title']; ?></span>
                                                    </label>

                                                    <?php if(is_array($rule->parent) || $rule->parent instanceof \think\Collection): $i = 0; $__LIST__ = $rule->parent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ru): $mod = ($i % 2 );++$i;?>
                                                    <label class="col-xs-4">
                                                    <?php if(in_array($ru['id'], $myRuleRows)): ?>
                                                        <input name="rules[]" class="ace ace-checkbox-2 children" type="checkbox" checked="checked" value="<?php echo $ru['id']; ?>">
                                                        <?php else: ?>
                                                        <input name="rules[]" class="ace ace-checkbox-2 children" type="checkbox" value="<?php echo $ru['id']; ?>">
                                                    <?php endif; ?>
                                                        <span class="lbl"> <?php echo $ru['title']; ?></span>
                                                    </label>
                                                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
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
    $('form.ajax-form').formYlBook([

    ]);

    $('.children').on('ifChecked',function (argument) {
         if(!$(this).parents('.widget-box').find('.father').is('checked')){
            $(this).parents('.widget-box').find('.father').iCheck('check');
         }
    });
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
