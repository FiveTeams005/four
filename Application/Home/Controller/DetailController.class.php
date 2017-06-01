<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	public function detail(){
		cookie('detailID',I('id'));
		$this->display();
	}
	/*
 	* 获取商品id显示商品
 	*/
	public function show(){
		echo cookie('detailID');
	}
	/*
 	* 存储商品相关性信息；
 	*/
 	public function saveInfo(){
 		$goods_flag = I('goods_flag');//商品标志（‘n’普通，‘p’拍卖);
 		$goods_id =  I('goods_id',0,'intval');
 		cookie('goodsId',$goods_id);
 		cookie('goodsFlag',$goods_flag);
 		$goodsId =cookie('goodsId');
 		$goodsFlag = cookie('goodsFlag');

 		if($goodsId !=0 && !empty($goodsFlag)){
 			echo true;
 		}else{
 			echo false;
 		}

 	}
 	/*
 	*获取商品信息；
 	*/
 	public function getInfo(){
 		$goods_id =cookie('goodsId');
 		$goods_flag = cookie('goodsFlag');
 		$img = M('images');
 		$goodsRes = '';
 		$imgRes = '';
 		if($goods_flag == 'p'){
 			$pgoods = M('pgoods');
 			$goodsRes = $pgoods -> join('left join f_huser on f_pgoods.h_id=f_huser.h_id')->where("p_id = '{$goods_id}'")->select();
 			$imgRes = $img -> where("p_id = '{$goods_id}'")->select();
 		}elseif($goods_flag == 'n'){
 			$ngoods = M('ngoods');
 			$goodsRes = $ngoods -> join('left join f_huser on f_ngoods.h_id=f_huser.h_id')->where("n_id = '{$goods_id}'")->select();
 			$imgRes = $img -> where("n_id = '{$goods_id}'")->select();
 		}
 		$this->ajaxreturn(array($goods_flag,$goodsRes,$imgRes));
 	}

}
?>