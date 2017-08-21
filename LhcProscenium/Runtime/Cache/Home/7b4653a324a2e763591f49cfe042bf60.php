<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Internet Home</title>

    <link rel="shortcut icon" href="favicon.ico"> 
	<link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
	<link href="/Public/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/Public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
	<script src="/Public/js/jquery-1.8.3.js"></script>
	<script>
		$(function(){
			//alert($().jquery);
			var m = false;
			var t = false;
			
			//评论向下展开
			$(".comment").click(function(){
				var n = $(this).attr('num');
				if(!m){
					$("table").eq(n).parent().slideDown(200);
					m = true;
				}else{
					$("table").eq(n).parent().slideUp(200);
					m = false;
				}
			});
			
			//取消点赞时执行操作
			$(document).on('click',".etrue",function(){
				var did = $(this).attr('did');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Dynamic/AjaxECancel",
				    data: "id="+did,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).attr('class','');
				$(this).css('color','#1AB394');
				$(this).children().children('span').children().html(m);
				$(this).children().children('i').attr('class','fa fa-thumbs-up animated rubberBand');
				e = $(this);
				t = setTimeout(function(){
					$(e).children().children('i').attr('class','fa fa-thumbs-up');
					$(e).attr('class','efalse');
				}, 1000);
			});
			
			//点赞时执行操作
			$(document).on('click',".efalse",function(){
				var did = $(this).attr('did');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Dynamic/AjaxEAdd",
				    data: "id="+did,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).attr('class','');
				$(this).css('color','red');
				$(this).children().children('span').children().html(m);
				//return false;
				$(this).children().children('i').attr('class','fa fa-thumbs-up animated rubberBand');
				e = $(this);
				t = setTimeout(function(){
					$(e).children().children('i').attr('class','fa fa-thumbs-up');
					$(e).attr('class','etrue');
				}, 1000);	
			});
//=================评论点赞
			//取消点赞时执行操作
			$(document).on('click',".CEtrue",function(){
				var cid = $(this).attr('cid');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Dynamic/AjaxCECancel",
				    data: "id="+cid,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).attr('class','');
				$(this).css('color','#1AB394');
				$(this).children().css('color','#1AB394');
				$(this).children().children('span').children().html(m);
				$(this).children().children('i').attr('class','fa fa-thumbs-up animated rubberBand');
				ce = $(this);
				t = setTimeout(function(){
					$(ce).children().children('i').attr('class','fa fa-thumbs-up');
					$(ce).attr('class','CEfalse');
				}, 1000);
			});
			
			//点赞时执行操作
			$(document).on('click',".CEfalse",function(){
				var cid = $(this).attr('cid');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Dynamic/AjaxCEAdd",
				    data: "id="+cid,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).attr('class','');
				$(this).css('color','red');
				$(this).children().css('color','red');
				$(this).children().children('span').children().html(m);
				//return false;
				$(this).children().children('i').attr('class','fa fa-thumbs-up animated rubberBand');
				ce = $(this);
				t = setTimeout(function(){
					$(ce).children().children('i').attr('class','fa fa-thumbs-up');
					$(ce).attr('class','CEtrue');
				}, 1000);	
			});
