<?php
namespace Admin\Controller;
use Think\Controller;

class AdministratorController extends Controller{
	
	//跳转至添加管理员页面
	public function add()
	{
		$this->display('AddAdministrator');
	}
	
	//跳转至浏览管理员页面
	public function modification()
	{
		$m = M('admin');
		$info = $m->select();
		
		$this->assign('info',$info);
		$this->display('administrator');
	}
	
	//Ajax判断
	public function AjaxInsert()
	{
		$m = D('admin');
		if($m->create())
		{	
			echo "<i class='glyphicon glyphicon-ok'></i>";
		}else{
			echo $m->getError();
		}	
		
	}
	
	//数据插入admin管理员表
	public function insert()
	{
		$m = D('admin');
		//var_dump($_POST);die;
		$_POST['status'] = intval($_POST['status']);
		$_POST['finish_time'] = intval(strtotime($_POST['finish_time']));
		//var_dump($_POST);die;
		$m->create();
		$res = $m->add();
		if($res){
			$this->success('添加成功', 'modification');
		}else{
			$this->error('添加失败');
		}
	}
	
	//跳转修改页面并按id获取数组传值
	public function renewal()
	{
		$m = M('Admin');
		$info = $m->where($_GET)->find();
		$info['finish_time'] = date('Y-m-d\TH:i',$info['finish_time']);
		$this->assign('info',$info);
		$this->display('UpdateAdministrator');
	}
	
	//执行修改操作
	public function update()
	{
		$m = M("Admin");
		$_POST['status'] = intval($_POST['status']);
		$_POST['finish_time'] = intval(strtotime($_POST['finish_time']));
		$m->create();
		$res = $m->save();
		if($res >= 0){
			$this->success('修改成功', 'modification');
		}else{
			$this->error('修改失败');
		}
			
	}

}
?>