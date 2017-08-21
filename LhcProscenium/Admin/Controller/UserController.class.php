<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller{
	//页面跳转
	public function index()
	{
		$where['switch'] = 1;
		
		switch($_GET['where'])
		{
			//普通用户
			case 'NormalUser':
				$where['status'] = 1;
				$userStatus = "普通用户";
			break;
			//会员用户
			case 'PrerogativeUser':
				$where['status'] = 2;
				$userStatus = "会员用户";
			break;
			//认证用户
			case 'VerifyUser':
				$where['status'] = 3;
				$userStatus = "认证用户";
			break;
			//官方用户
			case 'OfficialUser':
				$where['status'] = 4;
				$userStatus = "官方用户";
			break;
			
			case 'ForbidUser':
				$where['switch'] = 0;
				$userStatus = "禁用用户";
				$this->assign('relieve','1');
			break;
		}
		
		
		$m = M('Users');
		
		$info = $m->where($where)->select();
		// var_dump($info);die;
		$this->assign('userStatus',$userStatus);
		$this->assign('info',$info);
		$this->display('user');
	}
	
	//遍历用户详情表
	public function userdetails()
	{
		$m = M('user_details');
		$info = $m->where($_GET)->find();
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->display('userdetails');
	}
	
	//遍历动态与评论
	public function userdynamic()
	{
		$m = M('dynamic');
		$info = $m->where("nickname='{$_GET['nickname']}'")->select();
		$n = M('dynamic_comment');
		for($i = 0; $i < count($info); $i++)
		{
			$comment[] = $n->where("did='{$info[$i]['id']}'")->select();
		}
		
		$this->assign('num','1');
		$this->assign('cnum','0');
		$this->assign('info',$info);
		$this->assign('comment',$comment);
		$this->display('userdynamic');
	}
	
	//禁止用户访问
	public function userforbid()
	{
		$m = M('users');
		$data['switch'] = 0;		
		$res = $m->where("id=".$_GET['id'])->save($data); 
		if(is_int($res))
		{
			$this->success('修改成功');
		}else{
			$this->error('修改失败,非法操作已查封当前IP');
		}
	}
	
	//删除动态以及动态中的评论
	public function del_dynamic()
	{
		$c = M("collect");
		$res1 = $c->where("did={$_GET['id']}")->delete();
		
		$e = M("endorse");
		$res2 = $e->where("did={$_GET['id']}")->delete();
		
		$h = M("hotdynamic_id");
		$res3 = $h->where("did={$_GET['id']}")->delete();
		
		$m = M('dynamic_comment');
		$info = $m->where("did={$_GET['id']}")->select();
		for($i = 0; $i < count($res4); $i++)
		{
			$ce = M('comment_endorse');
			$ce->where("dcid = {$res4[$i]['id']}")->delete();
		}
		$res4 = $m->where("did={$_GET['id']}")->delete();
		
		$n = M('dynamic');
		$res5 = $n->where("id={$_GET['id']}")->delete();
		
		$this->success("动态删除成功");
	}
	
	//删除指定动态的指定评论
	public function del_dynamicComment()
	{
		$m = M('dynamic_comment');
		$res = $m->where("id={$_GET['id']}")->delete();
		if($res)
			$this->success("评论删除成功");
		else
			$this->error("评论删除失败");
	}
	
	//解除指定用户的禁用状态
	public function relieveUser()
	{
		$m = M('users');
		$data['switch'] = 1;		
		$res = $m->where("id=".$_GET['id'])->save($data); 
		if(is_int($res))
		{
			$this->success('修改成功');
		}else{
			$this->error('修改失败,非法操作已查封当前IP');
		}
	}

}
?>