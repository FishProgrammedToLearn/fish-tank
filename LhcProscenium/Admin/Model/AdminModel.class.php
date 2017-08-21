<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
	protected $_validate = array(
		array('username','require','请输入用户名'),
		array('username','','用户名已存在',0,'unique',1),
		array('password','require','请输入密码'),
		array('password_','require','请确认密码'),
		array('password_','password','密码不一致',0,'confirm'),
		array('status','require','请选择管理员级别'),
		array('finish_time','require','请选择到期时间'),
		array('code','require','请输入验证码'),
		array('code',5,'验证码为五位',0,'length'),
		array('code','Inspect_Code','验证码不正确',0,'callback'),
	);
	// protected $_auto = array (          
		// array('status',int),  						        
		// array('password','md5',3,'function'), 		         
		// array('time','time',1,'function'), 			     
	// );
}
?>