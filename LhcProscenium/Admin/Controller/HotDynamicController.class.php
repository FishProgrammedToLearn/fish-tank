<?php
namespace Admin\Controller;
use Think\Controller;

class HotDynamicController extends Controller{
	
	public function add()
	{
		$m = M('dynamic');
		$info = $m->order('endorse')->select();
		$n = M('dynamic_comment');
		for($i = 0; $i < count($info); $i++)
		{
			$comment[] = $n->where("did='{$info[$i]['id']}'")->select();
		}

		$this->assign('num','1');
		$this->assign('cnum','0');
		$this->assign('info',$info);
		$this->assign('comment',$comment);
		$this->display('dynamic');
	}
	
	public function browse()
	{
		$m = M('dynamic');
		$info = $m->where("hot = 1")->select();
		$n = M('dynamic_comment');
		for($i = 0; $i < count($info); $i++)
		{
			$comment[] = $n->where("did='{$info[$i]['id']}'")->select();
		}

		$this->assign('num','1');
		$this->assign('cnum','0');
		$this->assign('info',$info);
		$this->assign('comment',$comment);
		$this->display('dynamic');
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
		$d = M('dynamic');
		$num = $d->where("id = {$_GET['id']}")->setDec('comment'); 
		if($res)
			$this->success("评论删除成功");
		else
			$this->error("评论删除失败");
	}
	
	//遍历热门动态
	public function Hot()
	{
		$m = M('dynamic');
		$info = $m->join('second_hotdynamic_id ON second_dynamic.id = second_hotdynamic_id.did')->select();
		$n = M('dynamic_comment');
		for($i = 0; $i < count($info); $i++)
		{
			$comment[] = $n->where("did='{$info[$i]['did']}'")->select();
		}
		
		$this->assign('num','1');
		$this->assign('cnum','0');
		$this->assign('info',$info);
		$this->assign('comment',$comment);
		$this->display('dynamic');
	}
	
	public function remove()
	{
		$m = M('hotdynamic_id');
		$m->where("did = {$_GET['id']}")->delete();
		$d = M("dynamic");
		$data['hot'] = '0';
		$d->where("id = {$_GET['id']}")->save($data);
		$this->success("移除成功");
	}
	
	public function insert()
	{
		$m = M('hotdynamic_id');
		$m->create($_GET);
		$m->add();
		$d = M("dynamic");
		$data['hot'] = '1';
		$d->where("id = {$_GET['id']}")->save($data);
		$this->success("添加成功");
	}
}
?>