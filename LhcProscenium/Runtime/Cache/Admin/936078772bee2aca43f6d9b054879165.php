<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>IH后台管理页面</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/Public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span style='font-size:16px;' class='label label-primary'><?php echo ($userStatus); ?></span>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_data_tables.html#">选项1</a>
                                </li>
                                <li><a href="table_data_tables.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>用户ID</th>
                                    <th>用户名</th>
                                    <th>IH昵称</th>
                                    <th>账号状态</th>
                                    <th>注册时间</th>
                                    <th>用户详情</th>
                                    <th>用户动态</th>
                                    <th>管理用户</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php if(is_array($info)): foreach($info as $key=>$k): ?><tr class="gradeX">
										<td><?php echo ($k['id']); ?></td>
										<td><?php echo ($k['username']); ?></td>
										<td><?php echo ((isset($k['nickname']) && ($k['nickname'] !== ""))?($k['nickname']):"未设置昵称"); ?></td>
										<td>
											<?php switch($k["status"]): case "0": ?>禁用用户<?php break;?>    
											<?php case "1": ?>普通用户<?php break;?>    
											<?php case "2": ?>会员用户<?php break;?>    
											<?php case "3": ?>认证用户<?php break;?>    
											<?php case "4": ?>官方用户<?php break;?>    
											<?php default: ?>神秘用户<?php endswitch;?>
										</td>
										<td><?php echo (date("Y-m-d H:i:s",$k['time'])); ?></td>
										<td class="center"><a href="/index.php/Admin/User/userdetails/id/<?php echo ($k['id']); ?>">->用户详情</a></td>
										<td class="center"><a href="/index.php/Admin/User/userdynamic/nickname/<?php echo ($k['nickname']); ?>">->用户动态详情</a></td>
										<td class="center">
											<?php if($relieve == 1): ?><a href="/index.php/Admin/User/relieveUser/id/<?php echo ($k['id']); ?>">解除禁用</a>
											<?php else: ?>
												<a href="/index.php/Admin/User/userforbid/id/<?php echo ($k['id']); ?>">禁用</a>
												&nbsp;&nbsp;
												<a href="javascript:alert('等待完善');">禁言</a><?php endif; ?>
										</td>
									</tr><?php endforeach; endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>用户ID</th>
                                    <th>用户名</th>
                                    <th>IH昵称</th>
                                    <th>账号状态</th>
                                    <th>注册时间</th>
                                    <th>用户详情</th>
                                    <th>用户动态</th>
									<th>管理用户</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/Public/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/Public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/Public/js/content.min.js?v=1.0.0"></script>
	 <script type="text/javascript" src="/Public/js/contabs.min.js"></script>
    <script src="/Public/js/plugins/pace/pace.min.js"></script>
    <script>
        $(document).ready(function(){$(".dataTables-example").dataTable();var oTable=$("#editable").dataTable();oTable.$("td").editable("../example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->

</body>

</html>