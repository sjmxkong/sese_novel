<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/data/www/sese.dushu5.com/public/../application/admin/view/index/main.html";i:1487773239;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>首页</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap.css">
    <!-- 可选的Bootstrap主题文件 -->
    <link rel="stylesheet" href="/static/admin/css/bootstrap-axs8.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="">首页</a></li>
                    <li class="active">数据</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">列表数据</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr style="display:none">
                                    <th class="active">ID</th>
                                    <th class="success">标题</th>
                                    <th class="warning">状态</th>
                                    <th class="danger">排序</th>
                                    <th class="info">操作</th>
                                </tr>
                                <tr class="active">
                                    <td>图书</td>
                                    <td>总数：<?php echo $totalData['book']['total']; ?></td>
                                    <td>已发布：<?php echo $totalData['book']['ischeck']; ?></td>
                                    <td>连载中：<?php echo $totalData['book']['total']-$totalData['book']['isfinish']; ?></td>
                                    <td>已完结：<?php echo $totalData['book']['isfinish']; ?></td>
                                </tr>
                                <tr class="warning">
                                    <td>文章</td>
                                    <td>总数：<?php echo $totalData['aircle']['total']; ?></td>
                                    <td>发布数：<?php echo $totalData['aircle']['ischeck']; ?></td>
                                    <td>收费章节：<?php echo $totalData['aircle']['ischeck']-$totalData['aircle']['isfree']; ?></td>
                                    <td>免费章节：<?php echo $totalData['aircle']['isfree']; ?></td>
                                </tr>
                                <tr class="info">
                                    <td>用户</td>
                                    <td>总数：<?php echo $totalData['user']['total']; ?></td>
                                    <td>今天：<?php echo $totalData['user']['tdate']; ?></td>
                                    <td>昨天：<?php echo $totalData['user']['ldate']; ?></td>
                                    <td></td>
                                </tr>
                                 <tr class="success">
                                    <td>昨天充值</td>
                                    <td>￥<?php echo round($totalData['pay']['money_yesdate'],2); ?></td>
                                    <td>人数：<?php echo $totalData['pay']['num_yesdate']; ?></td>
                                    <td>ARPU：￥<?php echo round($totalData['pay']['money_yesdate']/$totalData['pay']['num_yesdate'],2); ?></td>
                                    <td></td>
                                </tr>
                                 <tr class="success">
                                    <td>今天充值</td>
                                    <td>￥<?php echo round($totalData['pay']['money_tdate'],2); ?></td>
                                    <td>人数：<?php echo $totalData['pay']['num_tdate']; ?></td>
                                    <td>ARPU：￥<?php echo round($totalData['pay']['money_tdate']/$totalData['pay']['num_tdate'],2); ?></td>
                                    <td>新用户充值：￥<?php echo round($totalData['pay']['money_new'],2); ?><br>
                                        老用户充值：￥<?php echo round($totalData['pay']['money_tdate']-$totalData['pay']['money_new'],2); ?></td>
                                </tr>
                                <tr class="danger"  style="display:none">
                                    <td>昨天消耗</td>
                                    <td>订阅：￥<?php echo round($totalData['cost'][1]['yesdate']['gold']/100,2); ?>/<?php echo $totalData['cost'][1]['yesdate']['num']; ?></td>
                                    <td>打赏：￥<?php echo $totalData['cost'][2]['yesdate']['gold']/100; ?>/<?php echo $totalData['cost'][2]['yesdate']['num']; ?></td>
                                    <td>抽奖：￥<?php echo $totalData['cost'][3]['yesdate']['gold']/100; ?>/<?php echo $totalData['cost'][3]['yesdate']['num']; ?></td>
                                    <td></td>
                                </tr>
                                 <tr class="danger"  style="display:none">
                                    <td>今天消耗</td>
                                    <td>订阅：￥<?php echo round($totalData['cost'][1]['tdate']['gold']/100,2); ?>/<?php echo $totalData['cost'][1]['tdate']['num']; ?></td>
                                    <td>打赏：￥<?php echo $totalData['cost'][2]['tdate']['gold']/100; ?>/<?php echo $totalData['cost'][2]['tdate']['num']; ?></td>
                                    <td>抽奖：￥<?php echo $totalData['cost'][3]['tdate']['gold']/100; ?>/<?php echo $totalData['cost'][3]['tdate']['num']; ?></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                 <!--
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-primary">每页
                                    <kbd>10</kbd> 条, 共
                                    <kbd>220</kbd> 条记录。当前第
                                    <kbd>4</kbd> 页</div>
                            </div>
                            <div class="col-sm-8 text-right">
                                <nav>
                                    <ul class="pagination pagination-sm">
                                        <li class="disabled">
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="active"><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
            <div class="col-md-12" style="display:none">
                <div class="panel panel-success">
                    <div class="panel-heading">默认面板</div>
                    <div class="panel-body">
                        <li class="glyphicon glyphicon-asterisk"></li>          
