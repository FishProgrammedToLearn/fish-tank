<?php
namespace Home\Controller;
use Think\Controller;

class LeftEnterpriseController extends Controller{

	//进行企业认证
	public function enterprise()
	{
		$a = M('authentication');
		$astatus = $a->where("nickname='{$_SESSION['nickname']}'")->field("status")->find();
		$e = M('enterprise');
		$estatus = $e->where("nickname='{$_SESSION['nickname']}'")->field("status")->find();
		$this->assign('astatus',$astatus);
		$this->assign('estatus',$estatus);
		$this->display('enterprise');
	}
	
	//ajax判断申请认证
	public function AjaxInsert()
	{
		$m = D('enterprise');
		if($m->create())
		{
			echo "<i class='glyphicon glyphicon-ok'></i>";
		}else{
			echo $m->getError();
		}
	}
	
	//申请企业认证
	public function insert()
	{
		$upload = new \Think\Upload();
		$upload->maxSize = 3145728;
		$upload->exts = array('jpg', 'png', 'jpeg');
		$upload->rootPath = 'public/enterprise/';
		$upload->autoSub = false;
		$info = $upload->upload(); 
		if(!$info){
			if($upload->getError() == '没有文件被上传！')
			{
				$this->error('请上传营业执照! ');
			}else{
				$this->error($upload->getError());
			}	
		}else{
			$_POST['nickname'] = $_SESSION['nickname'];
			$_POST['picture'] = $info['picture']['savename'];
			$m = D('enterprise');
			$m->create();
			$res = $m->add();
			if($res)
				$this->success('申请企业认证成功,请等待3-5个工作日~~~');
			else
				$this->error('失败');
		}
	}
}
?>