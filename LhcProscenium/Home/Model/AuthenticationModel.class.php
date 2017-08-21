<?php
namespace Home\Model;
use Think\Model;

class AuthenticationModel extends Model{
	protected $_validate = array(
		array('name','require','请输入用户名'),
		array('name_number','require','请输入身份证'),
		array('profession','require','请输入行业'),
		array('email','require','请输入邮箱'),
		array('telephone','require','请输入电话'),
	);
	protected $_auto = array (          
		array('status','0'),  						        	         						        	         
		array('time','time',1,'function'), 			     
	);
}
?>