<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
		redirect('Admin/Login/index',0);
    }
	
	public function quit()
	{
		session(null);
		redirect('/Admin/Login/index', 5, '页面跳转中...');
	}
}