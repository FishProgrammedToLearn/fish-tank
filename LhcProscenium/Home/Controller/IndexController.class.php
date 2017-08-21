<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
		redirect('Home/Login/index',0);
    }
}