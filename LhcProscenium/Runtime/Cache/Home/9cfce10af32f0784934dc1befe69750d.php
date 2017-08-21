<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>欢迎访问 Internet Home - 注册</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
	<script src="/Public/js/jquery-1.8.3.js"></script>
	<script>
		$(function(){
			$("input:eq(0)").blur(function(){
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Login/AjaxEnroll",
				    data: this.name+"="+this.value,
					//async:false,
					success:function(data){
						$("input:eq(0)").parent().next().html(data);
					}
				});
				
			});
			$("input:eq(1)").blur(function(){
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Login/AjaxEnroll",
				    data: this.name+"="+this.value,
					//async:false,
					success:function(data){
						var m = data;
						$("input:eq(1)").parent().next().html(data);
					}
				});
				
			});
			$("input:eq(2)").blur(function(){
				var m = $("input:eq(1)").val();
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/Login/AjaxEnroll",
				    data: this.name+"="+this.value+"&password="+m,
					//async:false,
					success:function(data){
						$("input:eq(2)").parent().next().html(data);
					}
				});
				
			});
			
			$(".m-t").submit(function(){
				var m = 3;
				var t = '<i class="glyphicon glyphicon-ok"></i>';
				while(m)
				{
					var val = $("span").eq(m-1).html();
					if(val != t)
						return false;
					m--;
				}
			});
			
			
		});
	</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IH</h1>

            </div>
            <h3>欢迎注册 IH</h3>
            <p>创建一个IH新账户</p>
            <form class="m-t" role="form" action="/index.php/Home/Login/enroll" method="post">
				<div style="width:400px;">
                <div class="form-group" style='float:left;width:300px;'>
                    <input type="text" class="form-control" placeholder="请输入用户名" name="username" >
                </div>
				<span style='float:left;color:red;line-height:30px;'></span>
				</div>
				
				<div style="width:400px;" >
                <div class="form-group" style='float:left;width:300px;'>
                    <input type="password" class="form-control" placeholder="请输入密码" name="password">
                </div>
				<span style='float:left;color:red;line-height:30px;'></span>
				</div>
				
				<div style="width:400px;" >
                <div class="form-group" style='float:left;width:300px;'>
                    <input type="password" class="form-control" placeholder="请再次输入密码" name="password_">
                </div>
				<span style='float:left;color:red;line-height:30px;'></span>
				</div>
                <!-- <div class="form-group text-left"> -->
                    <!-- <div class="checkbox i-checks"> -->
                        <!-- <label class="no-padding">
                            <input type="checkbox"><i></i> 我同意注册协议=>
							<a href="javascript:alert('网络安全协议');">查看注册协议</a>
						</label>
						<br/> -->
                    <!-- </div> -->
                <!-- </div> -->
                <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>

                <p class="text-muted text-center"><small>已经有账户了？</small><a href="/index.php/Home/Login/index">点此登录</a>
                </p>

            </form>
        </div>
    </div>
    <!-- <script src="__PUCLIC__/js/jquery.min.js?v=2.1.4"></script> -->
    <script src="__PUCLIC__/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="__PUCLIC__/js/plugins/iCheck/icheck.min.js"></script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>

</html>