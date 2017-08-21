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
			
			
		});
	</script>
</head>

<body class="gray-bg">
	<center>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
					<div class="ibox-title">
                        <span class='label label-primary' style='font-size:16px;'>IH修改个人信息</span>
					    <div class="ibox-tools">
							<a style='color:blue;' href='/index.php/Home/MyCenter/information'>
								<i class="glyphicon glyphicon-repeat"></i> 返回
							</a>
						</div>
                    </div>

                    <div class="ibox-content">
                        <form method="post" action="/index.php/Home/MyCenter/update" enctype="multipart/form-data" class="form-horizontal">
							<input type='hidden' name="id" value="<?php echo ($info['id']); ?>" />
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style='color:red;'>*昵称</label>

                                <div class="col-sm-10">
                                   <input type="text" name="nickname" style='width:600px;float:left;' value="<?php echo ($info['nickname']); ?>" disabled class="form-control">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'><i class="glyphicon glyphicon-ok"></i></span>
                                </div>
                            </div>
                           <!--  <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style='color:red;'>*头像</label>
                                <div class="col-sm-10">
                                    <input type="file" class="btn-primary" accept="image/jpeg,image/jpg,image/png" value="<?php echo ($info['picture']); ?>" style='width:600px;float:left;' name="picture"> 
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'><i class="glyphicon glyphicon-ok"></i></span>
                                </div>
                            </div> -->
                            <div class="hr-line-dashed"></div>
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
                                <label class="col-sm-2 control-label">年龄</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['age']); ?>" name="age">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>
								<?php switch($info["sex"]): case "0": $woman = 'checked'; break;?>
								<?php case "1": $man = 'checked'; break; endswitch;?>
                                <div class="col-sm-7" >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-size:18px;'>男</span><input type="radio" class="radio i-checks" <?php echo ($man); ?> name='sex' value='1'>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-size:18px;'>女</span><input type="radio" class="radio i-checks" <?php echo ($woman); ?> name='sex' value='0'>
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
                                <label class="col-sm-2 control-label">QQ</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['qq']); ?>" name="qq">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['email']); ?>" name="email">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">行业</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['profession']); ?>" name="profession">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></i></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">地址</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:600px;float:left;' value="<?php echo ($info['address']); ?>" name="address">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">简介</label>

                                <div class="col-sm-10">
                                    <textarea rows="10" cols="83" style='float:left;' name='text'><?php echo ($info['text']); ?></textarea>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
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