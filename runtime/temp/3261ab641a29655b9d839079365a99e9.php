<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/data/www/sese.dushu5.com/public/../application/admin/view/books/index.html";i:1476633070;s:70:"/data/www/sese.dushu5.com/public/../application/admin/view/layout.html";i:1489228178;}*/ ?>
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
            <div class="panel-heading">图书列表(<font color="#a94442">注:推荐,新书,热门 可以双击编辑，数字越大越靠前。 单击表头项目可排序</font>)</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                     <form action="<?php echo url('admin/books/index'); ?>" method="get" style="width: 80%;float: left;" id="booksearch">
                     		<input type="text" name="bid" value="<?php echo $query['bid']; ?>" placeholder="图书ID">
                            <input type="text" name="kw" value="<?php echo $query['kw']; ?>" placeholder="书名关键字">
                            <select name="catid">
                            	<option value="0">全部</option>
                                <?php if(is_array($cataRow) || $cataRow instanceof \think\Collection): $i = 0; $__LIST__ = $cataRow;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ct): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $key; ?>" <?php if($key == $query['catid']): ?>selected="selected"<?php endif; ?>><?php echo $ct; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <select name="order" id="order">
                                <option value="5" <?php if($query['order'] == 5): ?>selected="selected"<?php endif; ?>>推荐排行</option>
                                <option value="6" <?php if($query['order'] == 6): ?>selected="selected"<?php endif; ?>>新书排行</option>
                                <option value="7" <?php if($query['order'] == 7): ?>selected="selected"<?php endif; ?>>热门排行</option>
                                <option value="1" <?php if($query['order'] == 1): ?>selected="selected"<?php endif; ?>>图书ID降序</option>
                                <option value="2" <?php if($query['order'] == 2): ?>selected="selected"<?php endif; ?>>总字数降序</option>
                                <option value="3" <?php if($query['order'] == 3): ?>selected="selected"<?php endif; ?>>未发布排前</option>
                                <option value="4" <?php if($query['order'] == 4): ?>selected="selected"<?php endif; ?>>连载中排前</option>
                                <option value="8" <?php if($query['order'] == 8): ?>selected="selected"<?php endif; ?>>更新时间降序</option>                            
                            </select>
                        <button type="submit" class="btn btn-primary">提交</button> <a href="<?php echo url('admin/books/add'); ?>" class="btn btn-success">添加</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover">
                        <tr class="active">
                            <th><span <?php if($query['order'] == 1): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(1);"<?php endif; ?>>书ID</span></th>
                            <th>书名</th>
                            <th>作者</th>
                            <th>分类</th>
                            <th>备注</th>
                            <th><span <?php if($query['order'] == 5): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(5);"<?php endif; ?>>推荐</span></th>
                            <th><span <?php if($query['order'] == 6): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(6);"<?php endif; ?>>新书</span></th>
                            <th><span <?php if($query['order'] == 7): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(7);"<?php endif; ?>>热门</span></th>
                            <th><span <?php if($query['order'] == 2): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(2);"<?php endif; ?>>字数</span></th>
                            <th>总价格</th>
                            <th><span <?php if($query['order'] == 3): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(3);"<?php endif; ?>>发布状态</span></th>
                            <th><span <?php if($query['order'] == 4): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(4);"<?php endif; ?>>是否完结</span></th>
                            <th><span <?php if($query['order'] == 8): ?>class="glyphicon glyphicon-arrow-down"<?php else: ?> onclick="topChange(8);"<?php endif; ?>>更新时间</span></th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($bookLists) || $bookLists instanceof \think\Collection): $i = 0; $__LIST__ = $bookLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?>
                        <tr <?php if($key%2==1): ?>class="success"<?php endif; ?>>
                            <td><?php echo $book->bid; ?></td>
                            <td class="text-left"><?php echo $book->bookname; ?></td>  
                            <td class="text-left"><?php echo $book->author; ?></td>
                            <td class="text-left"><?php echo $cataRow[$book->catid]; ?></td>  
                            <td><?php echo $book->memo; ?></td>
                            <td class="dbclick" utype="iscommend" bid="<?php echo $book['bid']; ?>"><?php echo $book->iscommend; ?></td>
                            <td class="dbclick" utype="isnew" bid="<?php echo $book['bid']; ?>"><?php echo $book->isnew; ?></td>
                            <td class="dbclick" utype="ishot" bid="<?php echo $book['bid']; ?>"><?php echo $book->ishot; ?></td>
                            <td><?php echo round($book->charnum/10000,0); ?>w</td>
                            <td>￥<?php echo round($book->price/100,2); ?></td>
                            <td><?php if($book->ischeck == 1): ?><span class="label label-success">已发布</span><?php else: ?><span class="label label-info">未审核</span><?php endif; ?></td>
                            <td><?php if($book->status == 1): ?><span class="label label-info">已完结</span><?php else: ?><span class="label label-success">连载中</span><?php endif; ?></td>
                            <td><?php echo date("Y-m-d H:i:s",$book->update_time); ?></td>
                            <td>
                                <a class="btn btn-xs btn-default" href="<?php echo url('admin/books/edit',['bid'=>$book['bid'],'gourl'=>$query['gourl']]); ?>">编辑</a>
                                <a class="btn btn-xs btn-default" href="/admin/aricle/index.html?bid=<?php echo $book['bid']; ?>">查看</a>
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
<script type="text/javascript">
$(function() {
    $(".dbclick").dblclick(function(){
        var inval = $(this).html(); 
        var bid = $(this).attr("bid");
        var utype = $(this).attr("utype");
        $(this).html("<input size='3' type='text' id='edit"+utype+bid+"' value='"+inval+"'>");
        $("#edit"+utype+bid).focus().blur(function() {
            var editval = $(this).val();
            if(!editval || editval==inval || editval<=0){
                $(this).parent().html(inval);
                return;
            } else {
                $(this).parent().html(editval);
                $.post("<?php echo url('admin/books/editcommend'); ?>",{bid:bid,utype:utype,iscommend:editval},function(data) {
                })
            }
        })
    })
})
function  topChange($id){
    $("#order ").val($id);
    $("#booksearch").submit();
}
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
