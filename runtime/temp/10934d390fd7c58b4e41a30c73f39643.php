<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/data/www/sese.axs8.net/public/../application/admin/view/agent/index.html";i:1481168989;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
                     <form action="<?php echo url('admin/agent/index'); ?>" method="get" style="width: 80%;float: left;">
                            渠道名：<input type="text" name="kw" value="<?php echo $query['kw']; ?>">
                        <select name="author">
                            <option value="0">负责人</option>
                            <?php if(is_array($authorArr) || $authorArr instanceof \think\Collection): $i = 0; $__LIST__ = $authorArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$au): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($query['author'] == $key): ?>selected="selected"<?php endif; ?>><?php echo $au; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">提交</button> <a href="<?php echo url('admin/agent/add'); ?>" class="btn btn-success">添加</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th>渠道ID</th>
                            <th>渠道名</th>
                            <th>登录账号</th>
                            <th>登录密码</th>
                            <th>联系人</th>
                            <th>qq</th>
                            <th>手机</th>
                            <th>最后登录IP</th>
                            <th>最后登录时间</th>
                            <th>负责人</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($agentLists) || $agentLists instanceof \think\Collection): $i = 0; $__LIST__ = $agentLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$agent): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>>
                            <td><?php echo $agent->agent_id; ?></td>
                            <td class="text-left"><?php echo $agent->agent_name; ?></td>  
                            <td class="text-left"><?php echo $agent->user_name; ?></td>
                            <td class="text-left"><?php echo $agent->user_pwd; ?></td>  
                            <td class="text-left"><?php echo $agent->person; ?></td>
                            <td class="text-left"><?php echo $agent->qq; ?></td>
                            <td class="text-left"><?php echo $agent->mobile; ?></td>
                            <td class="text-left"><?php echo $agent->lastip; ?></td>
                            <td><?php echo date("Y-m-d H:i:s",$agent->lastdate); ?></td>
                            <td class="text-left"><?php echo $authorArr[$agent->author]; ?></td>
                            <td>
                                <a class="btn btn-xs btn-default" href="<?php echo url('admin/agent/edit',['agent_id'=>$agent['agent_id'],'gourl'=>$query['gourl']]); ?>">编辑</a>
                                <a class="btn btn-xs btn-default add" href="<?php echo url('admin/agent/site_add',['agent_id'=>$agent['agent_id']]); ?>">增加广告位</a>
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
