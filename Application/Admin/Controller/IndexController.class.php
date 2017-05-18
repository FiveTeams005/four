<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 显示首页
	 */
    public function index(){
        $this->show();
    }
}