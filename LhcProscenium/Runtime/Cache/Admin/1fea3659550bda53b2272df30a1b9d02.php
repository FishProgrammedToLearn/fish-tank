<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>IH后台管理页面</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">
	
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IH</h1>

            </div>
            <h3>Internet Home后台管理页面</h3>

            <form class="m-t" role="form" action="/index.php/Admin/Login/enter" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="用户名" name="username" >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" name="password" >
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
				
				<br/>
				<p class="text-muted text-center">中国网络安全局备案:98730910480943853429</p>
                <p class="text-muted text-center">国际网络安全局备案:83794872397492301091</p>
                <p class="text-muted text-center">中国公安网备案:876238490981239873989438</p>
                <p class="text-muted text-center">权限需知:</p>
                <p class="text-muted text-center">Boss->管理员->临时管理员</p>
				
            </form>
        </div>
    </div>
    <!-- <aside class="ww-aside-navbar" id="nslide" style="width: 337.92px; height: 736px;">
    </aside> -->
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/js/plugin.min.js"></script>
    <script src="/Public/js/base.min.js"></script>
</body>

</html>