<?php
namespace Home\Model;
use Think\Model;

class UsersModel extends Model{
	protected $_validate = array(
		array('username','require','请输入用户名'),
		array('username','','用户名已存在',0,'unique',3),
		array('password','require','请输入密码'),
		array('password_','require','请确认密码'),
		array('password_','password','密码不一致',0,'confirm'),
		array('code','require','请输入验证码'),
		array('code',5,'验证码为五位',0,'length'),
		array('code','Inspect_Code','验证码不正确',0,'callback'),
	);
	protected $_auto = array (          
		array('status','1'),  						        
		array('password','md5',3,'function'), 		         
		array('time','time',1,'function'), 			     
	);
}
?>