<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class IndexController extends BaseController {
	/**
	 * 登录用户对应的权限菜单
	 */
	public function index(){
		$a_id = cookie('auserid');
		$user = M('auser');
		$res = $user->where("a_id = {$a_id}")->select();
		
		$role = M('role');
		$roleRes = $role->where("r_id = {$res[0]['r_id']}")->select();
		$res[0]["r_name"] = $roleRes[0]['r_name'];
		$this->assign('user',$res);

		$db = M('menu');
		$res1 = $db->where("b_pid = 0 AND b_id in({$roleRes[0]['r_authority']}) AND b_disable = 1")->select();
		$res2 = $db->where("b_pid != 0 AND b_id in({$roleRes[0]['r_authority']}) AND b_disable = 1")->select();
		$this->assign('menu1',$res1);
		$this->assign('menu2',$res2);
		$this->display();
	}
}