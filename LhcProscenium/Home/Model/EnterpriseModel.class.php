<?php
namespace Home\Model;
use Think\Model;

class EnterpriseModel extends Model{
	protected $_validate = array(
		array('name_number','require','请输入身份证'),
		array('telephone','require','请输入电话'),
	);
	protected $_auto = array (          
		array('status','0'),  						        	         						        	         
		array('time','time',1,'function'), 			     
	);
}
?>