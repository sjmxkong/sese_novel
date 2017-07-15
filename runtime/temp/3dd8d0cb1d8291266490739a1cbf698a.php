<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/data/www/sese.axs8.net/public/../application/admin/view/aricle/edit.html";i:1476369150;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">文章内容修改</div>
            <div class="panel-body">
                <div class="row" width='100%'>
                    <div class="col-sm-8">
                        <form action="<?php echo url('admin/aricle/edit',['id'=>$aricleRow['id']]); ?>" class="form-horizontal ajax-form" method="post" name="rule">
								<input type="hidden" name="gourl" value="<?php echo $gourl; ?>">
                            <div class="form-group">
                                <label for="inputsortid" class="col-sm-3 control-label">章节</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?php echo $aricleRow->sortid; ?>" name="sortid" id="inputsortid" placeholder="章节">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputtitle" class="col-sm-3 control-label">标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?php echo $aricleRow->title; ?>" name="title" id="inputtitle" placeholder="标题">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputtitle2" class="col-sm-3 control-label">原标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?php echo $aricleRow->title2; ?>" name="title2" id="inputtitle2" placeholder="原标题">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputbid" class="col-sm-3 control-label">所属图书</label>
                                <div class="col-sm-5">
                                    《<?php echo $aricleRow->bookname; ?>》
                                    <input type="hidden" class="form-control" value="<?php echo $aricleRow->bid; ?>" name="bid" id="inputbid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputischeck"> 是否发布 </label>
                                <div class="col-sm-5">
                                <input type="radio" name="ischeck" id="inputischeck" <?php if($aricleRow->ischeck != 1): ?>checked="checked"<?php endif; ?> value="0" />未审核
                                <input type="radio" name="ischeck" id="inputischeck" <?php if($aricleRow->ischeck == 1): ?>checked="checked"<?php endif; ?> value="1" />已发布
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputisfree"> 是否免费 </label>
                                <div class="col-sm-5">
                                 <input type="radio" name="isfree" id="inputisfree" <?php if($aricleRow->isfree != 1): ?>checked="checked"<?php endif; ?> value="0" />收费
                                <input type="radio" name="isfree" id="inputisfree" <?php if($aricleRow->isfree == 1): ?>checked="checked"<?php endif; ?> value="1" />免费
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputSort"> 内容 </label>
                                <div class="col-sm-9">
                               		<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
                                    <script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
                                    <script id="container" name="body" type="text/plain"><?php echo $aricleRow->body; ?></script>
                                    <script>
                                     var ue = UE.getEditor('container');
                                    </script>
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
        name: "title",
        display: '标题',
        rules: 'required'
    },{
        name: "url",
        display: '链接地址',
        rules: 'required'
    }
    ]);

    $('.children').on('ifChecked',function (argument) {
         if(!$(this).parents('.widget-box').find('.father').is('checked')){
            $(this).parents('.widget-box').find('.father').iCheck('check');
         }
    });
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
