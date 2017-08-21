<?php
namespace Admin\Controller;
use Think\Controller;

class AdminPageController extends Controller{
	public function index()
	{	
		$m = M('admin');
		$res = $m->where("username='{$_SESSION['adminname']}'")->find();
		if($res)
		{
			switch($res['status'])
			{
				case '0':
					$this->error('账号已被禁用,请联系管理员','/Admin/Login/index');
				break;
					
				case '3':
					if($res['finish_time'] <= time())
						$this->error('账号已过期,请联系管理员','/Admin/Login/index');
				break;
			}
			session('adminname',$res['username']);
			session('status',$res['status']);
			$this->display('AdminPage');
		}else{
			$this->error('请登录','/Admin/Login/index');
		}
	}
	
	public function quit()
	{
		session(null);
		redirect('/Admin/Login/index', 0, '页面跳转中...');
	}
}
?>