<li class="glyphicon glyphicon-plus"></li>                   
<li class="glyphicon glyphicon-euro"></li>
<li class="glyphicon glyphicon-eur"></li>                   
<li class="glyphicon glyphicon-minus"></li>                  
<li class="glyphicon glyphicon-cloud"></li>                  
<li class="glyphicon glyphicon-envelope"></li>               
<li class="glyphicon glyphicon-pencil"></li>                 
<li class="glyphicon glyphicon-glass"></li>                  
<li class="glyphicon glyphicon-music"></li>                  
<li class="glyphicon glyphicon-search"></li>                 
<li class="glyphicon glyphicon-heart"></li>                  
<li class="glyphicon glyphicon-star"></li>                   
<li class="glyphicon glyphicon-star-empty"></li>             
<li class="glyphicon glyphicon-user"></li>                   
<li class="glyphicon glyphicon-film"></li>                   
<li class="glyphicon glyphicon-th-large"></li>               
<li class="glyphicon glyphicon-th"></li>                   
<li class="glyphicon glyphicon-th-list"></li>                
<li class="glyphicon glyphicon-ok"></li>                   
<li class="glyphicon glyphicon-remove"></li>                 
<li class="glyphicon glyphicon-zoom-in"></li>                
<li class="glyphicon glyphicon-zoom-out"></li>               
<li class="glyphicon glyphicon-off"></li>                   
<li class="glyphicon glyphicon-signal"></li>                 
<li class="glyphicon glyphicon-cog"></li>                   
<li class="glyphicon glyphicon-trash"></li>                  
<li class="glyphicon glyphicon-home"></li>                   
<li class="glyphicon glyphicon-file"></li>                   
<li class="glyphicon glyphicon-time"></li>                   
<li class="glyphicon glyphicon-road"></li>                   
<li class="glyphicon glyphicon-download-alt"></li>           
<li class="glyphicon glyphicon-download"></li>               
<li class="glyphicon glyphicon-upload"></li>                 
<li class="glyphicon glyphicon-inbox"></li>                  
<li class="glyphicon glyphicon-play-circle"></li>            
<li class="glyphicon glyphicon-repeat"></li>                 
<li class="glyphicon glyphicon-refresh"></li>                
<li class="glyphicon glyphicon-list-alt"></li>               
<li class="glyphicon glyphicon-lock"></li>                   
<li class="glyphicon glyphicon-flag"></li>                   
<li class="glyphicon glyphicon-headphones"></li>             
<li class="glyphicon glyphicon-volume-off"></li>             
<li class="glyphicon glyphicon-volume-down"></li>            
<li class="glyphicon glyphicon-volume-up"></li>              
<li class="glyphicon glyphicon-qrcode"></li>                 
<li class="glyphicon glyphicon-barcode"></li>                
<li class="glyphicon glyphicon-tag"></li>                   
<li class="glyphicon glyphicon-tags"></li>                   
<li class="glyphicon glyphicon-book"></li>                   
<li class="glyphicon glyphicon-bookmark"></li>               
<li class="glyphicon glyphicon-print"></li>                  
<li class="glyphicon glyphicon-camera"></li>                 
<li class="glyphicon glyphicon-font"></li>                   
<li class="glyphicon glyphicon-bold"></li>                   
<li class="glyphicon glyphicon-italic"></li>                 
<li class="glyphicon glyphicon-text-height"></li>            
<li class="glyphicon glyphicon-text-width"></li>             
<li class="glyphicon glyphicon-align-left"></li>             
<li class="glyphicon glyphicon-align-center"></li>           
<li class="glyphicon glyphicon-align-right"></li>            
<li class="glyphicon glyphicon-align-justify"></li>          
<li class="glyphicon glyphicon-list"></li>                   
<li class="glyphicon glyphicon-indent-left"></li>            
<li class="glyphicon glyphicon-indent-right"></li>           
<li class="glyphicon glyphicon-facetime-video"></li>         
<li class="glyphicon glyphicon-picture"></li>                
<li class="glyphicon glyphicon-map-marker"></li>             
<li class="glyphicon glyphicon-adjust"></li>                 
<li class="glyphicon glyphicon-tint"></li>                   
<li class="glyphicon glyphicon-edit"></li>                   
<li class="glyphicon glyphicon-share"></li>                  
<li class="glyphicon glyphicon-check"></li>                  
<li class="glyphicon glyphicon-move"></li>                   
<li class="glyphicon glyphicon-step-backward"></li>          
<li class="glyphicon glyphicon-fast-backward"></li>          
<li class="glyphicon glyphicon-backward"></li>               
<li class="glyphicon glyphicon-play"></li>                   
<li class="glyphicon glyphicon-pause"></li>                  
<li class="glyphicon glyphicon-stop"></li>                   
<li class="glyphicon glyphicon-forward"></li>                
<li class="glyphicon glyphicon-fast-forward"></li>           
<li class="glyphicon glyphicon-step-forward"></li>           
<li class="glyphicon glyphicon-eject"></li>                  
<li class="glyphicon glyphicon-chevron-left"></li>           
<li class="glyphicon glyphicon-chevron-right"></li>         
<li class="glyphicon glyphicon-plus-sign"></li>              
<li class="glyphicon glyphicon-minus-sign"></li>             
<li class="glyphicon glyphicon-remove-sign"></li>            
<li class="glyphicon glyphicon-ok-sign"></li>                
<li class="glyphicon glyphicon-question-sign"></li>          
<li class="glyphicon glyphicon-info-sign"></li>              
<li class="glyphicon glyphicon-screenshot"></li>             
<li class="glyphicon glyphicon-remove-circle"></li>          
<li class="glyphicon glyphicon-ok-circle"></li>              
<li class="glyphicon glyphicon-ban-circle"></li>             
<li class="glyphicon glyphicon-arrow-left"></li>             
<li class="glyphicon glyphicon-arrow-right"></li>            
<li class="glyphicon glyphicon-arrow-up"></li>               
<li class="glyphicon glyphicon-arrow-down"></li>             
<li class="glyphicon glyphicon-share-alt"></li>              
<li class="glyphicon glyphicon-resize-full"></li>            
<li class="glyphicon glyphicon-resize-small"></li>           
<li class="glyphicon glyphicon-exclamation-sign"></li>       
<li class="glyphicon glyphicon-gift"></li>                   
<li class="glyphicon glyphicon-leaf"></li>                   
<li class="glyphicon glyphicon-fire"></li>                   
<li class="glyphicon glyphicon-eye-open"></li>               
<li class="glyphicon glyphicon-eye-close"></li>              
<li class="glyphicon glyphicon-warning-sign"></li>           
<li class="glyphicon glyphicon-plane"></li>                 
<li class="glyphicon glyphicon-calendar"></li>               
<li class="glyphicon glyphicon-random"></li>                 
<li class="glyphicon glyphicon-comment"></li>                
<li class="glyphicon glyphicon-magnet"></li>                 
<li class="glyphicon glyphicon-chevron-up"></li>             
<li class="glyphicon glyphicon-chevron-down"></li>           
<li class="glyphicon glyphicon-retweet"></li>                
<li class="glyphicon glyphicon-shopping-cart"></li>          
<li class="glyphicon glyphicon-folder-close"></li>           
<li class="glyphicon glyphicon-folder-open"></li>            
<li class="glyphicon glyphicon-resize-vertical"></li>        
<li class="glyphicon glyphicon-resize-horizontal"></li>      
<li class="glyphicon glyphicon-hdd"></li>                   
<li class="glyphicon glyphicon-bullhorn"></li>               
<li class="glyphicon glyphicon-bell"></li>                   
<li class="glyphicon glyphicon-certificate"></li>            
<li class="glyphicon glyphicon-thumbs-up"></li>              
<li class="glyphicon glyphicon-thumbs-down"></li>            
<li class="glyphicon glyphicon-hand-right"></li>             
<li class="glyphicon glyphicon-hand-left"></li>              
<li class="glyphicon glyphicon-hand-up"></li>                
<li class="glyphicon glyphicon-hand-down"></li>              
<li class="glyphicon glyphicon-circle-arrow-right"></li>     
<li class="glyphicon glyphicon-circle-arrow-left"></li>      
<li class="glyphicon glyphicon-circle-arrow-up"></li>        
<li class="glyphicon glyphicon-circle-arrow-down"></li>      
<li class="glyphicon glyphicon-globe"></li>                  
<li class="glyphicon glyphicon-wrench"></li>                 
<li class="glyphicon glyphicon-tasks"></li>                  
<li class="glyphicon glyphicon-filter"></li>                
<li class="glyphicon glyphicon-briefcase"></li>              
<li class="glyphicon glyphicon-fullscreen"></li>             
<li class="glyphicon glyphicon-dashboard"></li>              
<li class="glyphicon glyphicon-paperclip"></li>              
<li class="glyphicon glyphicon-heart-empty"></li>            
<li class="glyphicon glyphicon-link"></li>                   
<li class="glyphicon glyphicon-phone"></li>                  
<li class="glyphicon glyphicon-pushpin"></li>                
<li class="glyphicon glyphicon-usd"></li>                   
<li class="glyphicon glyphicon-gbp"></li>                   
<li class="glyphicon glyphicon-sort"></li>                   
<li class="glyphicon glyphicon-sort-by-alphabet"></li>       
<li class="glyphicon glyphicon-sort-by-alphabet-alt"></li>   
<li class="glyphicon glyphicon-sort-by-order"></li>          
<li class="glyphicon glyphicon-sort-by-order-alt"></li>     
<li class="glyphicon glyphicon-sort-by-attributes"></li>     
<li class="glyphicon glyphicon-sort-by-attributes-alt"></li> 
<li class="glyphicon glyphicon-unchecked"></li>              
<li class="glyphicon glyphicon-expand"></li>                 
<li class="glyphicon glyphicon-collapse-down"></li>          
<li class="glyphicon glyphicon-collapse-up"></li>            
<li class="glyphicon glyphicon-log-in"></li>                 
<li class="glyphicon glyphicon-flash"></li>                  
<li class="glyphicon glyphicon-log-out"></li>                
<li class="glyphicon glyphicon-new-window"></li>             
<li class="glyphicon glyphicon-record"></li>                 
<li class="glyphicon glyphicon-save"></li>                   
<li class="glyphicon glyphicon-open"></li>                   
<li class="glyphicon glyphicon-saved"></li>                  
<li class="glyphicon glyphicon-import"></li>                 
<li class="glyphicon glyphicon-export"></li>                 
<li class="glyphicon glyphicon-send"></li>                   
<li class="glyphicon glyphicon-floppy-disk"></li>            
<li class="glyphicon glyphicon-floppy-saved"></li>           
<li class="glyphicon glyphicon-floppy-remove"></li>          
<li class="glyphicon glyphicon-floppy-save"></li>            
<li class="glyphicon glyphicon-floppy-open"></li>            
<li class="glyphicon glyphicon-credit-card"></li>            
<li class="glyphicon glyphicon-transfer"></li>               
<li class="glyphicon glyphicon-cutlery"></li>                
<li class="glyphicon glyphicon-header"></li>                 
<li class="glyphicon glyphicon-compressed"></li>             
<li class="glyphicon glyphicon-earphone"></li>               
<li class="glyphicon glyphicon-phone-alt"></li>              
<li class="glyphicon glyphicon-tower"></li>                  
<li class="glyphicon glyphicon-stats"></li>                  
<li class="glyphicon glyphicon-sd-video"></li>               
<li class="glyphicon glyphicon-hd-video"></li>               
<li class="glyphicon glyphicon-subtitles"></li>              
<li class="glyphicon glyphicon-sound-stereo"></li>           
<li class="glyphicon glyphicon-sound-dolby"></li>            
<li class="glyphicon glyphicon-sound-5-1"></li>              
<li class="glyphicon glyphicon-sound-6-1"></li>              
<li class="glyphicon glyphicon-sound-7-1"></li>              
<li class="glyphicon glyphicon-copyright-mark"></li>         
<li class="glyphicon glyphicon-registration-mark"></li>      
<li class="glyphicon glyphicon-cloud-download"></li>         
<li class="glyphicon glyphicon-cloud-upload"></li>          
<li class="glyphicon glyphicon-tree-conifer"></li>           
<li class="glyphicon glyphicon-tree-deciduous"></li>         
<li class="glyphicon glyphicon-cd "></li>                   
<li class="glyphicon glyphicon-save-file"></li>              
<li class="glyphicon glyphicon-open-file"></li>              
<li class="glyphicon glyphicon-level-up"></li>              
<li class="glyphicon glyphicon-copy"></li>                   
<li class="glyphicon glyphicon-paste"></li>                 
<li class="glyphicon glyphicon-door"></li>                   
<li class="glyphicon glyphicon-key"></li>                   
<li class="glyphicon glyphicon-alert "></li>                
<li class="glyphicon glyphicon-equalizer"></li>             
<li class="glyphicon glyphicon-king"></li>                   
<li class="glyphicon glyphicon-queen"></li>                 
<li class="glyphicon glyphicon-pawn"></li>                   
<li class="glyphicon glyphicon-bishop"></li>                 
<li class="glyphicon glyphicon-knight"></li>                
<li class="glyphicon glyphicon-baby-formula"></li>          
<li class="glyphicon glyphicon-tent"></li>                   
<li class="glyphicon glyphicon-blackboard"></li>            
<li class="glyphicon glyphicon-bed"></li>                   
<li class="glyphicon glyphicon-apple"></li>                  
<li class="glyphicon glyphicon-erase"></li>                 
<li class="glyphicon glyphicon-hourglass"></li>             
<li class="glyphicon glyphicon-lamp"></li>                   
<li class="glyphicon glyphicon-duplicate"></li>             
<li class="glyphicon glyphicon-piggy-bank"></li>             
<li class="glyphicon glyphicon-scissors"></li>               
<li class="glyphicon glyphicon-bitcoin"></li>                
<li class="glyphicon glyphicon-btc"></li>                   
<li class="glyphicon glyphicon-xbt"></li>                   
<li class="glyphicon glyphicon-yen"></li>                   
<li class="glyphicon glyphicon-jpy"></li>                   
<li class="glyphicon glyphicon-ruble"></li>                  
<li class="glyphicon glyphicon-rub"></li>                   
<li class="glyphicon glyphicon-scale"></li>                 
<li class="glyphicon glyphicon-ice-lolly"></li>             
<li class="glyphicon glyphicon-ice-lolly-tasted"></li>       
<li class="glyphicon glyphicon-education"></li>              
<li class="glyphicon glyphicon-option-horizontal"></li>     
<li class="glyphicon glyphicon-option-vertical"></li>        
<li class="glyphicon glyphicon-menu-hamburger"></li>        
<li class="glyphicon glyphicon-modal-window"></li>           
<li class="glyphicon glyphicon-oil"></li>                   
<li class="glyphicon glyphicon-grain"></li>                 
<li class="glyphicon glyphicon-sunglasses"></li>           
<li class="glyphicon glyphicon-text-size"></li>      
<li class="glyphicon glyphicon-text-color"></li>       
<li class="glyphicon glyphicon-text-background"></li>      
<li class="glyphicon glyphicon-object-align-top"></li> 
<li class="glyphicon glyphicon-object-align-bottom"></li>
<li class="glyphicon glyphicon-object-align-horizontal"></li>
<li class="glyphicon glyphicon-object-align-left"></li>
<li class="glyphicon glyphicon-object-align-vertical"></li>
<li class="glyphicon glyphicon-object-align-right"></li>
<li class="glyphicon glyphicon-triangle-right"></li>
<li class="glyphicon glyphicon-triangle-left"></li>  
<li class="glyphicon glyphicon-triangle-bottom"></li>   
<li class="glyphicon glyphicon-triangle-top"></li> 
<li class="glyphicon glyphicon-console"></li>    
<li class="glyphicon glyphicon-superscript"></li>         
<li class="glyphicon glyphicon-subscript"></li>     
<li class="glyphicon glyphicon-menu-left"></li>       
<li class="glyphicon glyphicon-menu-right"></li>       
<li class="glyphicon glyphicon-menu-down"></li>      
<li class="glyphicon glyphicon-menu-up"></li>       

                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display:none">
                <div class="panel panel-info">
                    <div class="panel-heading">默认面板</div>
                    <div class="panel-body">
                        <p class="bg-primary">Introduction</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display:none">
                <div class="panel panel-warning">
                    <div class="panel-heading">默认面板</div>
                    <div class="panel-body">
                        面板
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display:none">
                <div class="panel panel-default">
                    <div class="panel-heading">默认面板</div>
                    <div class="panel-body">
                        面板
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
