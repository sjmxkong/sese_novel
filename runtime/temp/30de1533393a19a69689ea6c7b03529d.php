<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/data/www/sese.dushu5.com/public/../application/admin/view/user/index.html";i:1472295817;s:70:"/data/www/sese.dushu5.com/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">菜单列表</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo url('admin/user/add'); ?>" class="btn btn-success">添加</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th><input class="check-all" type="checkbox" value=""></th>
                            <th>邮箱</th>
                            <th>姓名</th>
                            <th>用户组</th>
                            <th>性别</th>
                            <th>生日</th>
                            <th>联系电话</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($userRows) || $userRows instanceof \think\Collection): $i = 0; $__LIST__ = $userRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><input class="check-item" type="checkbox" value="<?php echo $vo['id']; ?>"></td>
                            <td>
                                <?php echo $vo['email']; ?>
                            </td>
                            <td>
                                <?php echo $vo['name']; ?>
                            </td>
                            <td>
                                <?php echo $vo->role->name; ?>
                            </td>
                            <td><?php echo $vo['sex']; ?></td>
                            <td><?php echo $vo['birthday']; ?></td>
                            <td><?php echo $vo['tel']; ?></td>
                            <td>
                                <a class="btn btn-xs btn-default" href="<?php echo url('admin/user/edit',['id'=>$vo['id']]); ?>">编辑</a>
                                <a class="btn btn-xs btn-default delete" href="<?php echo url('admin/user/destroy',['id'=>$vo['id']]); ?>">删除</a>
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
