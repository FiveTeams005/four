<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class NgoodsController extends BaseController {
	/**
	 * 登录用户对应的权限菜单
	 */
	public function ngoods(){
		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name","");
		$this->assign('classify',$cRes);

		$huser = M('huser');
		$huserRes = $huser->getfield("h_id,h_account");
		$this->assign('huser',$huserRes);

		$goods = M('ngoods');
		$res = $goods->page((isset($_GET['p'])?$_GET['p']:1).',10')->select();
		$this->assign('goods',$res);
		$this->display();

		// $huser = M('huser'); // 实例化auser对象
		// $list = $huser->page((isset($_GET['p'])?$_GET['p']:1).',5')->where($where)->select();
		// $this->assign('data',$list);// 赋值数据集
		// $count = $huser->where($where)->count();// 查询满足要求的总记录数
		// $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		// $show = $Page->show();// 分页显示输出
		// $this->assign('page',$show);// 赋值分页输出
		// $this->display();
	}

	/**
	 * 登录用户对应的权限菜单
	 */
	public function ngoodsDetail(){
		$this->display();
	}
}