<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta name="renderer" content="webkit"> -->
    <!-- <meta http-equiv="Cache-Control" content="no-siteapp" /> -->
    <title>Internet Home</title>

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <!-- <link rel="shortcut icon" href="favicon.ico"> -->
    <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet">
	<script src='/Public/js/jquery-2.1.4.min'></script>
	<style>
		 #pop-up{
			position:absolute;
			width:350px;
			height:350px;
			align:center;
			background:#435867;
			opacity:0.9;
			margin-left:42%;
			margin-top:16%;
			display:none;
			border:5px solid #1AB394;
		}
		 #issue-dynamic{
			position:absolute;
			width:600px;
			height:300px;
			align:center;
			//background:#435867;
			background:#F7F7F7;
			//opacity:0.9;
			margin-left:33%;
			margin-top:18%;
			display:none;
			border:5px solid #1AB394;
		}
	</style>
	<script>
	//图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 65; 
          var MAXHEIGHT = 65;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead onclick=$("#previewImg").click() class="img-circle" width="65px" height="65px">';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    </script>
	<script>
		$(function(){
			$('.closeUH').click(function(){
				$('#pop-up').attr('class','animated rotateOut');
			});
			$('.openUH').click(function(){
				$('#issue-dynamic').css('display','none');
				$('#pop-up').css('display','block');
				$('#pop-up').css('opacity','0.9');
				$('#pop-up').attr('class','animated rotateIn');
			});
			$('.closeID').click(function(){
				$('#issue-dynamic').attr('class','animated bounceOut');
			});
			$('.openID').click(function(){
				$('#pop-up').css('display','none');
				$('#issue-dynamic').css('display','block');
				$('#issue-dynamic').css('opacity','0.9');
				$('#issue-dynamic').attr('class','animated fadeIn');
			});
			$('#text').focus(function(){
				$(this).css('border','2px solid #F8AC59');
			});
			$('#text').blur(function(){
				$(this).css('border','0px solid #F8AC59');
			});
			
			$("form[name='MyForm']").submit(function(){
				var v = $('textarea').val();
				if(v)
					return true;
				else
					return false;
			});
			
			$(".examineNews").click(function(){
				$("#num").html("");
				$("#News").html("<i class='fa fa-envelope fa-fw'></i>并没有新消息哦~");
			});
		});	
	</script>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
	<div id='pop-up'>
		<div id='d'>
		<center>
			<div style='width:100%;text-align:right;margin-top:10px;'>
				<a href='javascript:void(0);' class='closeUH'><i class='glyphicon glyphicon-remove-circle' style='color:white;font-size:20px'></i>&nbsp;&nbsp;&nbsp;</a>
			</div>
			<h2 style='color:white'>请修改头像~~~</h2>
			<br/>
			<div style='width:70%;height:100%;border:1px solid white;'></div>
			<br/>
			<br/>
			<form action='/index.php/Home/HomePage/ModifyHP' enctype="multipart/form-data" method='post'>
			<div style='opacity:1;position:relative;' id="preview">
				<img id="imghead" alt="image" class="img-circle" src="/Public/UserHead/<?php echo (session('picture')); ?>" width='65px' height='65px' onClick="$('#previewImg').click();"/>
			</div>
			<input type="file" onChange="previewImage(this)" class="btn-primary form-horizontal" name="picture" accept="image/jpeg,image/jpg,image/png" style="display:none;" id="previewImg">
			<br/>
			<br/>
			<br/>
			<br/>
			<div style='background:black'><button style='background:none;border:none;font-size:20px;color:white;' type='submit'>修改头像</button></div>
			</form>
		</center>
		</div>
	</div>
	<div id='issue-dynamic'>
		<center>
		<div style='height:100%;margin-top:5px;'>
		<div style='width:50%;text-align:left;margin-top:13px;float:left;font-family:"楷体"'>
			&nbsp;&nbsp;&nbsp;
			<span class='label label-warning-light' style='font-size:20px;'>有什么新鲜事想告诉大家~?</span>
		</div>
		<div style='width:50%;text-align:right;margin-top:10px;font-size:18px;color:black;float:left;'>
			<a href='javascript:void(0);' class='closeID'><i class='glyphicon glyphicon-remove-circle' style='color:#1AB394;font-size:20px'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
		</div>
		</div>
		<div style='width:95%;height:1px;border:1px solid #1AB394;margin-top:50px;'></div>
		<form name='MyForm' action='/index.php/Home/HomePage/insertDynamic' method='post'>
		<div style='width:95%;height:150px;border:2px solid #1AB394;margin-top:20px;'>
			<textarea id='text' name='text' style='width:96%;height:86%;margin-top:10px;overflow:hidden;resize:none;outline:none;background:#F7F7F7'></textarea>
		</div>
		<div style='width:100%;height:25px;background:;margin-top:20px;'>
			<div style='width:50px;float:left;margin-left:40px;line-height:25px;;color:white;'>
				<a href="javascript:alert('未完待续');"><i class='fa fa-smile-o' style='font-size:30px;color:#F8AC59;margin-top:-3px;'></i></a>
			</div>
			<div style='width:50px;float:left;margin-left:10px;line-height:25px;color:white;'>
				<a href="javascript:alert('未完待续');"><i class='fa fa-image' style='font-size:25px;color:#1C84C6;margin-top:px;'></i></a>
			</div>
			<div style='width:50px;float:left;margin-left:10px;line-height:25px;color:white;'>
				<a href="javascript:alert('未完待续');"><i class='glyphicon glyphicon-film' style='font-size:25px;color:#1C84C6;margin-top:-2px;'></i></a>
			</div>
			<div style='width:50px;float:left;margin-left:130px;line-height:25px;color:#1AB394;'>
				<select name='display' style='border:0px;color:black;background:#F7F7F7;'>
					<option value='1'>所有人可见</option>
					<option value='0'>仅自己可见</option>
				</select>
			</div>
			<div style='width:100px;float:right;margin-right:50px;line-height:25px;color:white;'>
				<button type="submit" style='outline:none;margin:0; padding:0;border:0px;background:#435867'><span class='label label-warning' style='font-size:15px;height:30px;'>&nbsp;&nbsp;&nbsp;<i class='glyphicon glyphicon-ok-circle'></i> 发 布&nbsp;&nbsp;&nbsp;</span></a>
			</div>
		</div>
		</form>
		</center>
	</div>
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header" align='center'>
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/Public/UserHead/<?php echo (session('picture')); ?>" width='65px' height='65px'/></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="clear">
								<span class="block m-t-xs"><strong class="font-bold"><?php echo (session('nickname')); ?></strong></span>
                                <span class="text-muted text-xs block">
									<?php switch($_SESSION['status']): case "1": ?>普通用户<?php break;?>
										<?php case "2": ?>会员用户<?php break;?>
										<?php case "3": ?>认证用户<?php break;?>
										<?php case "4": ?>企业用户<?php break;?>
										<?php default: ?>黑客<?php endswitch;?>
								<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a target='iframe0' href="javascript:void(0);" class='openUH'>修改头像</a>
                                </li>
                                <li><a target='iframe0' href="<?php echo U('Home/MyCenter/information');?>">个人资料</a>
                                </li>
                                <li><a target='iframe0' href="<?php echo U('Home/MyCenter/contacts');?>">联系我们</a>
                                </li>
