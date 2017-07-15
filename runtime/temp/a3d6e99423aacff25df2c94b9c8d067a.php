<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/data/www/sese.axs8.net/public/../application/admin/view/aricle/add.html";i:1476369227;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1475852854;}*/ ?>
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
            <div class="panel-heading">添加文章内容</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="<?php echo url('admin/aricle/add'); ?>" class="form-horizontal ajax-form" method="post" name="rule">
                            <div class="form-group">

                                <label for="" class="col-sm-3 control-label">所属图书</label>
                                <div class="col-sm-4">
                                    <select name="bid" class="form-control">
                                        <option value="0">请选择</option>
                                        <?php if(is_array($bookList) || $bookList instanceof \think\Collection): $i = 0; $__LIST__ = $bookList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $book['bid']; ?>" <?php if($bid == $book['bid']): ?>selected="selected"<?php endif; ?>>(<?php echo $book['bid']; ?>)<?php echo $book['bookname']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>

                           <div class="form-group">
                                <label for="inputsortid" class="col-sm-3 control-label">章节</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="" name="sortid" id="inputsortid" placeholder="章节号">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputtitle" class="col-sm-3 control-label">标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="" name="title" id="inputtitle" placeholder="标题">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputtitle2" class="col-sm-3 control-label">原标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="" name="title2" id="inputtitle2" placeholder="原标题">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputischeck"> 是否发布 </label>
                                <div class="col-sm-5">
                                <input type="radio" name="ischeck" id="inputischeck" checked="checked" value="0" />未审核
                                <input type="radio" name="ischeck" id="inputischeck" value="1" />已发布
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputisfree"> 是否免费 </label>
                                <div class="col-sm-5">
                                 <input type="radio" name="isfree" id="inputisfree" checked="checked" value="0" />收费
                                 <input type="radio" name="isfree" id="inputisfree" value="1" />免费
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputSort"> 内容 </label>
                                <div class="col-sm-9">
                                	<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
                                    <script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
                                    <script id="container" name="body" type="text/plain"></script>
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
