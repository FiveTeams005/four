<?php
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	public function paySuccess(){
	    $this->display();
    }
    public function payFail(){
	    $this->display();
    }
    public function payIndex(){
	$this->display();
	}
	/**
	 * 注释
	 * 购买页面的加载
	 */
	public function show(){
		$db1 = M('huser');
		$db2 = M('ngoods');
		$db3 = M('address');
		$db4 = M('images');
		$db5 = M('pgoods');
		$h_id = cookie('user');
		$goods_id = cookie('goodsId');
		$goodsFlag = cookie('goodsFlag');
		if($goodsFlag == 'n'){
			$res2 = $db2->where("n_id = {$goods_id}")->select();
			$res4 = $db4->where("n_id = {$goods_id}")->select();//图片
		}else if($goodsFlag == 'p'){
			$res2 = $db5->where("p_id = {$goods_id}")->select();
			$res4 = $db4->where("p_id = {$goods_id}")->select();//图片
		}
		$res1 = $db1->where("h_id = {$h_id}")->select();
		
		$res3 = $db3->where("h_id = {$h_id}")->select();
		
		$ary = array($res1,$res2,$res3,$res4,$goodsFlag);
		echo json_encode($ary);
	}

	//点击立即支付，存地址
	public function depAdd(){
		$add = I('add');
		$price = I('price');
		cookie('price',$price);
		cookie('add',$add);
	}

	//输入支付密码后，存入订单
	public function buy(){
		$add = cookie('add');
		$db = M('ngoods');
		$n_id = cookie('goodsId');
		$res = $db->where("n_id = '{$n_id}'")->select();
		$price = $res[0]['n_price'];
		$h_id_m = $res[0]['h_id'];
		$db2 = M('order');
		$ary = array();
		$ary['n_id'] =$n_id;
		$ary['p_id'] =0;
		$ary['h_id'] =cookie('user');
		$ary['o_money'] =$price;
		$ary['o_status'] =2;
		$ary['h_id_m'] =$h_id_m;
		$ary['o_add'] =$add;
		$order = date('Ymdhis',time()).rand(1000,9999);
		$ary['o_number'] =$order;
		$res = $db2->add($ary);
	}
	//付款页面加载金额
	public function price(){
		$price = cookie('price');
		echo $price;
	}
}