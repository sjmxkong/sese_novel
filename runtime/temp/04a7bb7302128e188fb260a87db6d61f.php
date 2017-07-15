<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/data/www/sese.axs8.net/public/../application/admin/view/user/profile.html";i:1472295817;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">资料修改</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="<?php echo url('admin/user/profile'); ?>" class="form-horizontal ajax-form" method="post" name="rule">
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">登录账户</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" id="inputemail" disabled="disabled" value="<?php echo $userRow['email']; ?>" placeholder="用户邮件地址"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputname" class="col-sm-3 control-label">用户姓名</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" id="inputname" value="<?php echo $userRow['name']; ?>" placeholder="菜单名称">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputpassword" class="col-sm-3 control-label">用户密码</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" id="inputpassword" placeholder="用户密码">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputrepassword" class="col-sm-3 control-label">确认密码</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="repassword" id="inputrepassword" placeholder="确认密码">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputsex"> 性别 </label>
                                <div class="col-sm-5">
                                <?php if($userRow['sex'] == 0): ?>
                                    <input type="radio" name="sex" id="inputsex" value="0" checked="checked" />
                                <?php else: ?>
                                    <input type="radio" name="sex" id="inputsex" value="0" />
                                <?php endif; ?>
                                    保密
                                <?php if($userRow['sex'] == 1): ?>
                                    <input type="radio" name="sex" id="inputsex" value="1" checked="checked" />
                                <?php else: ?>
                                    <input type="radio" name="sex" id="inputsex" value="1" />
                                <?php endif; ?>
                                    男
                                <?php if($userRow['sex'] == 2): ?>
                                    <input type="radio" name="sex" id="inputsex" value="2" checked="checked" />
                                <?php else: ?>
                                    <input type="radio" name="sex" id="inputsex" value="2" />
                                <?php endif; ?>
                                    女
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputtel"> 联系号码 </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tel" value="<?php echo $userRow['tel']; ?>" id="inputtel" placeholder="电话号码">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputbirthday" class="col-sm-3 control-label">生日</label>
                                <div class="col-sm-5">
                                    <div class="widget-group">
                                        <input type="text" class="form-control date" value="<?php echo $userRow['birthday']; ?>" name="birthday" id="inputbirthday" placeholder="生日">
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
    $('form.ajax-form').formYlBook([{
        name: "name",
        display: '用户姓名',
        rules: 'required|ruleNameRegex'
    },{
        name: "repassword",
        display: '确认密码',
        rules: 'matches[password]'
    },{
        name: "password",
        display: '密码',
        rules: 'min_length[6]|max_length[20]'
    },{
        name:"birthday",
        display:"生日",
        rules:"date"
    },{
        name:"tel",
        display:"联系号码",
        rules:"tel_or_mobile"
    }
    ]);
    
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
