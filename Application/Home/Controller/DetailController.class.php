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
		$userId = cookie('user');
		// $userId = 1;
 		$img = M('images');
 		$goodsRes = '';
 		$imgRes = '';
		$bail = M('bail');//保证金表;
 		if($goods_flag == 'p'){
 			$pgoods = M('pgoods');
 			$goodsRes = $pgoods -> join('left join f_huser on f_pgoods.h_id=f_huser.h_id')->where("p_id = '{$goods_id}'")->select();
 			$imgRes = $img -> where("p_id = '{$goods_id}'")->select();

			$where= array('p_id'=>$goods_id,'h_id'=>$userId,'j_status'=>1);//查询保证金的条件;

			$bailRes = $bail->where($where)->count();//查询保证金的结果,如果有 cookie 存'1',没有就存'0';
			if($bailRes > 0){
				cookie('bailFlag',1);
			}else{
				cookie('bailFlag',0);
			}
 		}elseif($goods_flag == 'n'){
 			$ngoods = M('ngoods');
 			$goodsRes = $ngoods -> join('left join f_huser on f_ngoods.h_id=f_huser.h_id')->where("n_id = '{$goods_id}'")->select();
 			$imgRes = $img -> where("n_id = '{$goods_id}'")->select();
 		}
 		$this->ajaxreturn(array($goods_flag,$goodsRes,$imgRes,$userId));
 	}
	/**
	*获取商品拍卖标志；
	**/
	public function getAuctionFlag(){
		$goodsId = cookie('goodsId');
		$pgoods = M('pgoods');
		$res = $pgoods -> where("p_id = $goodsId") -> select();
		$this -> ajaxreturn($res);
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
	/*
	*获取个人保证金;
	*/
	public function confirm(){
		$bailFlag = cookie('bailFlag');
		$this->ajaxreturn($bailFlag);
	}
	// 存保证金
	public function saveBail(){
		$money = I('money');
		cookie('bailMoney',$money);
	}
	//跳转支付页'
	public function payBail(){
		$this->display();
	}
	//获取余额;
	public function selectMoney(){
		$userId = cookie('user');
		$huser = M('huser');
		$res = $huser->where("h_id = {$userId}")->select();
		$this->ajaxreturn($res[0]['h_money']);
	}
	//获取 存储的 保证金;
	public function getBailMoney(){
		$money = cookie('bailMoney');
		$this -> ajaxreturn($money);
	}
	//输入支付密码后，保证金;
	public function payBailMoney(){
		$money = cookie('bailMoney');
		$userId = cookie('user');
		$goodsId = cookie('goodsId');
		$bail = M('bail');
		$where = array('p_id'=>$goodsId,'h_id'=>$userId,'j_status'=>1);//先查询有没有,没有在存入;
		$res1 = $bail -> where($where)->select();
		if(count($res1) == 0){
			$data = array('p_id'=>$goodsId,'h_id'=>$userId,'j_status'=>1,'j_money'=>$money);
			$res2 = $bail->add($data);//存入成功之后再扣钱;
			if($res2 > 0){
				$huser = M('huser');
				$res3 = $huser->where("h_id = {$userId}")->select();
				$balance = $res3[0]['h_money'] - $money;
				$res = $huser->where("h_id = {$userId}")->save(array('h_money'=> $balance));//计算 金额 后再存入数据库;
				if($res){
					cookie('bailFlag',1);
					$this->ajaxreturn($res);
				}
			}
		}
	}
	//拍卖加价；
	public function addPrice(){
		$step = I('step');
		$goodsId = cookie('goodsId');
		$user = cookie('user');
		$pgoods = M('pgoods');
		$res = $pgoods->where("p_id = $goodsId")->select();//要拍卖的商品；
		$addPrice = $res[0]['p_eprice'] + $step;
		$res = $pgoods->where("p_id = $goodsId")->save(array('p_eprice'=>$addPrice,'p_hid'=>$user));
		if($res){
			$this -> ajaxreturn($addPrice);
		}
	}
	public function zanInfo(){
		$db=M('praise');
		$h_id=cookie('user');
        $goodsId =cookie('goodsId');
        $goodsFlag = cookie('goodsFlag');
        if($goodsFlag=="n"){
            $where = array('n_id'=>$goodsId,'h_id'=>$h_id);
            $res = $db->where($where)->find();
            if($res){
            	echo 1;
			}
			else{
            	echo 0;
			}
		}
		else if($goodsFlag=="p"){
            $where = array('p_id'=>$goodsId,'h_id'=>$h_id);
            $res = $db->where($where)->find();
            if($res){
            	echo 1;
			}
			else{
            	echo 0;
			}
		}
	}
	public function  zan(){
        $db=M('praise');
        $h_id=cookie('user');
        $goodsId =cookie('goodsId');
        $goodsFlag = cookie('goodsFlag');
        if ($goodsFlag=="n"){
            $data = array('h_id' =>$h_id, 'n_id'=>$goodsId);
		}
		else{
			$data = array('h_id' =>$h_id, 'p_id'=>$goodsId);
			}

        $res=$db->data($data)->add();
        echo $res;
	}
	public function delZan(){
        $db=M('praise');
        $h_id=cookie('user');
        $goodsId =cookie('goodsId');
        $goodsFlag = cookie('goodsFlag');
        if ($goodsFlag=="n"){
            $data = array('h_id' =>$h_id, 'n_id'=>$goodsId);
        }
        else{
            $data = array('h_id' =>$h_id, 'p_id'=>$goodsId);
        }
        $res=$db->where($data)->delete();
        echo $res;
	}
}


?>
