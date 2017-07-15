<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/data/www/sese.axs8.net/public/../application/admin/view/agent/site_edit.html";i:1481166433;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">编辑广告位</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-10">
                        <form action="<?php echo url('admin/agent/site_edit',['site_id'=>$site['site_id']]); ?>" class="form-horizontal ajax-form" method="post" name="agent">

                            <div class="form-group">
                                <label for="inputagent_name" class="col-sm-3 control-label">渠道名(ID:<?php echo $site->agent_id; ?>)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $site->agent_name; ?>" name="agent_name" id="inputagent_name" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputsite_name" class="col-sm-3 control-label">广告位名称</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $site->site_name; ?>" name="site_name" id="inputsite_name" placeholder="广告位名称">
                                </div>
                            </div>

                              <div class="form-group">
                                <label for="inputsite_name" class="col-sm-3 control-label">合作类型</label>
                                <div class="col-sm-4">
                                <?php if(is_array($payType) || $payType instanceof \think\Collection): $i = 0; $__LIST__ = $payType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($i % 2 );++$i;?>
                                     <input type="radio" name="paytype" id="inputpaytype" <?php if($site->paytype==$key): ?>checked="checked"<?php endif; ?> value="<?php echo $key; ?>" /><?php echo $pt; endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputdeduct" class="col-sm-3 control-label">扣量</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $site->deduct; ?>" name="deduct" id="inputdeduct" placeholder="扣量">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputdivide" class="col-sm-3 control-label">分成比例</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $site->divide; ?>" name="divide" id="inputdivide" placeholder="分成比例">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputprice" class="col-sm-3 control-label">单价</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $site->price; ?>" name="price" id="inputprice" placeholder="单价">
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="inputsite_name" class="col-sm-3 control-label">负责人</label>
                                <div class="col-sm-4">
                                    <select name="author">
                                        <option value="0">-请选择-</option>
                                        <?php if(is_array($authorArr) || $authorArr instanceof \think\Collection): $i = 0; $__LIST__ = $authorArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $key; ?>"  <?php if($site->author==$key): ?>selected="selected"<?php endif; ?>><?php echo $pt; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
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
