<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/data/www/sese.axs8.net/public/../application/admin/view/service/pay.html";i:1487752636;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">充值查询</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                     <form action="<?php echo url('admin/service/pay'); ?>" method="get" style="width: 80%;float: left;">
                         用户名：<input type="text" name="kw" value="<?php echo $query['kw']; ?>">
                         商户单号：<input type="text" name="orderid" value="<?php echo $query['orderid']; ?>">
                        <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th>订单号</th>
                            <th>交易订单号</th>
			    <th>交易流水号</th>
                            <th>充值渠道</th>
                            <th>用户名</th>
                            <th>充值金额</th>
                            <th>充值书币</th>
                            <th>赠送书币</th>
                            <th>到账时间</th>
                            
                        </tr>
                        <?php if(is_array($plist) || $plist instanceof \think\Collection): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ul): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>>
                            <td><?php echo $ul->orderid; ?></td>
                            <td><?php echo $ul->trade_order; ?></td>
			    <td><?php echo $ul->trade_orderid; ?></td>
                            <td><?php echo $ptype[$ul->ch_id]; ?></td>
                            <td><?php echo $ul->uname; ?></td> 
                            <td><?php echo $ul->money; ?></td>  
                            <td><?php echo $ul->gold; ?></td>
                            <td><?php echo $ul->gift; ?></td>
                            <td><?php echo date("Y-m-d H:i:s",$ul->notifytime); ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
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
