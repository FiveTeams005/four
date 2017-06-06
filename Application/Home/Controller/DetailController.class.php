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
	 * 
	 */
	public function push(){
		$n_id = I('id');
		$goods_flag = 'n';
		cookie('goodsId',$n_id);
		cookie('goodsFlag',$goods_flag);
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
 	/*
 	*	发送留言信息；
 	*/
 	public function sendMsg(){
 		$msg = I('msg');
 		$goodsId = I('id',0,'intval');
 		$flag = I('goodsFlag');
 		$user = cookie('user');
 		
 		$arr = array();
 		$arr['m_message'] = $msg;
 		$arr['h_id'] = $user;
 		$leaveMsg = M('message');
 		if($flag == 'p'){
 			$arr['p_id'] = $goodsId;
 		}else if($flag == 'n'){
 			$arr['n_id'] = $goodsId;
 		}
		$res = $leaveMsg -> add($arr);
		if($res){
			$this->ajaxreturn(true);
		}else{
			$this->ajaxreturn(false);
		}
 	}
 	/*
 	*	获取留言信息；
 	*/
 	public function getLeaveMsg(){
 		$flag = I('goodsFlag');//商品标志;
 		$goodsId = I('goodsId',0,'intval');

 		$leaveMsg = M('message');
 		if($flag == 'p'){
 			$g_id = 'p_id';
 		}else{
 			$g_id = 'n_id';
 		}
 		$res = $leaveMsg ->field('f_huser.h_id,f_huser.h_head,f_huser.h_nick,f_message.*')->join('left join f_huser on f_huser.h_id=f_message.h_id') -> where("{$g_id} = {$goodsId}") -> select();
 		$this-> ajaxreturn($res);
 	}
 	/*
 	*	获取个人信息；
 	*/
 	public function getSelfInfo(){
 		$user = cookie('user');
 		
 		$huser = M('huser');
 		$res = $huser -> where("h_id = $user") -> select();
 		$this->ajaxreturn($res);
 	}

	/*
	 * 测距方法
	 */
	public function distance(){
		$goodsFlag = cookie('goodsFlag');
		$goodsId = cookie('goodsId');
		$h_id = cookie('user');
		$db = M('huser');
		$db2 = M('ngoods');
		$db3 = M('pgoods');
		$res = $db->where("h_id = '{$h_id}'")->select();
		if($goodsFlag=='n'){
			$res2 = $db2->where("n_id = '{$goodsId}'")->select();
		}else{
			$res2 = $db3->where("p_id = '{$goodsId}'")->select();
		}
		$ary = array($res,$res2);
		echo json_encode($ary);
	}

	//跳转到导航地图
	public function map(){
		$this->display('map');
	}
}
?>