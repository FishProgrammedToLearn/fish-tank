<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 基本表单</title>

  <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <!-- <link href="/Public/css/animate.min.css" rel="stylesheet"> -->
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
	<script src="/Public/js/jquery-1.8.3.js"></script>
	<script>
		$(function(){
			$("input").blur(function(){
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/MyCenter/AjaxInsert",
				    data: this.name+"="+this.value,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).next().next().html(m);
				
			});
			
			$("form").submit(function(){
			
				var t = '<i class="glyphicon glyphicon-ok"></i>';
				var nv = $("input[name='nickname']").next().next().html();
				var pv = $("input[name='picture']").next().next().html();
				if(nv != t || pv != t)
				{
					alert('请填写昵称与头像');
					return false;
				}
			});
			
		});
	</script>
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
</head>

<body class="gray-bg">
	<center>
    <div class="wrapper wrapper-content animated fadeInRight" style='width:70%;'>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <span class='label label-primary' style='font-size:16px;'>IH设置个人信息</span>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/index.php/Home/MyCenter/insert" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style='color:red;'>*昵称</label>

                                <div class="col-sm-10">
                                   <input type="text" name="nickname" style='width:600px;float:left;' class="form-control">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style='color:red;'>*头像</label>
                                <div class="col-sm-10">
									<div id="preview" style='float:left;' >
										<img id="imghead" alt="image" class="img-circle" src="/Public/img/photo.jpg" width='65px' height='65px' onClick="$('#previewImg').click();"/>
									</div>
									<div style='width:70%;height:100%;border:1px solid white;float:left;'></div>
									<input type="file" onChange="previewImage(this)" class="btn-primary form-horizontal" name="picture" accept="image/jpeg,image/jpg,image/png" style="display:none;" id="previewImg">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;line-height:60px;'><i class="glyphicon glyphicon-ok"></i></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['password']); ?>" name="name"> 
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">年龄</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['password']); ?>" name="age">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>

                                <div class="col-sm-7" >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-size:18px;'>男</span><input type="radio" class="radio i-checks" name='sex' value='1'>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-size:18px;'>女</span><input type="radio" class="radio i-checks" name='sex' value='0'>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">身份证</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['password']); ?>" name="name_number">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">QQ</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['password']); ?>" name="qq">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['password']); ?>" name="email">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">行业</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['password']); ?>" name="profession">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></i></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">地址</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['password']); ?>" name="address">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">简介</label>

                                <div class="col-sm-10">
                                    <textarea rows="10" cols="83" style='float:left;' name='text'></textarea>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
									&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-danger" ><a href="<?php echo U('Home/HomePage/logout');?>" style='color:white;'>退出登录</a></button>
                                </div>
                            </div>  
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
	</center>
	
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <!-- <script src="/Public/js/content.min.js?v=1.0.0"></script> -->
    <script src="/Public/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>

</html>