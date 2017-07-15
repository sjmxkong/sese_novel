<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/data/www/sese.dushu5.com/public/../application/admin/view/common/login.html";i:1472627662;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>用户登录</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap.css">
    <!-- 可选的Bootstrap主题文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap-axs8.css">
    <link rel="stylesheet" href="/static/admin/css/login.css">
    <link rel="stylesheet" href="/static/admin/js/messenger/css/messenger.css">
    <link rel="stylesheet" href="/static/admin/js/messenger/css/messenger-theme-air.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid">
        <div class="login">
            <!-- <div class="alert alert-danger" role="alert"></div> -->
            <div class="panel panel-default">
                <div class="panel-heading"><span class="text-muted">用户登录-User Login</span></div>
                <div class="panel-body">
                    <form class="inline-block ajax-form" action="<?php echo url('admin/common/login'); ?>" method="post" name="login">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="email" name="email_login" data-required data-pattern="/dfads/i">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-key"></i></span>
                                <input class="span2 form-control" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info  btn-block">登录</button>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <span class="text-muted ">版权所有 @2016</span>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/messenger/js/messenger.min.js"></script>
<script type="text/javascript" src="/static/admin/js/validate.js"></script>
<script type="text/javascript" src="/static/admin/js/global.js"></script>
<script type="text/javascript">
$('form.ajax-form').formYlBook([{
    name: "email_login",
    display: '登录邮箱',
    rules: 'required|valid_email'
}, {
    name: "password",
    display: "密码",
    rules: "required"
}]);
if (top.location != self.location) {
    top.location = self.location; //防止页面被框架包含  
}
</script>

</html>
