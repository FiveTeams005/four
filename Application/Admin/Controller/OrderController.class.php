<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class OrderController extends BaseController {
	/**
	 * 订单列表
	 */
	public function order(){
		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name");
		$this->assign('classify',$cRes);

		$ngoods = M('ngoods');
		$n_name = $ngoods->getfield('n_id,n_name');
		$n_cid = $ngoods->getfield('n_id,c_id');
		$this->assign('n_cid',$n_cid);
		$this->assign('n_name',$n_name);

		$pgoods = M('pgoods');
		$p_name = $pgoods->getfield('p_id,p_name');
		$p_cid = $pgoods->getfield('p_id,c_id');
		$this->assign('p_cid',$p_cid);
		$this->assign('p_name',$p_name);

		$this->assign('status',C('ORDER_STATUS'));

		$where = "";
		if(isset($_GET['orderStatus']) && $_GET['orderStatus'] != "none"){
			$where['o_status'] = array('eq',$_GET['orderStatus']);
		}
		if(isset($_GET['orderType']) && $_GET['orderType'] != ""){
			$where[$_GET['orderType']] = 1;
		}
		if(isset($_GET['selectInp'])){
			$where['_string'] = "o_number like '%{$_GET['selectInp']}%'";
		}

		$order = M('order');

		if($_GET['payTime'] == 'asc'){
			$res = $order->where($where)->page((isset($_GET['p'])?$_GET['p']:1).',6')->order('o_ptime asc')->select();
		}
		else{
			$res = $order->where($where)->page((isset($_GET['p'])?$_GET['p']:1).',6')->order('o_ptime desc')->select();
		}

		$this->assign('order',$res);
		$count = $order->where($where)->count();
		$Page = new \Think\Page($count,6);
		$show = $Page->show();
		$this->assign('page',$show);

		$this->display();
	}
	/**
	 * 订单详情
	 */
	public function orderDetail(){
		$o_id = $_GET['id'];
		$order = M('order');
		$res = $order->where("o_id = {$o_id}")->select();
		$this->assign("order",$res);
		$this->assign('status',C('ORDER_STATUS'));

		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name","");
		$this->assign('classify',$cRes);

		$img = M('images');
		if($res[0]['n_id'] != 0){
			$goods = M('ngoods');
			$goodsRes = $goods->where("n_id = {$res[0]['n_id']}")->select();
			$this->assign('goods',$goodsRes);
			$imgRes = $img->field('n_img')->where("n_id = {$res[0]['n_id']}")->select();
			$this->assign('img',$imgRes);
		}
		else{
			$goods = M('pgoods');
			$goodsRes = $goods->where("p_id = {$res[0]['p_id']}")->select();
			$this->assign('goods',$goodsRes);
			$imgRes = $img->field('n_img')->where("p_id = {$res[0]['p_id']}")->select();
			$this->assign('img',$imgRes);
		}

		$huser = M('huser');
		$huserRes = $huser->where("h_id = {$res[0]['h_id']}")->getfield('h_nick');
		$this->assign('huser',$huserRes);

		$add = M('address');
		$addRes = $add->where("d_id = {$res[0]['d_id']}")->select();
		$this->assign('address',$addRes);

		$this->display();
	}

	/**
	 * 删除订单
	 * @return string
	 */
	public function orderDel(){
		$o_id = $_POST['o_id'];
		$order = M('order');

		// 日志
		$orderRes = $order->where("o_id in({$o_id})")->select();
		$name = array();
		for($i = 0;$i < count($orderRes);$i++){
			array_push($name,$orderRes[$i]['o_number']);
		}
		$name = implode("、",$name);

		$delRes = $order->where("o_id in({$o_id})")->delete();
		if($delRes){
			$log = M('log');
			$data['a_id'] = $_COOKIE['auserid'];
			$data['manipulation'] = "删除了订单:{$name}";
			$logres = $log->data($data)->add();
			echo "删除订单成功！";
		}
		else{
			echo "删除订单失败！";
		}
	}
}

?>