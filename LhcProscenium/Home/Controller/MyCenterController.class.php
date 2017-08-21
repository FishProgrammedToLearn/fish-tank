<?php
namespace Home\Controller;
use Think\Controller;

class MyCenterController extends Controller{
	
	//联系人视图
	public function contacts()
	{
		$this->display('contacts');
	}
	
	//个人资料视图
	public function information()
	{
		//var_dump($_GET);die;
		if($_GET['nickname'])
		{
			$m = M('user_details');
			$info = $m->where("nickname = '{$_GET['nickname']}'")->find();
				$d = M('dynamic');
				$dinfo = $d->where("nickname = '{$_GET['nickname']}'")->select();
				$r = M('relation');
				$rinfo = $r->where("unickname = '{$_GET['nickname']}' and relation = 1")->select();
				$brinfo = $r->where("unickname = '{$_GET['nickname']}' and relation = 2")->select();
			$num['dynamic'] = count($dinfo);
			$num['attention'] = count($rinfo);
			$num['fans'] = count($brinfo);
			
			$res = $r->where("unickname = '{$_SESSION['nickname']}' and pnickname = '{$_GET['nickname']}' and relation = 1")->find();
			if($res)
				$res = '1';
			else
				$res = '0';
			$this->assign('res',$res);
			$this->assign('info',$info);
			$this->assign('num',$num);
			$this->assign('back',true);
			$this->display('information');
		}else{
			$m = M('user_details');
			$info = $m->where("username = '{$_SESSION['username']}'")->find();
				$d = M('dynamic');
				$dinfo = $d->where("nickname = '{$_SESSION['nickname']}'")->select();
				$r = M('relation');
				$rinfo = $r->where("unickname = '{$_SESSION['nickname']}' and relation = 1")->select();
				$brinfo = $r->where("unickname = '{$_SESSION['nickname']}' and relation = 2")->select();
			$num['dynamic'] = count($dinfo);
			$num['attention'] = count($rinfo);
			$num['fans'] = count($brinfo);
			$this->assign('info',$info);
			$this->assign('num',$num);
			$this->display('information');
		}
		
	}
	
	//设置个人资料视图
	public function add()
	{
		$this->display('add');
	}
	
	//修改个人资料视图
	public function renewal()
	{
		$m = M('user_details');
		$info = $m->where("username = '{$_SESSION['username']}'")->find();
		$this->assign('info',$info);
		$this->display('renewal');
	}
	
	//ajax判断
	public function AjaxInsert()
	{
		$rules = array(
			array('nickname','','昵称已存在',0,'unique',3),
			array('nickname','require','请输入昵称'),
			array('picture','require','请选择头像')
		);
		$m = D('user_details');
		if($m->validate($rules)->create())
		{
			echo "<i class='glyphicon glyphicon-ok'></i>";
		}else{
			echo $m->getError();
		}		
	}
	
	public function update()
	{
		//var_dump($_POST);die;
		$m = M('user_details');
		$res = $m->save($_POST);
		//var_dump($res);die;
		if($res == '0' || $res == '1')
			$this->success("修改成功","information");
		else
			$this->error("修改失败");
		
	}
	
	//执行个人信息设置操作
	public function insert()
	{
		
		$upload = new \Think\Upload();
		$upload->maxSize = 3145728;
		$upload->exts = array('jpg', 'png', 'jpeg');
		$upload->rootPath = 'public/UserHead/';
		$upload->autoSub = false;
		$info = $upload->upload(); 
		//var_dump($info);die;
		if(!$_FILES['name'])
			$info['picture']['savename'] = 'photo.jpg';
		if(!$info){
			$this->error($upload->getError());   
		}else{
			$m = M('user_details');
			$_POST['picture'] = $info['picture']['savename'];
			$res = $m->where("username='{$_SESSION['username']}'")->save($_POST);
			if($res)
			{
				$data['nickname'] = $_POST['nickname'];
				$data['picture'] = $_POST['picture'];
				$n = M('users');
				$n->where("username='{$_SESSION['username']}'")->save($data);
				session('nickname',$_POST['nickname']);
				session('picture',$_POST['picture']);
				$this->success('设置成功', '/Home/HomePage/index');
			}else{
				$this->error('上传失败 ?');
			}
		}
	}
	
	//关注
	public function Attention()
	{
		$data['unickname'] = $_SESSION['nickname'];
		$data['pnickname'] = $_POST['nickname'];
		$data['relation'] = '1';
		$m = M("relation");
		$res = $m->add($data);
		$data['unickname'] = $_POST['nickname'];
		$data['pnickname'] = $_SESSION['nickname'];
		$data['relation'] = '2';
		$res1 = $m->add($data);
		if($res && $res1)
			echo "1";
		else
			echo "0";
	}
	
	//取消关注
	public function cancelAttention()
	{
		$m = M("relation");
		$res = $m->where("unickname = '{$_SESSION['nickname']}' and pnickname = '{$_POST['nickname']}' and relation = 1")->delete();
		$res1 = $m->where("unickname = '{$_POST['nickname']}' and pnickname = '{$_SESSION['nickname']}' and relation = 2")->delete();
		if($res && $res1)
			echo "1";
		else
			echo "0";
	}
	
	
}
?>