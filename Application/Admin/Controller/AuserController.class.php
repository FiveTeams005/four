<?php
namespace Admin\Controller;
use Think\Controller;
class AuserController extends Controller {
	/**
	 * 前台用户列表
	 */
	public function auser(){
		$this->display();
	}
	//用户添加修改页面；
	public function update(){
		$this->display();
	}
	
}
?>