<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/data/www/sese.axs8.net/public/../application/admin/view/books/edit.html";i:1476525899;s:68:"/data/www/sese.axs8.net/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">编辑图书</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-10">
                        <form action="<?php echo url('admin/books/edit',['bid'=>$book['bid']]); ?>" class="form-horizontal ajax-form" method="post" name="rule">
                       	 	<input type="hidden" name="gourl" value="<?php echo $gourl; ?>">
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">图书分类</label>
                                <div class="col-sm-4">                                    
                                    <select name="catid" class="form-control">
                                        <?php if(is_array($cataRow) || $cataRow instanceof \think\Collection): $i = 0; $__LIST__ = $cataRow;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ct): $mod = ($i % 2 );++$i;if($ct['id'] == $book->catid): ?>
                                        <option value="<?php echo $ct['id']; ?>" selected="selected"><?php echo $ct['title']; ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $ct['id']; ?>"><?php echo $ct['title']; ?></option>
                                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputname" class="col-sm-3 control-label">书名</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $book->bookname; ?>" name="bookname" id="inputname" placeholder="书名">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputkeyword" class="col-sm-3 control-label">作者</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $book->author; ?>" name="author" id="inputkeyword" placeholder="作者">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputname" class="col-sm-3 control-label">封面</label>
                                <div class="col-sm-4">
                                    <img src="<?php echo $imgUrl; ?><?php echo $book->litpic; ?>" style="max-width:80px; max-height:112px;" id="litpic" class="upload">
                                    <input type="hidden" name="litpic" value="<?php echo $book->litpic; ?>" />
                                </div>
                            </div>
   
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputstatus"> 是否完结 </label>
                                <div class="col-sm-5">
                                    <input type="radio" name="status" id="inputstatus" <?php if($book->status != 1): ?>checked="checked"<?php endif; ?> value="0" />连载中
                                    <input type="radio" name="status" id="inputstatus" <?php if($book->status == 1): ?>checked="checked"<?php endif; ?> value="1" />已完结
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputstatus"> 是否发布 </label>
                                <div class="col-sm-5">
                                    <input type="radio" name="ischeck" id="inputischeck" <?php if($book->ischeck < 1): ?>checked="checked"<?php endif; ?> value="0" />未审核
                                    <input type="radio" name="ischeck" id="inputischeck" <?php if($book->ischeck == 1): ?>checked="checked"<?php endif; ?> value="1" />已发布
                                    <input type="radio" name="ischeck" id="inputischeck" <?php if($book->ischeck == 2): ?>checked="checked"<?php endif; ?> value="2" />已发布,不显示
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputiscommend"> 推荐度 </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control " value="<?php echo $book->iscommend; ?>" name="iscommend" id="inputiscommend" placeholder="越大越靠前">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputmemo" class="col-sm-3 control-label">备注</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $book->memo; ?>" name="memo" id="inputmemo" placeholder="备注">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputSort"> 摘要简介 </label>
                                <div class="col-sm-9">
                                    <script charset="utf-8" src="/static/admin/js/kindeditor/kindeditor-all.js"></script>
                                    <script charset="utf-8" src="/static/admin/js/kindeditor/lang/zh-CN.js"></script>
                                    <textarea id="editor" name="description"><?php echo $book->description; ?></textarea>
                                    <script>
                                    KindEditor.ready(function(K) {
                                        window.editor = K.create('#editor', {
                                            themeType: 'simple',
                                            uploadJson: '<?php echo url('admin/upload/uploadpic'); ?>',
                                            width: '100%',
                                            height: '320px',
                                            items: [
                                                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                                                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                                                'insertunorderedlist', '|', 'emoticons', 'multiimage', 'link', '|', 'fullscreen'
                                            ]
                                        });
                                    });
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
        name: "parent_id",
        display: '上级页面',
        rules: 'required|integer'
    }, {
        name: "title",
        display: "标题",
        rules: "required"
    }
    ]);

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
