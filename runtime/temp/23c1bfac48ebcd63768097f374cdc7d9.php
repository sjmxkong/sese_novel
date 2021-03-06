<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/data/www/sese.axs8.net/public/../application/admin/view/user/add.html";i:1472295817;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1475852854;}*/ ?>
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
                        <form action="<?php echo url('admin/user/add'); ?>" class="form-horizontal ajax-form" method="post" name="user">
                            <div class="form-group">
                                <label for="inputrole_id" class="col-sm-3 control-label">用户组</label>
                                <div class="col-sm-5">
                                    <select name="role_id" id="inputrole_id" class="form-control">
                                        <option value="0">请选择用户组</option>
                                        <?php if(is_array($roleRows) || $roleRows instanceof \think\Collection): $i = 0; $__LIST__ = $roleRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">登录账户</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" id="inputemail" value="" placeholder="用户邮件地址"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputname" class="col-sm-3 control-label">用户姓名</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" id="inputname" value="" placeholder="用户姓名">
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
                                <label class="col-sm-3 control-label" for="inputstatus"> 是否启用 </label>
                                <div class="col-sm-5">
                                    <input type="checkbox" name="status" id="inputstatus" value="1" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputsex"> 性别 </label>
                                <div class="col-sm-5">
                                    <input type="radio" name="sex" id="inputsex" value="0" />
                                    保密
                                    <input type="radio" name="sex" id="inputsex" value="1" />
                                    男
                                    <input type="radio" name="sex" id="inputsex" value="2" />
                                    女
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputtel"> 联系号码 </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tel" value="" id="inputtel" placeholder="联系号码">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputbirthday" class="col-sm-3 control-label">生日</label>
                                <div class="col-sm-5">
                                    <div class="widget-group">
                                        <input type="text" class="form-control date" value="" name="birthday" id="inputbirthday" placeholder="生日">
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
        name: "email",
        display: '用户邮箱地址',
        rules: 'required|email'
    },{
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
        rules: 'required|min_length[6]|max_length[20]'
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
