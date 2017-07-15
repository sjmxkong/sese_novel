<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/data/www/sese.axs8.net/public/../application/admin/view/rule/index.html";i:1472295816;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1475852854;}*/ ?>
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
            <div class="panel-heading">菜单列表</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo url('admin/rule/add'); ?>" class="btn btn-success">添加</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th><input class="check-all" type="checkbox" value=""></th>
                            <th>菜单名称</th>
                            <th>链接</th>
                            <th>ICON</th>
                            <th>类型</th>
                            <th>排序</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($lists) || $lists instanceof \think\Collection): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr class="success">
                            <td><input class="check-item" type="checkbox" value="<?php echo $vo['id']; ?>"></td>
                            <td class="text-left">
                            <?php echo $vo['title']; ?>
                            </td>
                            <td>
                                <?php echo $vo['name']; ?>
                            </td>
                            <td><?php echo $vo['icon']; ?></td>
                            <td><?php echo $vo['islink']; ?></td>
                            <td><?php echo $vo['sort']; ?></td>
                            <td>
                                <a class="btn btn-xs btn-default" href="<?php echo url('admin/rule/edit',['id'=>$vo['id']]); ?>">编辑</a>
                                <a class="btn btn-xs btn-default delete" href="<?php echo url('admin/rule/destroy',['id'=>$vo['id']]); ?>">删除</a>
                            </td>
                        </tr>
                            <?php if(is_array($vo->parent) || $vo->parent instanceof \think\Collection): $i = 0; $__LIST__ = $vo->parent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr class="active">
                                    <td><input class="check-item" type="checkbox" value="<?php echo $v['id']; ?>"></td>
                                    <td class="text-left">
                                    &nbsp;&nbsp;┗━
                                    <?php echo $v['title']; ?>
                                    </td>
                                    <td>
                                        <?php echo $v['name']; ?>
                                    </td>
                                    <td><?php echo $v['icon']; ?></td>
                                    <td><?php echo $v['islink']; ?></td>
                                    <td><?php echo $v['sort']; ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-default" href="<?php echo url('admin/rule/edit',['id'=>$v['id']]); ?>">编辑</a>
                                        <a class="btn btn-xs btn-default delete" href="<?php echo url('admin/rule/destroy',['id'=>$v['id']]); ?>">删除</a>
                                    </td>
                                </tr>
                                <?php if(is_array($v->parent) || $v->parent instanceof \think\Collection): $i = 0; $__LIST__ = $v->parent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?>
                                <tr <?php if($ss['parent_id'] == 0): ?> class="success" <?php endif; ?>>
                                    <td><input class="check-item" type="checkbox" value="<?php echo $ss['id']; ?>"></td>
                                    <td class="text-left">
                                    &nbsp;&nbsp; &nbsp;&nbsp;┗━━
                                    <?php echo $ss['title']; ?>
                                    </td>
                                    <td>
                                        <?php echo $ss['name']; ?>
                                    </td>
                                    <td><?php echo $ss['icon']; ?></td>
                                    <td><?php echo $ss['islink']; ?></td>
                                    <td><?php echo $ss['sort']; ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-default" href="<?php echo url('admin/rule/edit',['id'=>$ss['id']]); ?>">编辑</a>
                                        <a class="btn btn-xs btn-default delete" href="<?php echo url('admin/rule/destroy',['id'=>$ss['id']]); ?>">删除</a>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
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
