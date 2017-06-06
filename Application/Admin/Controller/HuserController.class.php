<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class HuserController extends BaseController {
	/**
	 * 前台用户列表
	 */
	public function huser(){
		$where = "";
		if(isset($_GET['userStatus']) && $_GET['userStatus'] != "none"){
			$where['h_status'] = array('eq',$_GET['userStatus']);
		}
		if(isset($_GET['selectInp'])){
			$where['_string'] = "(h_account like '%{$_GET['selectInp']}%') OR (h_nick like '%{$_GET['selectInp']}%')";
		}
		$huser = M('huser'); // 实例化auser对象
		$list = $huser->page((isset($_GET['p'])?$_GET['p']:1).',5')->where($where)->select();
		$this->assign('data',$list);// 赋值数据集
		$count = $huser->where($where)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	/**
	 * 锁定/解锁用户
	 * @return string
	 */
	public function huserLock(){
		$h_id = $_POST['h_id'];
		$huser = M('huser');
		$data['h_status'] = $_POST['h_stutas'];
		$lockRes = $huser->data($data)->where("h_id in({$h_id})")->save();
		if($lockRes){
			if($_POST['h_stutas'] == 0){
				$str = "锁定";
			}
			elseif($_POST['h_stutas'] == 1){
				$str = "解锁";
			}
			$huserRes = $huser->where("h_id in({$h_id})")->select();
			$name = array();
			for($i = 0;$i < count($huserRes);$i++){
				array_push($name,$huserRes[$i]['h_account']);
			}
			$name = implode("、",$name);
			$log = M('log');
			$da['a_id'] = $_COOKIE['auserid'];
			$da['manipulation'] = "{$str}了前台用户:{$name}";
			$logres = $log->data($da)->add();
			echo "操作成功！";
		}
		else{
			echo "操作失败！";
		}
	}
	/**
	 * 用户详情
	 */
	public function userInfo(){
		$huser = M('huser');
		$res = $huser->where("h_id = {$_GET['hid']}")->select();
		$this->assign("user",$res);

		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name");
		$this->assign('classify',$cRes);

		$order = M('order');

		// 普通商品信息
		if($_GET['tab'] == 2){
			$list = $order->join("join f_pgoods on f_order.p_id = f_pgoods.p_id")->page((isset($_GET['p'])?$_GET['p']:1).',10')->where("f_order.h_id = {$_GET['hid']}")->select();
			$count = $order->join("join f_pgoods on f_order.p_id = f_pgoods.p_id")->where("f_order.h_id = {$_GET['hid']}")->count();
		}
		else if($_GET['tab'] == 3){
			$goods = M('ngoods');
			$list = $goods->page((isset($_GET['p'])?$_GET['p']:1).',10')->where("h_id = {$_GET['hid']}")->select();
			$count = $goods->where("h_id = {$_GET['hid']}")->count();
		}
		else if($_GET['tab'] == 4){
			$goods = M('pgoods');
			$list = $goods->page((isset($_GET['p'])?$_GET['p']:1).',10')->where("h_id = {$_GET['hid']}")->select();
			$count = $goods->where("h_id = {$_GET['hid']}")->count();
		}
		else{
			$list = $order->join("join f_ngoods on f_order.n_id = f_ngoods.n_id")->page((isset($_GET['p'])?$_GET['p']:1).',10')->where("f_order.h_id = {$_GET['hid']}")->select();
			$count = $order->join("join f_ngoods on f_order.n_id = f_ngoods.n_id")->where("f_order.h_id = {$_GET['hid']}")->count();
		}
		$this->assign('order',$list);
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$this->assign('page',$show);

		$this->display();
	}
}
?>