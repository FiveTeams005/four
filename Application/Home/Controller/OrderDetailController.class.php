<?php
namespace Home\Controller;
use Think\Controller;
class OrderDetailController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	public function orderDetail(){
		$this->display();
	}
	/*
	*	进入页面获取信息；
	*/
	public function getInfo(){
		$goods_id = cookie('goodsId');
		$goods_id = 24;
		$h_id = cookie('user');
		$h_id = 1;
		$goodsFlag = cookie('goodsFlag');//商品类别标志；
		$order = M('order');
		$images = M('images');
		$res1 = array();
		if($goodsFlag == 'n'){
			$res1= $order ->field('f_order.*,n.n_name,n.h_id,h.h_nick,a.*')->join("LEFT JOIN f_address AS a ON a.d_id=f_order.d_id left join f_ngoods as n on n.n_id=f_order.n_id left join f_huser as h on h.h_id=n.h_id")->where("f_order.n_id={$goods_id} and f_order.h_id={$h_id}")->select();
			$res2 = $images->where("n_id = $goods_id")->select();
		}else if ($goodsFlag == 'p') {
			$res1= $order ->field('f_order.*,p.p_name,p.h_id,h.h_nick,a.*')->join("LEFT JOIN f_address AS a ON a.d_id=f_order.d_id left join f_pgoods as p on p.p_id=f_order.p_id left join f_huser as h on h.h_id=p.h_id")->where("f_order.p_id={$goods_id} and f_order.h_id={$h_id}")->select();
			$res2 = $images->where("p_id = $goods_id")->select();
		}
		
		$this->ajaxreturn(array($res1,$res2,$goodsFlag));
	}

	public function saveOrderId(){
		$orderId = I('orderId',0,'intval');
		cookie('orderId',$orderId);

		if(cookie('orderId') != 0){
			echo 1;
		}else{
			echo 0;
		}
	}
}
?>