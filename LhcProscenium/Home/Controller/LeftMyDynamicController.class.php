<?php
namespace Home\Controller;
use Think\Controller;

class LeftMyDynamicController extends Controller{

	//我的动态按钮
	public function myDynamic()
	{
		$d = M('dynamic');
		$dinfo = $d->where("nickname = '{$_SESSION['nickname']}'")->order('time desc')->select();
		for($i = 0; $i < count($dinfo); $i++)
		{
			$e = M('endorse');
			$eres = $e->where("did = {$dinfo[$i]['id']} and nickname = '{$_SESSION['nickname']}'")->find();
			if($eres)
				$dinfo[$i]['eboolean'] = true;
			else
				$dinfo[$i]['eboolean'] = false;
			$c = M('collect');
			$cres = $c->where("did = {$dinfo[$i]['id']} and nickname = '{$_SESSION['nickname']}'")->find();
			if($cres)
				$dinfo[$i]['cboolean'] = true;
			else
				$dinfo[$i]['cboolean'] = false;
		}	
		$c = M('dynamic_comment');
		for($i = 0; $i < count($dinfo); $i++)
		{
			$comment[$i] = $c->where("did='{$dinfo[$i]['id']}'")->order('time desc')->select();
			for($j = 0; $j < count($comment[$i]); $j++)
			{
				$dc = M('comment_endorse');
				$res = $dc->where("dcid = {$comment[$i][$j]['id']} and nickname = '{$_SESSION['nickname']}'")->find();
				if($res)
					$comment[$i][$j]['eboolean'] = true;
				else	
					$comment[$i][$j]['eboolean'] = false;
			}
		}
		
		$this->assign('num','1');
		$this->assign('cnum','0');
		$this->assign('info',$dinfo);
		$this->assign('comment',$comment);
		$this->display('dynamic');
	}
	
	//修改动态变为隐藏
	public function none_dynamic()
	{
		$d = M('dynamic');
		$data['display'] = 0;
		$res = $d->where("id = {$_GET['id']}")->save($data);
		$this->success('修改成功');
	}
	
	//修改动态变为可见
	public function block_dynamic()
	{
		$d = M('dynamic');
		$data['display'] = 1;
		$res = $d->where("id = {$_GET['id']}")->save($data);
		$this->success('修改成功');
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
	
	//判断是否@并同时操作数据库
	public function At($string){
		if(!is_string($string))
			return "请输入字符串";
		$n = 0;
		$NewString = $string;
		while($string[$n])
		{
			if($string[$n] == '@')
				$switch = '1';
			if($switch == '1')
				$At .= $string[$n]; 
			if($switch == '1' && $string[$n] == ' ')
			{
				if(!in_array($At,$array))
				{
					$array[] = $At;
					//字符串截取
					$AtStr = substr($At,1,strlen($At)-2);
					$m = M('users');
					$res = $m->where("nickname = '{$AtStr}'")->find();
					if($res)
					{ 
						$url = U('Home/MyCenter/information',array('nickname'=>$AtStr));
						$NewAt = "<a href='{$url}'>".$At."</a>";
						//字符串替换
						$NewString = str_replace($At,$NewAt,$NewString);
						
						$data['nickname'] = $_SESSION['nickname'];
						$data['othername'] = $AtStr;
						$data['condition'] = "@";
						$data['time'] = time();
						$inform = M('inform');
						$res = $inform->add($data);
					}
				}
				$At = '';
				$switch = '0';
			}
				
			$n++;
		}
		
		return $NewString;
	}
	
	//ajax取消点赞
	public function AjaxECancel()
	{
		$m = M('endorse');
		$res = $m->where("did = {$_POST['id']} and nickname = '{$_SESSION['nickname']}'")->delete();
		$d = M('dynamic');
		$d->where("id = {$_POST['id']}")->setDec('endorse'); 
		$num = $d->where("id = {$_POST['id']}")->field('endorse')->find();
		echo $num['endorse'];
	}
	
	//ajax点赞
	public function AjaxEAdd()
	{
		$m = M('endorse');
		$data['did'] = $_POST['id'];
		$data['nickname'] = $_SESSION['nickname'];
		$data['time'] = time();
		$m->data($data)->add();
		$d = M('dynamic');
		$d->where("id = {$_POST['id']}")->setInc('endorse'); 
		$num = $d->where("id = {$_POST['id']}")->field('endorse')->find();
		echo $num['endorse'];
	}
	
	//ajax取消收藏
	public function AjaxCCancel()
	{
		$m = M('collect');
		$res = $m->where("did = {$_POST['id']} and nickname = '{$_SESSION['nickname']}'")->delete();
		$d = M('dynamic');
		$d->where("id = {$_POST['id']}")->setDec('collect'); 
		$num = $d->where("id = {$_POST['id']}")->field('collect')->find();
		echo $num['collect'];
	}
	
	//ajax收藏
	public function AjaxCAdd()
	{
		$m = M('collect');
		$data['did'] = $_POST['id'];
		$data['nickname'] = $_SESSION['nickname'];
		$data['time'] = time();
		$m->data($data)->add();
		$d = M('dynamic');
		$d->where("id = {$_POST['id']}")->setInc('collect'); 
		$num = $d->where("id = {$_POST['id']}")->field('collect')->find();
		echo $num['collect'];
	}
	
	//ajax添加评论
	public function InsertDC()
	{
		$_POST['nickname'] = $_SESSION['nickname'];
		$_POST['picture'] = $_SESSION['picture'];
		$_POST['time'] = time();
		$m = M('dynamic_comment');
		$m->create();
		$res = $m->add();
		$data['text'] = $this->At($_POST['text']);
		$m->where("id = {$res}")->save($data);
		$mm = M('dynamic_comment');
		$info = $mm->where("id = {$res}")->find();
		$info['time'] = date('Y-m-d H:i:s',$info['time']);
		$d = M('dynamic');
		$num = $d->where("id = {$_POST['did']}")->setInc('comment'); 
		echo json_encode($info);
	}
	
	//ajax删除评论
	public function delDynamicComment()
	{
		$m = M('dynamic_comment');
		$res = $m->where("id = {$_POST['cid']}")->delete();
		$d = M('dynamic');
		$num = $d->where("id = {$_POST['did']}")->setDec('comment'); 
		echo $res;
	}
	
	//评论点赞时增加
	public function AjaxCEAdd()
	{
		$m = M('comment_endorse');
		$data['dcid'] = $_POST['id'];
		$data['nickname'] = $_SESSION['nickname'];
		$data['time'] = time();
		$m->data($data)->add();
		$d = M('dynamic_comment');
		$d->where("id = {$_POST['id']}")->setInc('endorse'); 
		$num = $d->where("id = {$_POST['id']}")->field('endorse')->find();
		echo $num['endorse'];
	}
	
	//评论取消点赞时减少
	public function AjaxCECancel()
	{
		$m = M('comment_endorse');
		$res = $m->where("dcid = {$_POST['id']} and nickname = '{$_SESSION['nickname']}'")->delete();
		$d = M('dynamic_comment');
		$d->where("id = {$_POST['id']}")->setDec('endorse'); 
		$num = $d->where("id = {$_POST['id']}")->field('endorse')->find();
		echo $num['endorse'];
	}
}
?>