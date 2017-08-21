<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Internet Home</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
	<link href="/Public/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<script src="/Public/js/plugins/sweetalert/sweetalert.min.js"></script>
	<script src="/Public/js/jquery.min.js?v=2.1.4"></script>
	<script>
		$(function(){
			//关注
			$(document).on('click',"[name='attention']",function(){
				var nickname = $(this).attr('nickname');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/LeftMyFans/Attention",
				    data: "nickname="+nickname,
					async:false,
					success:function(data){
						m = data;
					}
				});
				if(m == '1'){
					swal("关注成功","--------------------------", "success"); 
					$(this).attr('name','cancelAttention');
					$(this).html("取消关注");
				}else{
					return false;
				}
					
			});
			
			//取消关注
			$(document).on('click',"[name='cancelAttention']",function(){
				var nickname = $(this).attr('nickname');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/LeftMyFans/cancelAttention",
				    data: "nickname="+nickname,
					async:false,
					success:function(data){
						m = data;
					}
				});
				if(m == '1'){
					swal("取消成功", "--------------------------", "success"); 
					$(this).attr('name','attention');
					$(this).html("&nbsp;&nbsp;&nbsp;关&nbsp;注&nbsp;&nbsp;&nbsp;");
				}else{
					return false;
				}
					
			});
		});
	</script>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
			<?php if($info): if(is_array($info)): foreach($info as $key=>$k): ?><div class="col-sm-4">
						<div class="contact-box">
								
								<div class="col-sm-4">
									<div class="text-center">
										
										 <span><img alt="image" class="img-circle" src="/Public/UserHead/<?php echo ($k['picture']); ?>" width='65px' height='65px'/></span>
										<div class="m-t-xs font-bold">
											<?php switch($k["status"]): case "0": ?>禁用用户<?php break;?>
												<?php case "1": ?>普通用户<?php break;?>
												<?php case "2": ?>会员用户<?php break;?>
												<?php case "3": ?>认证用户<?php break;?>
												<?php case "4": ?>官方用户<?php break;?>
												<?php default: ?>黑客~~~<?php endswitch;?>
										</div>
									</div>
								</div>
								<div class="col-sm-8">
									<h3><strong><?php echo ($k['nickname']); ?></strong></h3>
									<h4>创建IH时间<i class='glyphicon glyphicon-arrow-down'></i></h4>
									<p><i class="glyphicon glyphicon-time"></i><?php echo (date("Y-m-d",$k['time'])); ?></p>
									<p><i class="glyphicon glyphicon-time"></i><?php echo (date("H:i:s",$k['time'])); ?></p>
								</div>
								<div>
								<?php if($k['rboolean']): ?>&nbsp;&nbsp;<button name="cancelAttention" nickname="<?php echo ($k['nickname']); ?>" class='btn btn-danger btn-sm' style='color:white;'>取消关注</button>&nbsp;&nbsp;
								<?php else: ?>
									&nbsp;&nbsp;<button name="attention" nickname="<?php echo ($k['nickname']); ?>" class='btn btn-danger btn-sm' style='color:white;'>&nbsp;&nbsp;&nbsp;关&nbsp;注&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;<?php endif; ?>
								<a href="/index.php/Home/LeftMyFans/viewDetails/nickname/<?php echo ($k['nickname']); ?>" class='btn btn-primary btn-sm' style='color:white'>查看信息</a>&nbsp;&nbsp;
								<a href="/index.php/Home/LeftMyFans/viewDynamic/nickname/<?php echo ($k['nickname']); ?>" class='btn btn-warning btn-sm' style='color:white'>查看动态</a>
								<div class="clearfix"></div>
								</div>
						</div>
					</div><?php endforeach; endif; ?>
			<?php else: ?>
				<div class="middle-box text-center animated fadeInDown">
					<h1 style='font-size:40px;'>您当前并无粉丝TnT...</h1>
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
    <script src="/Public/js/content.min.js?v=1.0.0"></script>
    <script>
        $(document).ready(function(){$(".contact-box").each(function(){animationHover(this,"pulse")})});
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>

</html>