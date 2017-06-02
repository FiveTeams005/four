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

	/**
	 * 注销
	 */
	public function logout(){
		cookie('auserid',null);
		$this->display('Login/login');
	}

	/**
	 * 首页
	 */
	public function main(){
		$huser = M('huser');
		$huserAll = $huser->count();
		$huserOne = $huser->where("h_grade < 4")->count();
		$huserTwo = $huser->where("h_grade between 4 and 6")->count();
		$huserThr = $huser->where("h_grade between 7 and 9")->count();
		$huserFour = $huser->where("h_grade > 9")->count();
		$huserAllLock = $huser->where("h_status = 0")->count();
		$huserOneLock = $huser->where("h_grade < 4 and h_status = 0")->count();
		$huserTwoLock = $huser->where("(h_grade between 4 and 6) and h_status = 0")->count();
		$huserThrLock = $huser->where("(h_grade between 7 and 9) and h_status = 0")->count();
		$huserFourLock = $huser->where("h_grade > 9 and h_status = 0")->count();
		$regCount = $huser->where("date(h_regtime) = curdate()")->count();
		$regScale = (round($regCount/$huserAll,4)*100).'%';
		$this->assign('huserAll',$huserAll);
		$this->assign('huserOne',$huserOne);
		$this->assign('huserTwo',$huserTwo);
		$this->assign('huserThr',$huserThr);
		$this->assign('huserFour',$huserFour);
		$this->assign('huserAllLock',$huserAllLock);
		$this->assign('huserOneLock',$huserOneLock);
		$this->assign('huserTwoLock',$huserTwoLock);
		$this->assign('huserThrLock',$huserThrLock);
		$this->assign('huserFourLock',$huserFourLock);
		$this->assign('regCount',$regCount);
		$this->assign('regScale',$regScale);

		$ngoods = M('ngoods');
		$pgoods = M('pgoods');
		$ngoodsCount = $ngoods->count();
		$pgoodsCount = $pgoods->count();
		$ngoodsOnsole = $ngoods->where("n_status = 1")->count();
		$pgoodsOnsole = $pgoods->where("p_status = 1 or p_status = 0")->count();
		$newNgoods = $ngoods->where("date(n_time) = curdate()")->count();
		$newPgoods = $pgoods->where("date(p_time) = curdate()")->count();
		$goodsScale = (round(($newNgoods+$newPgoods)/($ngoodsCount+$pgoodsCount),4)*100).'%';
		$this->assign('ngoodsCount',$ngoodsCount);
		$this->assign('pgoodsCount',$pgoodsCount);
		$this->assign('ngoodsOnsole',$ngoodsOnsole);
		$this->assign('pgoodsOnsole',$pgoodsOnsole);
		$this->assign('newNgoods',$newNgoods);
		$this->assign('newPgoods',$newPgoods);
		$this->assign('goodsScale',$goodsScale);

		$order = M('order');
		$orderNow = $order->where("date(o_rtime) = curdate() and o_status = 5")->count();
		$orderAll = $order->where("o_status = 5")->count();
		$this->assign('orderNow',$orderNow);
		$this->assign('orderAll',$orderAll);

		$this->display("Main/main");
	}
}