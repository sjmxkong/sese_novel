<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/data/www/sese.axs8.net/public/../application/admin/view/total/tdate.html";i:1476718551;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">数据汇总按天统计</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                     <form action="<?php echo url('admin/total/tdate'); ?>" method="get" style="width: 80%;float: left;" id="booksearch">
                            <input readonly name="tdate" id="datetimepicker"  value="<?php echo $query['tdate']; ?>" type="text">-<input readonly name="edate" id="datetimepicker2"  value="<?php echo $query['edate']; ?>" type="text">
                            <input type="text" name="agent_id" value="<?php echo $query['agent_id']; ?>" placeholder="渠道ID">
                            <input type="text" name="site_id" value="<?php echo $query['site_id']; ?>" placeholder="广告位ID">
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
               <script src="/static/admin/highcharts/highcharts.js"></script>
               <div id="container" style="width:100%;height: auto;"></div>
               <script type="text/javascript">
               $(function () {
                    $('#container').highcharts({
                        title: {
                            text: '数据按天统计',
                            x: -20 //center
                        },
                        subtitle: {
                            text: '来源: 61小说网',
                            x: -20
                        },
                        xAxis: {
                            categories: ['<?php echo implode($data_tdate,"','"); ?>']
                        },
                        yAxis: {
                            title: {
                                text: ''
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            valueSuffix: ''
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            borderWidth: 0
                        },
                        series: [
                            <?php if(is_array($data_char) || $data_char instanceof \think\Collection): $i = 0; $__LIST__ = $data_char;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$char): $mod = ($i % 2 );++$i;?>
                            {
                            name: '<?php echo $key; ?>',
                            data: [<?php echo implode($char,','); ?>]
                            },
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        ],
                        credits: {
                            enabled: false
                        }
                    });
                });
               </script>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th>日期</th>
                            <th>注册数</th>
                            <th>登录数</th>
                            <th>充值用户</th>
                            <th>充值金额</th>
                            <th>消费用户</th>
                            <th>消费金额</th>
                            <th>新增充值用户</th>
                            <th>新增充值金额</th>
                        </tr>
                        <tr class="info">
                            <th>合计</th>
                            <th class="text-left"><?php echo $total['regnum']; ?></th>
                            <th class="text-left"><?php echo $total['loginnum']; ?></th>
                            <th class="text-left"><?php echo $total['paynum']; ?></th>
                            <th class="text-left">￥<?php echo round($total['paymoney'],2); ?></th>
                            <th class="text-left"><?php echo $total['costnum']; ?></th>
                            <th class="text-left">￥<?php echo round($total['costgold']/100,2); ?></th>
                            <th class="text-left"><?php echo $total['newnum']; ?></th>
                            <th class="text-left"><?php echo $total['newmoney']; ?></th>
                        </tr>
                        <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>> 
                            <td><?php echo $d['tdate']; ?></td>
                            <td class="text-left"><?php echo $d['regnum']; ?></td> 
                            <td class="text-left"><?php echo $d['loginnum']; ?></td>  
                            <td class="text-left"><?php echo $d['paynum']; ?></td>
                            <td class="text-left">￥<?php echo round($d['paymoney'],2); ?></td>
                            <td class="text-left"><?php echo $d['costnum']; ?></td>  
                            <td class="text-left">￥<?php echo round($d['costgold']/100,2); ?></td>
                            <td class="text-left"><?php echo $d['newnum']; ?></td>
                            <td class="text-left"><?php echo $d['newmoney']; ?></td>
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
