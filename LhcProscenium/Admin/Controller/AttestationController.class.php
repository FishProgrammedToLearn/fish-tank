<?php
namespace Admin\Controller;
use Think\Controller;

class AttestationController extends Controller{
	
	//查看已通过认证列表
	public function passA()
	{
		$m = M('authentication');
		$info = $m->where('status = 1')->select();
		
		$this->assign('status','1');
		$this->assign('info',$info);
		$this->display('authentication');
	}
	
	//查看已通过企业认证列表
	public function passE()
	{
		$m = M('enterprise');
		$info = $m->where('status = 1')->select();
		
		$this->assign('status','1');
		$this->assign('info',$info);
		$this->display('enterprise');
	}

	//查看等待认证列表
	public function waitA()
	{
		$m = M('authentication');
		$info = $m->where('status = 0')->select();
		
		$this->assign('info',$info);
		$this->display('authentication');
	}
	
	//查看等待企业认证列表
	public function waitE()
	{
		$m = M('enterprise');
		$info = $m->where('status = 0')->select();
		
		$this->assign('info',$info);
		$this->display('enterprise');
	}

	//实名认证信息详情表
	public function Adetails()
	{
		$m = M('authentication');
		$info = $m->where($_GET)->find();
		$this->assign('info',$info);
		$this->display('Adetails');
	}
	
	//企业认证信息想请表
	public function Edetails()
	{
		$m = M('enterprise');
		$info = $m->where($_GET)->find();
		$this->assign('info',$info);
		$this->display('Edetails');
	}

	//实名认证否决
	public function Ano()
	{
		$m = M('authentication');
		$res = $m()->where($_GET)->delete();
		if($res){    
			$_GET['condition'] = "实名认证失败";
			$_GET['time'] = time();
			$i = M("inform");
			$i->create($_GET)->add();
			$this->success('审核成功');
		}else{
			$this->error('审核失败');
		}
	}
	
	//实名认证通过
	public function Ayes()
	{
		$data['status'] = '1';
		$m = M('authentication');
		$res = $m->where("nickname = '{$_GET['nickname']}'")->save($data);
		if($res){ 
			$data['status'] = '3';
			$u = M('users');
			$u->where("nickname = '{$_GET['nickname']}'")->save($data);
			$_GET['condition'] = "实名认证通过";
			$_GET['time'] = time();
			$i = M("inform");
			$i->create($_GET)->add();
			$this->success('审核成功', 'Adetails');
		}else{
			$this->error('审核失败');
		}
	}

	//企业认证否决
	public function Eno()
	{
		$m = M('enterprise');
		$res = $m->where($_GET)->delete();
		if($res){    
			$_GET['condition'] = "企业认证失败";
			$_GET['time'] = time();
			$i = M("inform");
			$i->create($_GET)->add();
			$this->success('审核成功');
		}else{
			$this->error('审核失败');
		}
	}
	
	//企业认证通过
	public function Eyes()
	{
		$data['status'] = '1';
		$m = M('enterprise');
		$res = $m->where("nickname = '{$_GET['nickname']}'")->save($data);
		if($res){ 
			$data['status'] = '4';
			$u = M('users');
			$u->where("nickname = '{$_GET['nickname']}'")->save($data);
			$_GET['condition'] = "企业认证通过";
			$_GET['time'] = time();
			$i = M("inform");
			$i->create($_GET)->add();
			$this->success('审核成功', 'Adetails');
		}else{
			$this->error('审核失败');
		}
	}
}
?>