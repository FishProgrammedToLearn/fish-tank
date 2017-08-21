<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Internet Home</title>

  <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
	<script src="/Public/js/jquery-1.8.3.js"></script>
	<script>
		$(function(){
			$("input").blur(function(){
				$.ajax({
				    type: "POST",
				    url: "/index.php/Home/LeftAuthentication/AjaxInsert",
				    data: this.name+"="+this.value,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).next().next().html(m);
			});
			
			$("form").submit(function(){
			
				var m = 14;
				var t = '<i class="glyphicon glyphicon-ok"></i>';
				while(m)
				{
					var val = $("span").eq(m).html();
					if(val != t)
						return false;
					m-=2;
				}
			});
			
		});
	</script>
		    <script>
      //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 300; 
          var MAXHEIGHT = 300;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead onclick=$("#previewImg").click() width="300px">';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
//                img.style.marginTop = rect.top+'px';
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
        function previewImage2(file)
        {
          var MAXWIDTH  = 300; 
          var MAXHEIGHT = 300;
          var div = document.getElementById('preview2');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead2 onclick=$("#previewImg2").click() width="300px">';
              var img = document.getElementById('imghead2');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
//                img.style.marginTop = rect.top+'px';
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
            div.innerHTML = '<img id=imghead2>';
            var img = document.getElementById('imghead2');
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
    <div class="wrapper wrapper-content animated fadeInRight">
		<?php if(empty($astatus and estatus)): ?><div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
					<div class="ibox-title">
                        <span class='label label-primary' style='font-size:16px;'>IH实名认证</span>
					    <div class="ibox-tools">
							<!-- <a style='color:blue;' href='/index.php/Home/LeftAuthentication/information'>
								<i class="glyphicon glyphicon-repeat"></i> 返回
							</a> -->
						</div>
                    </div>

                    <div class="ibox-content">
                        <form method="post" action="/index.php/Home/LeftAuthentication/insert" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['name']); ?>" name="name"> 
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">身份证照片(正,反)</label>
                                <div class="col-sm-10">
									<div id="preview" style='float:left;' >
										<img id="imghead" alt="image" src="/Public/authentication/example_f.jpg" width='300px' onClick="$('#previewImg').click();"/>
									</div>
									<div style='width:40%;height:100%;border:1px solid white;float:left;'></div>
									<input type="file" onChange="previewImage(this)" class="btn-primary form-horizontal" name="picture1" accept="image/jpeg,image/jpg,image/png" style="display:none;" id="previewImg">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;line-height:60px;'><i class="glyphicon glyphicon-ok"></i></span>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-2 control-label">     </label>
                                <div class="col-sm-10">
									<div id="preview2" style='float:left;' >
										<img id="imghead2" alt="image" src="/Public/authentication/example_r.jpg" width='300px' onClick="$('#previewImg2').click();"/>
									</div>
									<div style='width:40%;height:100%;border:1px solid white;float:left;'></div>
									<input type="file" onChange="previewImage2(this)" class="btn-primary form-horizontal" name="picture2" accept="image/jpeg,image/jpg,image/png" style="display:none;" id="previewImg2">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;line-height:60px;'><i class="glyphicon glyphicon-ok"></i></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">身份证</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['name_number']); ?>" name="name_number">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">行业</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['profession']); ?>" name="profession">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></i></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['email']); ?>" name="email">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></i></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">电话</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['telephone']); ?>" name="telephone">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></i></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
									&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-danger" type="reset">重置</button>
                                </div>
                            </div>  
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div class="middle-box text-center animated fadeInDown">
				<h1 style='font-size:40px;'>无需重复申请V_V</h1>
				<br/>
				<div class="error-desc">
					来自IH小帮手~
					<br/>
					<br/>
					<a href="javascript:history.go(-1);" class="btn btn-primary m-t">返回</a>
					<a href="javascript:history.go(-1);" class="btn btn-primary m-t">Go Back</a>
					<a href="javascript:history.go(-1);" class="btn btn-primary m-t">戻る</a>
					<a href="javascript:history.go(-1);" class="btn btn-primary m-t">복귀</a>
				</div>
			</div><?php endif; ?>
    </div>
	</center>
	
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>

</html>