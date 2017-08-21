<?php
namespace Home\Controller;
use Think\Controller;

class LeftAuthenticationController extends Controller{

	//进行实名认证
	public function authentication()
	{
		$m = M('user_details');
		$info = $m->where("nickname='{$_SESSION['nickname']}'")->select();
		$a = M('authentication');
		$astatus = $a->where("nickname='{$_SESSION['nickname']}'")->field("status")->find();
		$e = M('enterprise');
		$estatus = $e->where("nickname='{$_SESSION['nickname']}'")->field("status")->find();
		$this->assign('info',$info);
		$this->assign('astatus',$astatus);
		$this->assign('estatus',$estatus);
		$this->display('Authentication');
	}
	
	//ajax判断申请认证
	public function AjaxInsert()
	{
		$m = D('authentication');
		if($m->create())
		{
			echo "<i class='glyphicon glyphicon-ok'></i>";
		}else{
			echo $m->getError();
		}
	}
	
	//申请实名认证
	public function insert()
	{
		$upload = new \Think\Upload();
		$upload->maxSize = 3145728;
		$upload->exts = array('jpg', 'png', 'jpeg');
		$upload->rootPath = 'public/authentication/';
		$upload->autoSub = false;
		$info = $upload->upload(); 
		if(!$info){
			if($upload->getError() == '没有文件被上传！')
			{
				$this->error('请上传身份证正反面! ');
			}else{
				$this->error($upload->getError());
			}	
		}else{
			$_POST['nickname'] = $_SESSION['nickname'];
			$_POST['front_picture'] = $info['picture1']['savename'];
			$_POST['reverse_picture'] = $info['picture2']['savename'];
			$m = D('authentication');
			$m->create();
			$res = $m->add();
			if($res)
				$this->success('申请实名认证成功,请等待3-5个工作日~~~');
			else
				$this->error('失败');
		}
	}
}
?>