<!--                                 <li><a target='iframe0' href="javascript:alert('未完待续');">信箱</a>
                                </li> -->
                                <li class="divider"></li>
                                <li><a href="/index.php/Home/HomePage/logout">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">IH
                        </div>
                    </li>
                    <li align='center'>
                        <a href="/index.php/Home/HomePage/index">
                            <i style='font-size:25px' class="fa fa-home"></i>
                            <!-- <span class="nav-label" style='font-size:20px;'>主页</span> -->
                        </a>
                        
					</li>
                    <li align='center'>
						<a href="<?php echo U('Home/LeftMyDynamic/myDynamic');?>" target='iframe0'>
                            <i style='font-size:16px' class="glyphicon glyphicon-file"></i>
                            <span class="nav-label" style='font-size:16px;'>我的动态</span>
                        </a>
					</li>
                    <li align='center'>
						<a href="<?php echo U('Home/LeftMyAttention/myAttention');?>" target='iframe0'>
                            <i style='font-size:16px' class="glyphicon glyphicon-leaf"></i>
                            <span class="nav-label" style='font-size:16px;'>我的关注</span>
                        </a>
					</li>
                    <li align='center'>
						<a href="<?php echo U('Home/LeftMyFans/myFans');?>" target='iframe0'>
                            <i style='font-size:16px' class="glyphicon glyphicon-ice-lolly"></i>
                            <span class="nav-label" style='font-size:16px;'>我的粉丝</span>
                        </a>
					</li>
                    <li align='center'>
						<a href="<?php echo U('Home/LeftMyEndorse/myEndorse');?>" target='iframe0'>
                            <i style='font-size:16px' class="fa fa-thumbs-up"></i>
                            <span class="nav-label" style='font-size:16px;'>我的点赞</span>
                        </a>
					</li>
                    <li align='center'>
						<a href="<?php echo U('Home/LeftPhoto/Photo');?>" target='iframe0'>
                            <i style='font-size:16px' class="glyphicon glyphicon-picture"></i>
                            <span class="nav-label" style='font-size:16px;'>我的相册</span>
                        </a>
					</li>
					<li align='center'>
						<a href="<?php echo U('Home/LeftVideo/Video');?>" target='iframe0'>
                            <i style='font-size:16px' class="glyphicon glyphicon-film"></i>
                            <span class="nav-label" style='font-size:16px;'>视频动态</span>
                        </a>
					</li>
                    <li align='center'>
						<a href="<?php echo U('Home/LeftAuthentication/authentication');?>" target='iframe0'>
                            <i style='font-size:16px' class="glyphicon glyphicon-check"></i>
                            <span class="nav-label" style='font-size:16px;'>实名认证</span>
                        </a>
					</li>
                    <li align='center'>
						<a href="<?php echo U('Home/LeftEnterprise/Enterprise');?>" target='iframe0'>
                            <i style='font-size:16px' class="glyphicon glyphicon-king"></i>
                            <span class="nav-label" style='font-size:16px;'>企业认证</span>
                        </a>
					</li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                        <form action="/index.php/Home/HomePage/search" method="post" target='iframe0'>
                            <div class="form-group">
								<div style='float:left;'>
									<select name='what' class="form-control" style="font-weight:bold;width:80px;height:35px;background:#F3F3F4;border:0px;margin-top:-4px;color:#F8AC59;">
										<option value='d'><b>动态</b></option>
										<option value='n'><b>昵称</b></option>
									</select>
								</div>
								<div style='float:left;'>
									<input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="text" style='border:1px solid black;background:#F3F3F4;border:0px solid black;margin-top:-3px;width:380px;'>
								</div>
								<div style='float:left;margin-left:20px;'>
									<button type='submit' style='border:0px;resize:none;outline:none;' class="btn-primary btn-circle"><i class='glyphicon glyphicon-ok'></i></button>
								</div>
							</div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right" >
                        <li class="dropdown hidden-xs">
                            <a href='javascript:void(0);' class='openID' style='color:red;'>
                                <i class="glyphicon glyphicon-edit"></i>发布动态
                            </a>
                        </li>
                       <!--  <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 主题
                            </a>
                        </li> -->
						<li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> 
								<?php if($_SESSION['news']> 0): ?><span id='num' class="label label-primary">
										<?php echo (session('news')); ?>
									</span><?php endif; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <div id='News' style='margin:10px;text-align:center;'>
                                        <i class="fa fa-envelope fa-fw"></i>
										<?php if($_SESSION['news']> 0): ?><a href="/index.php/Home/HomePage/examineNews" class='examineNews' target='iframe0'>
												您有<?php echo (session('news')); ?>条未读消息
											</a>
										<?php else: ?>
											并没有新消息哦~<?php endif; ?>
                                       <!--  <span class="pull-right text-muted small">4分钟前</span> -->
                                    </div>
                                </li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="/index.php/Home/HomePage/examineNews" class='examineNews' target='iframe0'>
                                            <strong>查看所有 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row content-tabs ibox-content no-padding">
				<center>
					<!-- <div style='float:left;width:20%;'><a href="" style="font-size:16px;font-family:sans-serif;">全部动态</a></div> -->
					<div style='float:left;width:25%;'><a href="<?php echo U('Home/Dynamic/attention');?>" target='iframe0' style='font-size:16px;'>关注动态&nbsp;<i class='glyphicon glyphicon-tree-deciduous' style='font-size:17px;color:#1AB394'></i></a></div>
					<div style='float:left;width:25%;'><a href="<?php echo U('Home/Dynamic/collect');?>" target='iframe0' style='font-size:16px;'>收藏动态&nbsp;<i class='glyphicon glyphicon-briefcase' style='font-size:17px;color:#F8AC59'></i></a></div>
					<div style='float:left;width:25%;'><a href="<?php echo U('Home/Dynamic/hot');?>" target='iframe0' style='font-size:16px;'>热门动态&nbsp;<i class='glyphicon glyphicon-fire' style='font-size:17px;color:red;'></i></a></div>
					<div style='float:left;width:25%;'><a href="<?php echo U('Home/Dynamic/official');?>" target='iframe0' style='font-size:16px;'>企业动态&nbsp;<i class='glyphicon glyphicon-globe' style='font-size:17px;color:#1AB394'></i></a></div>
				</center>
            </div> 	
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="HomePage-index.html" frameborder="0" data-id="HomePage-index.html" seamless>
				
				</iframe>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
