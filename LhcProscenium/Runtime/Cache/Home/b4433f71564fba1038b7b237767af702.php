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
	<style>
		#pop-up{
			position:absolute;
			width:310px;
			height:314px;
			align:center;
			background:white;
			opacity:0.9;
			margin-left:325px;
			margin-top:150px;
			display:none;
			border:5px solid #1AB394;
		}
	</style>
	<script>
		$(function(){
			//显示二维码div
			$('#sponsor').click(function(){
				$('#pop-up').css('display','block');
				$('#pop-up').css('opacity','0.9');
				$('#pop-up').attr('class','animated flipInX');
			});
			
			//隐藏二维码div
			$('.csponsor').click(function(){
				$('#pop-up').attr('class','animated hinge');
				t = setTimeout(function(){
					$('#pop-up').css('display','none');
				}, 2500);	
			});
			
			//关注
			$(document).on('click',"#attention",function(){
				var nickname = $(this).attr('nickname');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/HomePage/Attention",
				    data: "nickname="+nickname,
					async:false,
					success:function(data){
						m = data;
					}
				});
				if(m == '1'){
					swal("关注成功","--------------------------", "success"); 
					$(this).parent().html("<button id='cancelAttention' nickname="+nickname+" type='button' class='btn btn-danger btn-sm btn-block'><i class='glyphicon glyphicon-leaf'></i> 取消关注</button>");
				}else{
					return false;
				}
					
			});
			
			//取消关注
			$(document).on('click',"#cancelAttention",function(){
				var nickname = $(this).attr('nickname');
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/HomePage/cancelAttention",
				    data: "nickname="+nickname,
					async:false,
					success:function(data){
						m = data;
					}
				});
				if(m == '1'){
					swal("取消成功", "--------------------------", "success"); 
					$(this).parent().html("<button id='attention' nickname="+nickname+" type='button' class='btn btn-primary btn-sm btn-block'><i class='glyphicon glyphicon-leaf'></i> 关注</button>");
				}else{
					return false;
				}
					
			});
		});
	</script>
</head>

<body class="gray-bg">
	<div id='pop-up'>
		<div style='width:100%;text-align:right;margin-top:2px;margin-left:8px;'>
			<a href='javascript:void(0);' class='csponsor'><i class='glyphicon glyphicon-remove-circle' style='color:#F8AC59;font-size:18px'></i>&nbsp;&nbsp;&nbsp;</a>
		</div>
		<img src='/Public/img/money.jpg' style='width:300px;'/>
	</div>
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人资料</h5>
						<div class="ibox-tools">
							<!-- a style='color:blue;' class="collapse-link">
								<<<
							</a> -->
							<?php if(($info["nickname"]) == $_SESSION['nickname']): ?><a style='color:blue;' href='/index.php/Home/HomePage/renewal'>
								<i class="glyphicon glyphicon-cog"></i> 设置
							</a><?php endif; ?>
							<?php if($back): ?><a style='color:blue;' href='javascript:history.go(-1);'>
									<i class="glyphicon glyphicon-repeat"></i> 返回
								</a><?php endif; ?>
						</div>
                    </div>
					
                    <div>
						<center>
							
                        <div class="ibox-content profile-content">
							<span><img alt="image" class="img-circle"  src="/Public/img/profile_small.jpg" /></span>
							<br/>
							<h4><strong><?php echo ($info['nickname']); ?></strong></h4>
							<hr/>
							
                            <p>
								<strong>姓名&nbsp;&nbsp;</strong>
								<?php echo ((isset($info['name']) && ($info['name'] !== ""))?($info['name']):"---"); ?>&nbsp;&nbsp;
								<strong>年龄&nbsp;&nbsp;</strong>
								<?php echo ((isset($info['age']) && ($info['age'] !== ""))?($info['age']):"--"); ?>&nbsp;&nbsp;
								<strong>性别&nbsp;&nbsp;</strong>
								<?php echo ((isset($info['sex']) && ($info['sex'] !== ""))?($info['sex']):"-"); ?>&nbsp;&nbsp;
							</p>
							
                            <p>
								<h4><strong>身份证&nbsp;&nbsp;</strong></h4>
								<?php echo ((isset($info['name_number']) && ($info['name_number'] !== ""))?($info['name_number']):"---------------"); ?>&nbsp;&nbsp;
							</p>
							
                            <p>
								<h4><strong>QQ&nbsp;&nbsp;</strong></h4>
								<?php echo ((isset($info['qq']) && ($info['qq'] !== ""))?($info['qq']):"---------"); ?>&nbsp;&nbsp;
							</p>
							
                            <p>
								<h4><strong>E-mail&nbsp;&nbsp;</strong></h4>
								<?php echo ((isset($info['email']) && ($info['email'] !== ""))?($info['email']):"---------@--.---"); ?>&nbsp;&nbsp;
							</p>
							
                            <p>
								<strong>职业&nbsp;&nbsp;</strong>
								<?php echo ((isset($info['profession']) && ($info['profession'] !== ""))?($info['profession']):"---"); ?>&nbsp;&nbsp;
							</p>
							
                            <p>
								<strong>地址&nbsp;&nbsp;&nbsp;</strong>
								<i class="fa fa-map-marker"></i>
								<?php echo ((isset($info['address']) && ($info['address'] !== ""))?($info['address']):"未知星球~~~"); ?>
							</p>

                            <h4><strong>简介↓↓↓</strong></h4>
                            <p>
                                <?php echo ((isset($info['text']) && ($info['text'] !== ""))?($info['text']):"--------------------------------------------------------------"); ?>
                            </p>
                            <div class="row m-t-lg">
                                <div class="col-sm-4">
                                    <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                    <h5><strong><?php echo ($num['dynamic']); ?></strong> 文章</h5>
                                </div>
                                <div class="col-sm-4">
                                    <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                    <h5><strong><?php echo ($num['attention']); ?></strong> 关注</h5>
                                </div>
                                <div class="col-sm-4">
                                    <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                    <h5><strong><?php echo ($num['fans']); ?></strong> 关注者</h5>
                                </div>
                            </div>
                            <div class="user-button">
                                <div class="row">
									<?php if(($info["nickname"]) == $_SESSION['nickname']): ?><div class="col-sm-6">
                                        <button type="button" disabled class="btn btn-primary btn-sm btn-block"><i class="glyphicon glyphicon-leaf"></i> 关注</button>
                                    </div>
									<?php else: ?>
										<?php if($res == 0): ?><div class="col-sm-6">
												<button id="attention" nickname="<?php echo ($info['nickname']); ?>" type="button" class="btn btn-primary btn-sm btn-block"><i class="glyphicon glyphicon-leaf"></i> 关注</button>
											</div>
										<?php else: ?>
											<div class="col-sm-6">
												<button id="cancelAttention" nickname="<?php echo ($info['nickname']); ?>" type="button" class="btn btn-danger btn-sm btn-block"><i class="glyphicon glyphicon-leaf"></i> 取消关注</button>
											</div><?php endif; endif; ?>
                                    <div class="col-sm-6">
                                        <button id="sponsor" class="btn btn-warning btn-sm btn-block"><i class="fa fa-coffee"></i> 赞助</button>
                                    </div>
                                </div>
                            </div>
                        </div>
						</center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/Public/js/demo/peity-demo.min.js"></script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->

</body>

</html>