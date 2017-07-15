<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/data/www/sese.axs8.net/public/../application/admin/view/index/index.html";i:1487684171;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>61xsw管理后台</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap.css">
    <!-- 可选的Bootstrap主题文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap-axs8.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-luffy navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    <span class="glyphicon glyphicon-tower"></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="">61xsw管理控制台 <span class="sr-only">(current)</span></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                	 <li class="dropdown">
                        <a href="http://m.61xsw.com/" target="_blank" class="dropdown-toggle"><span class="glyphicon glyphicon-folder-open"></span> 前台首页</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-envelope"></span> 未读信息<span class="badge">1</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">雄起了，兄弟们!</a></li>
                            <!--
                            <li role="separator" class="divider"></li>
                            <li class="text-center"><a href="#">查看全部列表</a></li>
                            -->
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="ng-scope" data-title="修改个人资料"><?php echo $userRow['email']; ?></a></li>
                            <li><a href="<?php echo url('index/logout'); ?>">退出</a></li>
                        </ul>
                    </li>
                </ul>
  
            </div>
        </div>
    </nav>
    <section class="container-fluid viewFramework-sidebar-full viewFramework-body" id="sidebar-left">
        <div class="viewFramework-sidebar row">
            <div class="sidebar-fold text-center" id="sidebar-icon"><span class="glyphicon glyphicon-fast-backward"></span></div>
            <div class="sidebar-nav">
                <ul class="entrance-nav sidebar-trans" data-toggle="left-nav">
                    <?php if(is_array($ruleData) || $ruleData instanceof \think\Collection): $i = 0; $__LIST__ = $ruleData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['title']): ?>
                    <li class="nav-item">
                        <?php if(isset($vo['sub']) && !empty($vo['sub'])): ?>
                        <a href="javascript:void(0);" data-id="<?php echo $vo['id']; ?>">
                    <?php else: ?>
                        <a href="<?php echo url($vo['name']); ?>" class="ng-scope" data-id="<?php echo $vo['id']; ?>">
                    <?php endif; ?>
                            <div class="nav-icon"><span class="<?php echo $vo['icon']; ?>"></span></div>
                            <span class="nav-title ng-binding"><?php echo $vo['title']; ?></span>
                        </a> <?php if(isset($vo['sub']) && !empty($vo['sub'])): ?>
                        <ul>
                            <?php if(is_array($vo['sub']) || $vo['sub'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <li>
                                <a href="<?php echo url($v['name']); ?>" class="ng-scope" data-id="<?php echo $v['id']; ?>">
                                    <div class="nav-icon"><span class="<?php echo $v['icon']; ?>"></span></div>
                                    <span class="nav-title ng-binding"><?php echo $v['title']; ?></span>
                                </a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="viewFramework-product">
            <div class="content-tabs">
                <button class="roll-nav roll-left"><span class="glyphicon glyphicon-backward"></span></button>
                <div class="page-tabs">
                    <div class="tabs">
                    </div>
                </div>
                <button class="roll-nav roll-right"><span class="glyphicon glyphicon-forward"></span></button>
            </div>
        </div>
    </section>
    <div class="modal fade" id="clearModal" tabindex="-1" role="dialog" aria-labelledby="clearModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="clearModalLabel">温馨提示</h4>
                </div>
                <div class="modal-body">
                    您确定要清理缓存吗？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">确定</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script type="text/javascript" src="/static/admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="/static/admin/js/jquery.md5.js"></script>
    <script type="text/javascript" src="/static/admin/js/bootstrap.luffy.js"></script>
    <script type="text/javascript" src="/static/admin/js/app.js"></script>
</body>

</html>
