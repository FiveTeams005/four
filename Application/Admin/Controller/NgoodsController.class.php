<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class NgoodsController extends BaseController {
	/**
	 * 登录用户对应的权限菜单
	 */
	public function ngoods(){
		$goods = M('ngoods');
		$res = $goods->select();
		$this->assign('goods',$res);
		$this->display();
	}
}