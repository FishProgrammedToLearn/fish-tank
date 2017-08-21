<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 个人资料</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->

</head>

<body class="gray-bg">
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
							<a style='color:blue;' href='/index.php/Home/Left/myAttention'>
								<i class="glyphicon glyphicon-repeat"></i> 返回
							</a>
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
                                    <h5><strong>169</strong> 文章</h5>
                                </div>
                                <div class="col-sm-4">
                                    <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                    <h5><strong>28</strong> 关注</h5>
                                </div>
                                <div class="col-sm-4">
                                    <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                                    <h5><strong>240</strong> 关注者</h5>
                                </div>
                            </div>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> 发送消息</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-warning btn-sm btn-block"><i class="fa fa-coffee"></i> 赞助</button>
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