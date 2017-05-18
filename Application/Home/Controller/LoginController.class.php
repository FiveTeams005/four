<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */

	/**
	 * 加载登录页面
	 */
	public function login(){
		$this->display('login');
	}

	/**
	 * 加载注册页面
	 */
	public function reg(){
		$this->display('reg');
	}


}