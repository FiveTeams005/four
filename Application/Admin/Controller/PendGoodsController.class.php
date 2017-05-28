<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class PendGoodsController extends BaseController {
	/*
	* 审核商品；
	*/
	//普通审核商品；
	public function nPendGoods(){
		$this->display();
	}
	//普通审核商品 详情；
	public function nPendDetail(){
		$this->display();
	}
	//拍卖商品审核；
	public function pPendGoods(){
		$this->display();
	}
	//拍卖商品审核 详情；
	public function pPendDetail(){
		$this->display();
	}
}
?>