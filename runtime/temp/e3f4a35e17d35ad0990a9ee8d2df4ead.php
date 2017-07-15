<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/data/www/sese.axs8.net/public/../application/admin/view/agent/add.html";i:1472723176;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">增加渠道</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-10">
                        <form action="<?php echo url('admin/agent/add'); ?>" class="form-horizontal ajax-form" method="post" name="agent">
                             <div class="form-group">
                                <label for="inputagent_name" class="col-sm-3 control-label">渠道名</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" name="agent_name" id="inputagent_name" placeholder="渠道名">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputuser_name" class="col-sm-3 control-label">登录账号</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" name="user_name" id="inputuser_name" placeholder="登录账号">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputuser_pwd" class="col-sm-3 control-label">登录密码</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" name="user_pwd" id="inputuser_pwd" placeholder="登录密码">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputperson" class="col-sm-3 control-label">联系人</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" name="person" id="inputperson" placeholder="联系人">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">联系邮箱</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" name="email" id="inputemail" placeholder="联系邮箱">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputqq" class="col-sm-3 control-label">联系QQ</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" name="qq" id="inputqq" placeholder="联系QQ">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputmobile" class="col-sm-3 control-label">联系手机</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" name="mobile" id="inputmobile" placeholder="联系手机">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputbank" class="col-sm-3 control-label">开户银行</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="" name="bank" id="inputbank" placeholder="开户银行">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputaccount_name" class="col-sm-3 control-label">开户账号</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="" name="account_name" id="inputuaccount_name" placeholder="开户账号">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputaccount" class="col-sm-3 control-label">银行账号</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="" name="account" id="inputaccount" placeholder="银行账号">
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
