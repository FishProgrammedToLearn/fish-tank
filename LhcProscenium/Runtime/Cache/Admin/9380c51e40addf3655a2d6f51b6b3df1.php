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
                        <span style='font-size:16px;' class='label label-primary'>查看管理员</span>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a href='/index.php/Admin/Administrator/modification'>
								 <i class="glyphicon glyphicon-refresh"></i>
							</a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>管理员ID</th>
                                    <th>管理员账号</th>
                                    <th>管理员状态</th>
                                    <th>账号截至日期</th>
                                    <th>更改管理员</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php if(is_array($info)): foreach($info as $key=>$k): ?><tr class="gradeX">
										<td><?php echo ($k['id']); ?></td>
										<td><?php echo ($k['username']); ?></td>
										<td>
											<?php switch($k["status"]): case "0": ?>禁用管理员<?php break;?>    
											<?php case "1": ?>Boss<?php break;?>    
											<?php case "2": ?>管理员<?php break;?>    
											<?php case "3": ?>临时管理员<?php break;?>  
											<?php default: ?>神秘用户<?php endswitch;?>
										</td>
										<?php if($k['finish_time']): ?><td><?php echo (date("Y-m-d H:i:s",$k['finish_time'])); ?></td>
										<?php else: ?>
											<td>ALL</td><?php endif; ?>
										<td class="center">
											<a href="/index.php/Admin/Administrator/renewal/id/<?php echo ($k['id']); ?>">修改信息</a>
										</td>
									</tr><?php endforeach; endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>管理员ID</th>
                                    <th>管理员账号</th>
                                    <th>管理员状态</th>
                                    <th>账号截至日期</th>
                                    <th>更改管理员</th>
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