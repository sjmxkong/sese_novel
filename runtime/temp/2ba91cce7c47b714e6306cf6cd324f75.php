<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/data/www/sese.axs8.net/public/../application/admin/view/agent/pay.html";i:1481169077;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">渠道结算管理</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                     <form action="<?php echo url('admin/agent/pay'); ?>" method="get" style="width: 80%;float: left;" id="booksearch">
                        <input readonly name="tdate" id="datetimepicker"  value="<?php echo $query['tdate']; ?>" type="text"> -
                        <input readonly name="edate" id="datetimepicker2"  value="<?php echo $query['edate']; ?>" type="text">
                        <input type="text" name="agent_id" value="<?php echo $query['agent_id']; ?>" placeholder="渠道ID">
                        <select name="author">
                            <option value="0">负责人</option>
                            <?php if(is_array($authorArr) || $authorArr instanceof \think\Collection): $i = 0; $__LIST__ = $authorArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$au): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($query['author'] == $key): ?>selected="selected"<?php endif; ?>><?php echo $au; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">提交</button> 
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                $(document).ready(function() {
                    $('#datetimepicker').datetimepicker({
                        language: "zh-CN",
                        minView: "month",//设置只显示到月份
                        format : "yyyy-mm-dd",//日期格式
                        autoclose:true,//选中关闭
                        todayBtn: true//今日按钮
                    });
                    $('#datetimepicker2').datetimepicker({
                        language: "zh-CN",
                        minView: "month",//设置只显示到月份
                        format : "yyyy-mm-dd",//日期格式
                        autoclose:true,//选中关闭
                        todayBtn: true//今日按钮
                    });
                })
                </script>
                <div class="table-responsive">
                 <form action="<?php echo url('admin/agent/pay_add'); ?>" method="post"  class="form-horizontal ajax-form">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                        	<th><input class="check-all" type="checkbox" value=""></th>
                            <th>日期</th>
                            <th>充值金额</th>
                            <th>分成金额</th>
                            <th>渠道ID</th>
                            <th>广告位ID</th>
                            <th>名称</th>
                            <th>渠道类型</th>
                            <th>负责人</th>
                            <th>结算时间</th>
                        </tr>
                        <tr class="info">
                        	<th class="text-left"></th>
                            <th class="text-left">合计</th>
                            <th class="text-left"><?php echo $total['amount']; ?></th>
                            <th class="text-left"><?php echo $total['commision']; ?></th>
                            <th class="text-left"></th>
                            <th class="text-left"></th>
                            <th class="text-left"></th>
                            <th class="text-left"></th>
                            <th class="text-left"></th>
                            <th class="text-left"></th>
                        </tr>
                       
                        <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>>
                        	<td><?php if($d['state']!=1): ?><input class="check" type="checkbox" name="ids[]" value="<?php echo $d['id']; ?>"><?php endif; ?></td>
                            <td class="text-left"><?php echo $d['tdate']; ?></td>
                            <td class="text-left"><?php echo $d['amount']; ?></td>
                            <td class="text-left"><?php echo $d['commision']; ?></td>
                            <td class="text-left"><?php echo $d['agent_id']; ?></td> 
                            <td class="text-left"><?php echo $d['site_id']; ?></td>
                            <td class="text-left"><?php echo $d['agent_name']; ?>.<?php echo $d['site_name']; ?></td>
                            <td class="text-left"><?php echo $payType[$d['paytype']]; ?></td>
                            <td class="text-left"><?php echo $authorArr[$d['author']]; ?></td>
                            <td class="text-left"><?php if($d['state']==1): ?><?php echo date("Y-m-d H:i:s",$d['pay_time']); else: ?><font color="red">未结算</font><?php endif; ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <button type="submit" class="btn btn-primary">批量结算</button>
                    </form>
                </div>
            </div>
 
        </div>
    </div>
</div>
<script language="javascript">
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
