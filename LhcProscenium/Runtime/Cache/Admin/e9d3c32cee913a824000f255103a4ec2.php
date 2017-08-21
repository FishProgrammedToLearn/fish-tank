<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>IH后台管理页面</title>

  <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
	<script src="/Public/js/jquery-1.8.3.js"></script>
	<script>
		$(function(){
			$("input").blur(function(){
				n = "";
				if(this.name == 'password_')
					n = "&password="+$("input[name='password']").val();
				$.ajax({
				    type: "POST",
				    url: "/index.php/Admin/Administrator/AjaxInsert",
				    data: this.name+"="+this.value+n,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).next().next().html(m);
				
			});
			
			$("select").blur(function(){
				$.ajax({
				    type: "POST",
				    url: "/index.php/Admin/Administrator/AjaxInsert",
				    data: this.name+"="+this.value,
					async:false,
					success:function(data){
						m = data;
					}
				});
				$(this).next().next().html(m);
				if(this.value == '3')
					$('.finish_time').css('display','block');
				else
					$('.finish_time').css('display','none');
					$('#time').val('');
			});
			
			$("form").submit(function(){
				var sm = $(this).find("[name='status']").val();
				if(sm == '3')
					var m = 12;
				else
					var m = 10;
				var t = '<i class="glyphicon glyphicon-ok"></i>';
				while(m > 2)
				{
					var val = $("span").eq(m-2).html();
					//alert(val);
					if(val != t)
						return false;
					m-=2;
				}
			});
			
		});
	</script>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <span class='label label-primary' style='font-size:16px;'>添加管理员</span>
                        <div class="ibox-tools">
							<a style='color:blue;' class="collapse-link">
								<<<
							</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/index.php/Admin/Administrator/insert" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >管理员用户名</label>

                                <div class="col-sm-10">
                                    <input type="text" name="username" style='width:760px;float:left;' class="form-control">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">管理员密码</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style='width:760px;float:left;' name="password" value=''> 
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">确认管理员密码</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style='width:760px;float:left;' name="password_">
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
                             <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">管理员级别</label>

                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="status" style='width:760px;float:left;'>
                                        <option disabled selected value=''>管理员权限选择</option>
                                        <option disabled>Boss</option>
                                        <option value='2'>管理员</option>
                                        <option value='3' class='temporary'>临时管理员</option>
                                        <option value='0'>禁用管理员</option>
                                    </select>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							<div class='finish_time' style='display:none;'>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">到期时间</label>
								<div class="col-sm-10">
                                    <input type='datetime-local' class="form-control" id="time" name='finish_time' style='width:760px;float:left;'/>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span class="help-block m-b-none" style='float:left;font-size:16px;color:red;'></span>
                                </div>
                            </div>
							</div>
							 <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
									&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-white" type="reset">重置</button>
                                </div>
                            </div>  
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
	
	
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