<!--         <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active">
                        <a data-toggle="tab" href="#tab-1">
                            <i class="fa fa-gear"></i> 主题
                        </a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#tab-2">
                        通知
                    </a>
                    </li>
                    <li><a data-toggle="tab" href="#tab-3">
                        项目进度
                    </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                            <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                        </div>
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>
                            <div class="setings-item">
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="title">皮肤选择</div>
                            <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 最新通知</h3>
                            <small><i class="fa fa-tim"></i> 您当前有10条未读信息</small>
                        </div>

                        <div>

                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a1.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        据天津日报报道：瑞海公司董事长于学伟，副董事长董社轩等10人在13日上午已被控制。
                                        <br>
                                        <small class="text-muted">今天 4:21</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a2.jpg">
                                    </div>
                                    <div class="media-body">
                                        HCY48之音乐大魔王会员专属皮肤已上线，快来一键换装拥有他，宣告你对华晨宇的爱吧！
                                        <br>
                                        <small class="text-muted">昨天 2:45</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        写的好！与您分享
                                        <br>
                                        <small class="text-muted">昨天 1:10</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>

                                    <div class="media-body">
                                        国外极限小子的炼成！这还是亲生的吗！！
                                        <br>
                                        <small class="text-muted">昨天 8:37</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a8.jpg">
                                    </div>
                                    <div class="media-body">

                                        一只流浪狗被收留后，为了减轻主人的负担，坚持自己觅食，甚至......有些东西，可能她比我们更懂。
                                        <br>
                                        <small class="text-muted">今天 4:21</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a7.jpg">
                                    </div>
                                    <div class="media-body">
                                        这哥们的新视频又来了，创意杠杠滴，帅炸了！
                                        <br>
                                        <small class="text-muted">昨天 2:45</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        最近在补追此剧，特别喜欢这段表白。
                                        <br>
                                        <small class="text-muted">昨天 1:10</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>
                                    <div class="media-body">
                                        我发起了一个投票 【你认为下午大盘会翻红吗？】
                                        <br>
                                        <small class="text-muted">星期一 8:37</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> 最新任务</h3>
                            <small><i class="fa fa-tim"></i> 您当前有14个任务，10个已完成</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>市场调研</h4> 按要求接收教材；

                                    <div class="small">已完成： 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">项目截止： 4:00 - 2015.10.01</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>可行性报告研究报上级批准 </h4> 编写目的编写本项目进度报告的目的在于更好的控制软件开发的时间,对团队成员的 开发进度作出一个合理的比对

                                    <div class="small">已完成： 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>立项阶段</h4> 东风商用车公司 采购综合综合查询分析系统项目进度阶段性报告武汉斯迪克科技有限公司

                                    <div class="small">已完成： 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>设计阶段</h4>
                                    <!--<div class="small pull-right m-t-xs">9小时以后</div>
                                    项目进度报告(Project Progress Report)
                                    <div class="small">已完成： 22%</div>
                                    <div class="small text-muted m-t-xs">项目截止： 4:00 - 2015.10.01</div>
                                </a>1
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>拆迁阶段</h4> 科研项目研究进展报告 项目编号: 项目名称: 项目负责人:

                                    <div class="small">已完成： 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">项目截止： 4:00 - 2015.10.01</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>建设阶段 </h4> 编写目的编写本项目进度报告的目的在于更好的控制软件开发的时间,对团队成员的 开发进度作出一个合理的比对

                                    <div class="small">已完成： 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>获证开盘</h4> 编写目的编写本项目进度报告的目的在于更好的控制软件开发的时间,对团队成员的 开发进度作出一个合理的比对

                                    <div class="small">已完成： 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </div> -->
        <!--右侧边栏结束-->
        <!--mini聊天窗口开始-->
        <!-- <div class="small-chat-box fadeInRight animated">

            <div class="heading" draggable="true">
                <small class="chat-date pull-right">
                    2015.9.1
                </small> 与 Beau-zihan 聊天中
            </div>

            <div class="content">

                <div class="left">
                    <div class="author-name">
                        Beau-zihan <small class="chat-date">
                        10:02
                    </small>
                    </div>
                    <div class="chat-message active">
                        你好
                    </div>

                </div>
                <div class="right">
                    <div class="author-name">
                        游客
                        <small class="chat-date">
                            11:24
                        </small>
                    </div>
                    <div class="chat-message">
                        你好，请问H+有帮助文档吗？
                    </div>
                </div>
                <div class="left">
                    <div class="author-name">
                        Beau-zihan
                        <small class="chat-date">
                            08:45
                        </small>
                    </div>
                    <div class="chat-message active">
                        有，购买的H+源码包中有帮助文档，位于docs文件夹下
                    </div>
                </div>
                <div class="right">
                    <div class="author-name">
                        游客
                        <small class="chat-date">
                            11:24
                        </small>
                    </div>
                    <div class="chat-message">
                        那除了帮助文档还提供什么样的服务？
                    </div>
                </div>
                <div class="left">
                    <div class="author-name">
                        Beau-zihan
                        <small class="chat-date">
                            08:45
                        </small>
                    </div>
                    <div class="chat-message active">
                        1.所有源码(未压缩、带注释版本)；
                        <br> 2.说明文档；
                        <br> 3.终身免费升级服务；
                        <br> 4.必要的技术支持；
                        <br> 5.付费二次开发服务；
                        <br> 6.授权许可；
                        <br> ……
                        <br>
                    </div>
                </div>


            </div>
            <div class="form-chat">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control"> <span class="input-group-btn"> <button
                        class="btn btn-primary" type="button">发送
                </button> </span>
                </div>
            </div>

        </div>
        <div id="small-chat">
            <span class="badge badge-warning pull-right">5</span>
            <a class="open-small-chat">
                <i class="fa fa-comments"></i>

            </a>
        </div> -->
    </div>
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/js/plugins/layer/layer.min.js"></script>
    <script src="/Public/js/hplus.min.js?v=4.0.0"></script>
    <script type="text/javascript" src="/Public/js/contabs.min.js"></script>
    <script src="/Public/js/plugins/pace/pace.min.js"></script>
</body>

</html>