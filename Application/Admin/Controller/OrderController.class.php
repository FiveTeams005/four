<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
	/**
	 * 订单列表
	 */
	public function order(){
		$this->display();
	}
	/**
	 * 订单详情
	 */
	public function orderDetail(){
		$this->display();
	}
}

?>