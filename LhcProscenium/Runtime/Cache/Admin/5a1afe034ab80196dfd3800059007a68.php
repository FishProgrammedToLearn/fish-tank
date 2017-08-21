<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 数据表格</title>

    <link rel="shortcut icon" href="favicon.ico"> 
	<link href="/Public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
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
						<?php if($info['status'] == 0): ?><span style='font-size:14px;' class='label label-primary'>企业认证申请表</span>
						<?php else: ?>
							<span style='font-size:14px;' class='label label-primary'>企业认证通过表</span><?php endif; ?>
						<span style='font-size:14px;' class='label label-warning'><?php echo ($info['nickname']); ?></span><small></small>
                        <div class="ibox-tools">
                            <a style='color:blue;' class="collapse-link">
								<<<
                            </a>
                            <a style='color:blue;' href='javascript:history.go(-1);'>
                                <i class="glyphicon glyphicon-repeat"></i> 返回
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <tbody>   
								<tr class="gradeX">
									<td width='20%'>昵称</td>
									<td><?php echo ($info['nickname']); ?></td>
								</tr> 
								<tr class="gradeX">
									<td>营业执照</td>
									<td><img src="/Public/enterprise/<?php echo ($info['picture']); ?>" width="500px;"/></td>
								</tr>
								<tr class="gradeX">
									<td>法人身份证</td>
									<td><?php echo ($info['name_number']); ?></td>
								</tr>
								<tr class="gradeX">
									<td>身份证绑定电话</td>
									<td><?php echo ($info['telephone']); ?></td>
								</tr>
								<tr class="gradeX">
									<td>公司简介</td>
									<td><?php echo ($info['text']); ?></td>
								</tr>
								<tr class="gradeX">
									<td>时间</td>
									<td><?php echo (date("Y-m-d H:i:s",$info['time'])); ?></td>
								</tr>
								<?php if($info['status'] == 0): ?><tr><td colspan='2'>
										<div class="col-sm-6" >
											<button onclick="javascript:location.href='/index.php/Admin/Attestation/Eyes/nickname/<?php echo ($info['nickname']); ?>';" class="btn btn-primary btn-sm btn-block"><i class="fa fa-coffee"></i> 通过</button>
										</div>
										<div class="col-sm-6">
											<button onclick="javascript:location.href='/index.php/Admin/Attestation/Eno/nickname/<?php echo ($info['nickname']); ?>';" class="btn btn-danger btn-sm btn-block"><i class="fa fa-coffee"></i> 否决</button>
										</div>
									</td></tr><?php endif; ?>
                            </tbody>
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
    <script>
        $(document).ready(function(){$(".dataTables-example").dataTable();var oTable=$("#editable").dataTable();oTable.$("td").editable("../example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->

</body>

</html>