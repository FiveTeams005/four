<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 登录用户对应的权限菜单
	 * 
	 */
	public function index(){
		$db = M('menu');
		$res1 = $db->where( 'b_pid = 0')->select();
		$res2 = $db->where( 'b_pid != 0')->select();
		$this->assign('menu1',$res1);
		$this->assign('menu2',$res2);
		$this->display();
	}
}