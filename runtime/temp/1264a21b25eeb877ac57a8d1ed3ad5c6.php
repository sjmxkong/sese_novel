<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/data/www/sese.dushu5.com/public/../application/admin/view/agent/site.html";i:1481168990;s:70:"/data/www/sese.dushu5.com/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">渠道列表</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                     <form action="<?php echo url('admin/agent/site'); ?>" method="get" style="width: 80%;float: left;">
                      	<select name="agent_id">
                            <option value="0">全部</option>
                            <?php if(is_array($agentList) || $agentList instanceof \think\Collection): $i = 0; $__LIST__ = $agentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$agent): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $agent['agent_id']; ?>" <?php if($query['agent_id'] == $agent['agent_id']): ?>selected="selected"<?php endif; ?>>(<?php echo $agent['agent_id']; ?>)<?php echo $agent['agent_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                         广告位名：<input type="text" name="kw" value="<?php echo $query['kw']; ?>">
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
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th>广告位ID</th>
                            <th>广告位名</th>
                            <th>渠道ID</th>
                            <th>渠道名</th>
                            <th>合作类型</th>
                            <th>扣量</th>
                            <th>分成</th>
                            <th>单价</th>
                            <th>推广链接</th>
                            <th>负责人</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($siteLists) || $siteLists instanceof \think\Collection): $i = 0; $__LIST__ = $siteLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$site): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>>
                            <td><?php echo $site->site_id; ?></td>
                            <td class="text-left"><?php echo $site->site_name; ?></td>
                            <td><?php echo $site->agent_id; ?></td>
                            <td class="text-left"><?php echo $site->agent_name; ?></td> 
                            <td><?php echo $payType[$site->paytype]; ?></td>
                            <td><?php echo $site->deduct; ?></td>  
                            <td><?php echo $site->divide; ?></td>
                            <td><?php echo $site->price; ?></td>
                             <td class="text-left"><input type="text" size="40" value="<?php echo $webUrl; ?>?<?php echo base64_encode($site->agent_id.'_'.$site->site_id); ?>"></td>
                             <td><?php echo $authorArr[$site->author]; ?></td>
                            <td>
                                <a class="btn btn-xs btn-default" href="<?php echo url('admin/agent/site_edit',['site_id'=>$site['site_id'],'gourl'=>$query['gourl']]); ?>">编辑</a>
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