//======================================
			//取消收藏时执行操作
			$(document).on('click',".ctrue",function(){
				var did = $(this).attr('did');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Dynamic/AjaxCCancel",
				    data: "id="+did,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).attr('class','');
				$(this).css('color','#1AB394');
				$(this).children().children('span').children().html(m);
				$(this).children().children('i').attr('class','fa fa-heart animated rubberBand');
				m = $(this);
				t = setTimeout(function(){
					$(m).children().children('i').attr('class','fa fa-heart');
					$(m).attr('class','cfalse');
				}, 1000);
			});
			
			//收藏时执行操作
			$(document).on('click',".cfalse",function(){
				var did = $(this).attr('did');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Dynamic/AjaxCAdd",
				    data: "id="+did,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).attr('class','');
				$(this).css('color','red');
				$(this).children().children('span').children().html(m);
				$(this).children().children('i').attr('class','fa fa-heart animated rubberBand');
				m = $(this);
				t = setTimeout(function(){
					$(m).children().children('i').attr('class','fa fa-heart');
					$(m).attr('class','ctrue');
				}, 1000);	
			});	
			
			//鼠标移入颜色变化
			$(document).on('mouseover','.ea',function(){
				//color = $(this).css('color');
				$(this).find('span').css('color','#F8AC59');
			});
			//鼠标移除颜色变化
			$(document).on('mouseout','.ea',function(){
				$(this).find('span').css('color','');
			});
			
			//鼠标移入颜色变化
			$(document).on('mouseover','.ca',function(){
				//color = $(this).css('color');
				$(this).find('span').css('color','#F8AC59');
			});
			//鼠标移除颜色变化
			$(document).on('mouseout','.ca',function(){
				$(this).find('span').css('color','');
			});
			
			$(document).on('mouseover','.ccc',function(){
				$(this).children('span').css('color','#F8AC59');
			});
			$(document).on('mouseout','.ccc',function(){
				$(this).children('span').css('color','');
			});
			
			$(document).on('mouseover','.ccc',function(){
				$(this).children('span').css('color','#F8AC59');
			});
			$(document).on('mouseout','.ccc',function(){
				$(this).children('span').css('color','');
			});
			
			//发表评论文本框焦点时间
			$('#text').focus(function(){
				$(this).css('border','1px solid #F8AC59');
			});
			$('#text').blur(function(){
				$(this).css('border','1px solid #1AB394');
			});
			
			//发表评论执行操作
			$(".idc").click(function(){
				var text = $(this).parent().parent().prev().children().children().val();
				if(!text)
				{
					$(this).parent().parent().prev().children().children().attr('placeholder','请填写评论内容~~~');
					return false;
				}	
				var did = $(this).parent().parent().prev().children().children().attr('did');
				$.ajax({
					type: "POST",
					url: "/index.php/Home/Dynamic/InsertDC",
					data: "did="+did+"&text="+text,
					async:false,
					dataType:"json",
					success:function(data){
						m = data;
					}
				});
			
				$(this).parent().parent().parent().next().prepend("<tr><td rowspan='2' width='40px'><a href='<?php echo U('Home/MyCenter/information',array('nickname'=>"+m.nickname+"));?>'><img width='40px' src='/Public/UserHead/"+m.picture+"' /></a></td><td width='100%'><a href='<?php echo U('Home/MyCenter/information',array('nickname'=>$ck['nickname']));?>'>&nbsp;&nbsp;"+m.nickname+"</a></td></tr><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+m.text+"</td></tr><tr><td>&nbsp;</td><td align='right'><a href='javascript:void(0);' cid='<?php echo ($ck['id']); ?>' class='CEfalse' style='color:#1AB394'><span class='ccc' style='color:#1AB394'><i style='font-size:16px;' class='fa fa-thumbs-up'></i> <span>赞 (<span>"+m.endorse+"</span>)</span></i></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+m.time+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' cid='<?php echo ($ck['id']); ?>' class='del_dynamicComment'>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;回复&nbsp;&nbsp;&nbsp;</td></tr><tr><td width='100%' colspan='2'><div style='width:100%;height:10px;border:0px solid black;'><div style='width:100%;height:1px;border-top:1px solid #CCC;margin-top:10px;'></div></div></td></tr>");
				$(this).parent().parent().prev().children().children().val("");
				var n = $('#com').html();
				n = parseInt(n);
				$('#com').html( n + 1);
			});
			
			//删除评论
			$(document).on('click',".del_dynamicComment",function(){
				th = $(this);
				swal({
					title: "您确定要删除这条评论吗",
					text: "删除后将无法恢复，请谨慎操作！",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "删除",
					closeOnConfirm: false
				}, function(){
					var cid = $(th).attr('cid');
					var did = $(th).attr('did');
					$.ajax({
						type: "POST",
						url: "/index.php/Home/Dynamic/delDynamicComment",
						data: "cid="+cid+"&did="+did,
						async:false,
						//dataType:"json",
						success:function(data){
							m = data;
						}	
					});
					
					if(m == '0'){
						swal("删除失败！", "网络错误请稍后在试。", "success");
					}else{
						$(th).parent().parent().prev().prev().remove();
						$(th).parent().parent().prev().remove();
						$(th).parent().parent().next().remove();
						$(th).parent().parent().remove();
						var n = $('#com').html();
						$('#com').html( n - 1);
						swal("删除成功！", "您已经永久删除了这条信息。", "success");
					}
				});
			});
			
			$(".secondComment").click(function(){
				var nickname = $(this).attr('cnickname');
				$('textarea').val("回复@"+nickname+" :");
				$('textarea').focus();
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
								<!-- <a style='color:blue;' href='javascript:history.go(-1);'>
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
												<?php if(($k['display']) == "0"): ?><li><a href="/index.php/Home/Dynamic/block_dynamic/id/<?php echo ($k['id']); ?>">显示动态</a></li><?php endif; ?>
												<?php if(($k['display']) == "1"): ?><li><a href="/index.php/Home/Dynamic/none_dynamic/id/<?php echo ($k['id']); ?>">隐藏动态</a></li><?php endif; ?>
												<li><a href="/index.php/Home/Dynamic/del_dynamic/id/<?php echo ($k['id']); ?>">删除动态</a></li>
											</ul>
										</div><?php endif; ?>
										<div class="social-avatar">
											<a href="<?php echo U('Home/MyCenter/information',array('nickname'=>$k['nickname']));?>" class="pull-left">
												<img alt="image" src="/Public/UserHead/<?php echo ($k['npicture']); ?>">
											</a>
											<div class="media-body">
												<a href="<?php echo U('Home/MyCenter/information',array('nickname'=>$k['nickname']));?>"><?php echo ($k['nickname']); ?></a>
												<small class="text-muted"><?php echo (date("Y-m-d H:i:s",$k['time'])); ?></small>
											</div>
										</div>
										<br/>
										<div class="social-body">
											<p>
												<?php echo ($k['text']); ?>
											</p>
											<div>
												<img src='' />
											</div>
											<br/>
											<div class="">
												<div style='width:100%'>
													<center>
													<?php if($k['eboolean']): ?><a href="javascript:void(0);" did="<?php echo ($k['id']); ?>" class='etrue' style='color:red'><div class='ea' style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:15px;' id='ei' class='fa fa-thumbs-up'></i> <span>点赞 (<span class='e'><?php echo ($k['endorse']); ?></span>)</span></div></a>
													<?php else: ?>
													<a href="javascript:void(0);" did="<?php echo ($k['id']); ?>" class='efalse' style='color:#1AB394'><div class='ea' style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:15px;' id='ei' class='fa fa-thumbs-up'></i> <span>点赞 (<span class='e'><?php echo ($k['endorse']); ?></span>)</span></div></a><?php endif; ?>
													<?php if($k['cboolean']): ?><a href="javascript:void(0);" did="<?php echo ($k['id']); ?>" class='ctrue' style='color:red'><div class='ca' style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:14px;' id='ci' class='fa fa-heart'></i> <span>收藏 (<span class='c'><?php echo ($k['collect']); ?></span>)</span></div></a>
													<?php else: ?>
													<a href="javascript:void(0);" did="<?php echo ($k['id']); ?>" class='cfalse' style='color:#1AB394'><div class='ca' style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:14px;' id='ci' class='fa fa-heart'></i> <span>收藏 (<span  class='c'><?php echo ($k['collect']); ?></span>)</span></div></a><?php endif; ?>
													<div style='width:25%;float:left;border-right:1px solid #CCC;'><i style='font-size:15px;' class='fa fa-share'></i> 转发 (<?php echo ($k['rebroadcast']); ?>)</div>
													<a class='comment' num='<?php echo ($num); ?>'><div style='width:25%;float:left;'><i style='font-size:16px;' class='fa fa-comments'></i> 评论 (<span id='com'><?php echo ($k['comment']); ?></span>)</div></a>
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
									<tbody>
										<tr>
											<td rowspan='2' width='40px'>
												<a href="<?php echo U('Home/MyCenter/information',array('nickname'=>$_SESSION['nickname']));?>">
													<img width='40px' src="/Public/UserHead/<?php echo (session('picture')); ?>" />
												</a>
												</td>
												<td width='100%'>
													<a href="<?php echo U('Home/MyCenter/information',array('nickname'=>$_SESSION['nickname']));?>">
														&nbsp;&nbsp;<?php echo (session('nickname')); ?>
													</a>
												</td>
										</tr>
										<tr>
											<td>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<textarea id='text' name='text' did="<?php echo ($k['id']); ?>" style='height:20px;width:76%;border:1px solid #1AB394;overflow:hidden;resize:none;outline:none;'></textarea>
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td align='right'>
												<a href="javascript:alert('未完待续');"><i class='fa fa-smile-o' style='font-size:19px;color:#F8AC59'></i></a>
												&nbsp;&nbsp;
												<a href="javascript:alert('未完待续');"><i class='fa fa-image' style='font-size:18px;color:#1AB394;'></i></a>
												&nbsp;&nbsp;
												<a href='javascript:void(0);' class='idc' style='font-size:15px;color:red;'>发表评论</a>
												&nbsp;&nbsp;
											</td>
										</tr>
										<tr><td width='100%' colspan='2'>
												<div style='width:100%;height:10px;border:0px solid black;'>
													<div style='width:100%;height:1px;border-top:1px solid #1AB394;margin-top:10px;'></div>
												</div>
											</td></tr>
									</tbody>
									<tbody class='comment1'>
										<?php if(is_array($comment[$cnum])): foreach($comment[$cnum] as $key=>$ck): ?><tr>
												<td rowspan='2' width='40px'>
													<a href="<?php echo U('Home/MyCenter/information',array('nickname'=>$ck['nickname']));?>">
														<img width='40px' src="/Public/UserHead/<?php echo ($ck['picture']); ?>" />
													</a>
												</td>
												<td width='100%'>
													<a href="<?php echo U('Home/MyCenter/information',array('nickname'=>$ck['nickname']));?>">
														&nbsp;&nbsp;<?php echo ($ck['nickname']); ?>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<?php echo ($ck['text']); ?>
												</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td align='right'>
													<?php if($ck['eboolean']): ?><a href="javascript:void(0);" cid="<?php echo ($ck['id']); ?>" class='CEtrue' style='color:red'><span class='ccc' style='color:red'><i style='font-size:16px;' class='fa fa-thumbs-up'></i> <span>赞 (<span><?php echo ($ck['endorse']); ?></span>)</span></i></span></a>
													<?php else: ?>
														<a href="javascript:void(0);" cid="<?php echo ($ck['id']); ?>" class='CEfalse' style='color:#1AB394'><span class='ccc' style='color:#1AB394'><i style='font-size:16px;' class='fa fa-thumbs-up'></i> <span>赞 (<span><?php echo ($ck['endorse']); ?></span>)</span></i></span></a><?php endif; ?>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (date("Y-m-d H:i:s",$ck['time'])); ?>
													<?php if(($_SESSION['nickname']== $ck['nickname']) OR ($_SESSION['nickname']== $k['nickname'])): ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" cid="<?php echo ($ck['id']); ?>" did="<?php echo ($k['id']); ?>" class='del_dynamicComment'>删除</a>&nbsp;&nbsp;&nbsp;
													<?php else: ?>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;删除&nbsp;&nbsp;&nbsp;<?php endif; ?>
													<?php if($_SESSION['nickname']!= $ck['nickname']): ?>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" cnickname="<?php echo ($ck['nickname']); ?>" did="<?php echo ($k['id']); ?>" class='secondComment'>回复</a>&nbsp;&nbsp;&nbsp;
													<?php else: ?>
														&nbsp;&nbsp;&nbsp;回复&nbsp;&nbsp;&nbsp;<?php endif; ?>
												</td>
											</tr>
											<tr><td width='100%' colspan='2'>
													<div style='width:100%;height:10px;border:0px solid black;'>
														<div style='width:100%;height:1px;border-top:1px solid #CCC;margin-top:10px;'></div>
													</div>
												</td></tr><?php endforeach; endif; ?>
									</tbody>
							</div>
								</table>
						</div>
									
									 
					</div>
				</div> 
		</div>       
								
		<div style='display:none;'><?php echo ($num++); echo ($num++); echo ($cnum++); ?></div><?php endforeach; endif; ?>
								
			<?php else: ?>
			<div class="middle-box text-center animated fadeInDown">
				<h1 style='font-size:40px;'>当前并无动态~</h1>
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
              
           
        
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/Public/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/Public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/Public/js/content.min.js?v=1.0.0"></script>
	<script src="/Public/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){$(".dataTables-example").dataTable();var oTable=$("#editable").dataTable();oTable.$("td").editable("../example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->

</body>

</html>