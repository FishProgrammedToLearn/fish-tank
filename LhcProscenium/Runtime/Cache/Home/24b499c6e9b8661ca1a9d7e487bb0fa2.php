<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 数据表格</title>

    <link rel="shortcut icon" href="favicon.ico"> 
	<link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/Public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
	<script src="/Public/js/jquery-1.8.3.js"></script>
	<script>
		$(function(){
			var m = false;
			$(".comment").click(function(){
				var n = $(this).attr('num');
				//alert(n);
				if(!m){
					//$(this).parent().parent().parent().parent().next().find('tbody').css('display','block');
					//hasClass("social-body").next().next().css('display','block')
					$("table").eq(n).parent().slideDown(200);
					//$(".cDiv").find('tbody').css('display','block');
					m = true;
				}else{
					$("table").eq(n).parent().slideUp(200);
					//$(this).parent().parent().parent().parent().next().find('tbody').css('display','block');
					//$(".cDiv").find('tbody').css('display','none');
					m = false;
				}
			});
			
		});
	</script>
</head>

<body class="gray-bg">
    
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
				   
				   
							<?php if($info): if(is_array($info)): foreach($info as $key=>$k): ?><div class="col-sm-12" >	
							<div class="ibox float-e-margins">	
								<div class="ibox-title">
									<span class='label label-primary' style='font-size:13px;'><?php echo ($k['nickname']); ?></span>
									<span class='label label-warning-light' style='font-size:13px;'>(<?php echo (date("Y-m-d H:i:s",$k['time'])); ?>)</span>
									<?php if(($k['hot']) == "1"): ?>&nbsp;&nbsp;<i class='glyphicon glyphicon-fire' style='font-size:20px;color:red;'></i><?php endif; ?>
									<?php if(($k['type']) == "4"): ?>&nbsp;&nbsp;<i class='glyphicon glyphicon-globe' style='font-size:20px;color:#1AB394'></i><?php endif; ?>
									<div class="ibox-tools">
										<?php if(($k['display']) == "0"): ?><i class='glyphicon glyphicon-ban-circle' style='font-size:15px;color:#F8AC59;'></i><?php endif; ?>
										<a style='color:blue;' class="collapse-link">
											<<<
										</a>
										<!-- <a style='color:blue;' href='/index.php/Home/Left/index/where/NormalUser'>
											<i class="glyphicon glyphicon-repeat"></i> 返回
										</a> -->
									</div>
								</div>
								<div class="ibox-content">
					
									<table class="table-striped table-bordered table-hover dataTables-example">
									<tbody> 
									<div class="social-feed-box">
										<?php if(($k['nickname']) == $_SESSION['nickname']): ?><div class="pull-right social-action dropdown">
												<button data-toggle="dropdown" class="dropdown-toggle btn-white">
													<i class="fa fa-angle-down"></i>
												</button>
												<ul class="dropdown-menu m-t-xs">
													<?php if(($k['display']) == "0"): ?><li><a href="/index.php/Home/Left/block_dynamic/id/<?php echo ($k['id']); ?>">显示动态</a></li><?php endif; ?>
													<?php if(($k['display']) == "1"): ?><li><a href="/index.php/Home/Left/none_dynamic/id/<?php echo ($k['id']); ?>">隐藏动态</a></li><?php endif; ?>
													<li><a href="/index.php/Home/Left/del_dynamic/id/<?php echo ($k['id']); ?>">删除动态</a></li>
												</ul>
											</div><?php endif; ?>
										<div class="social-avatar">
											<a href="" class="pull-left">
												<img alt="image" src="/Public/img/<?php echo ($k['npicture']); ?>">
											</a>
											<div class="media-body">
												<a href=''><?php echo ($k['nickname']); ?></a>
												<small class="text-muted"><?php echo (date("Y-m-d H:i:s",$k['time'])); ?></small>
											</div>
										</div>
										<br/>
										<div class="social-body">
											<p>
												<?php echo ($k['text']); ?>:今天天气很好,非常好
											</p>
											<div>
												<img src='' />
											</div>
											<br/>
											<div class="">
												<div style='width:100%'>
													<center>
													<div style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:15px;' class='fa fa-thumbs-up'></i> 点赞 (<?php echo ($k['endorse']); ?>)</div>
													<div style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:14px;' class='fa fa-heart'></i> 收藏 (<?php echo ($k['collect']); ?>)</div>
													<div style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:15px;' class='fa fa-share'></i> 转发 (<?php echo ($k['rebroadcast']); ?>)</div>
													<a class='comment' num='<?php echo ($num); ?>'><div style='width:25%;float:left;'><i style='font-size:16px;' class='fa fa-comments'></i> 评论 (<?php echo ($k['comment']); ?>)</div></a>
													</center>
												</div>
											</div>
											<br/>
										</div>
										</div> 
										</tbody>
								</table>
											<div style='display:none;'>
											<table border='0px' height='100%' cellspacing='0px' >
												<?php if(is_array($comment[$cnum])): foreach($comment[$cnum] as $key=>$ck): ?><tbody>
													<tr>
														<td rowspan='2' width='40px'>
															<img width='40px' src="/Public/img/<?php echo ($ck['picture']); ?>" /></td>
														<td width='100%'><a href=''>&nbsp;&nbsp;<?php echo ($ck['nickname']); ?></a></td>
													</tr>
													<tr>
														<td>
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<?php echo ($ck['text']); ?>
														</td>
													</tr>
													<tr>
														<td>&nbsp;</td>
														<td align='right'><i style='font-size:16px;' class='fa fa-thumbs-up'></i> 
														赞 (<?php echo ($ck['endorse']); ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (date("Y-m-d H:i:s",$ck['time'])); ?>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Left/del_dynamicComment/id/<?php echo ($ck['id']); ?>">删除</a>&nbsp;&nbsp;&nbsp;</td>
													</tr>
													<tr><td width='100%' colspan='2'>
														<div style='width:100%;height:10px;border:0px solid black;'>
															<div style='width:100%;height:1px;border-top:1px solid #CCC;margin-top:10px;'></div>
														</div>
													</td></tr>
													</tbody><?php endforeach; endif; ?>
											</table>
											</div>
									
									 
								</div>
								</div> 
								 </div>       
								
								<div style='display:none;'><?php echo ($num++); echo ($num++); echo ($cnum++); ?></div><?php endforeach; endif; ?>
								
								<?php else: ?>
								<div class="middle-box text-center animated fadeInDown">
									<h1 style='font-size:40px;'>当前类别并无动态</h1>
									<br/>
									<div class="error-desc">
										请返回上一页~
										<br/>
										<br/>
										<a href="javascript:history.go(-1);" class="btn btn-primary m-t">返回</a>
										<a href="javascript:history.go(-1);" class="btn btn-primary m-t">Go Back</a>
										<a href="javascript:history.go(-1);" class="btn btn-primary m-t">戻る</a>
										<a href="javascript:history.go(-1);" class="btn btn-primary m-t">복귀</a>
									</div>
								</div><?php endif; ?>
                           
						
					                   
				</div> 
             </div>      
              
           
        
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/Public/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/Public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/Public/js/content.min.js?v=1.0.0"></script>
    <script>
        $(document).ready(function(){$(".dataTables-example").dataTable();var oTable=$("#editable").dataTable();oTable.$("td").editable("../example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->

</body>

</html>