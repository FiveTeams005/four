<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	public function chat(){
		$this->display();
	}
	/**
	 * 注释
	 * 获取消息表的数据
	 */
	public function show(){
		$db = M('msglist');
		$h_id = cookie('user');
		$res = $db->where("h_id1 = '{$h_id}' OR h_id2 = '{$h_id}'")->select();
		$db2 = M('huser');
		$res2 = $db2->select();
		$db3 = M('chat');
		$res3 = $db3->select();
		$ary = array();
		array_push($ary,$res,$res2,$h_id,$res3);
		echo json_encode($ary);
	}

	/**
	 * 注释
	 * 点击跳转聊天页面
	 */
	public function getInfo(){
		$n_id = I('goodsId');
		$h_id = I('otherId');
		cookie('goodsId',$n_id);
		cookie('otherId',$h_id);
	}

	/**
	 * 注释
	 * 加载聊天页面的方法
	 */
	public function chatDes(){
		$n_id = cookie('goodsId');
		$h_id = cookie('otherId');
		$h_id2 = cookie('user');
		$db1 = M('huser');
		$db2 = M('ngoods');
		$db3 = M('chat');
		$db4 = M('images');
		$res1 = $db2->where("n_id = '{$n_id}'")->select();
		$res2 = $db1->where("h_id = '{$h_id}'")->select();//对方用户
		$res3 = $db1->where("h_id = '{$h_id2}'")->select();//自己
		$res4 = $db3->where("n_id = '{$n_id}' AND ((f_h_id = '{$h_id}' AND t_h_id = '{$h_id2}') OR (f_h_id = '{$h_id2}' AND t_h_id = '{$h_id}'))")->select();
		$res5 = $db4->where("n_id = '{$n_id}'")->select();
		$ary = array();
		array_push($ary,$res1,$res2,$res3,$res4,$res5,$h_id2);
		echo json_encode($ary);
	}
	/**
	 * 注释
	 * 加载聊天记录
	 */
	public function ChatLog(){
		$n_id = cookie('goodsId');
		$h_id = cookie('otherId');
		$h_id2 = cookie('user');
		$db1 = M('huser');
		$db3 = M('chat');
		$res4 = $db3->where("n_id = '{$n_id}' AND ((f_h_id = '{$h_id}' AND t_h_id = '{$h_id2}') OR (f_h_id = '{$h_id2}' AND t_h_id = '{$h_id}'))")->select();
		$res2 = $db1->where("h_id = '{$h_id}'")->select();//对方用户
		$res3 = $db1->where("h_id = '{$h_id2}'")->select();//自己
		$ary = array();
		$ary2 = array();
		for($i=0;$i<count($res4);$i++){
			$a = $res4[$i]['l_message'];
			$b = htmlspecialchars_decode($a);
			$arr = array('f_h_id'=>$res4[$i]['f_h_id'],'l_message'=>$b);
			array_push($ary2,$arr);
		}
		array_push($ary,$res2,$res3,$ary2,$h_id2);
		echo json_encode($ary);
	}
	/**
	 * 注释
	 * 点击发送
	 */
	public function send(){
		$chat = I('chat','',NULL);
		$ary['l_message'] = $chat;
		$ary['f_h_id'] = cookie('user');
		$ary['t_h_id'] = cookie('otherId');
		$ary['n_id'] = cookie('goodsId');
		$ary['l_status'] = 2;
		$db = M('chat');
		$res = $db->add($ary);


		// 指明给谁推送，为空表示向所有在线用户推送
		$to_uid = cookie('otherId');
		// 推送的url地址，使用自己的服务器地址
		$push_api_url = "http://eh.liuzhi66.top:2121/";
		$post_data = array(
			"type" => "publish",
			"content" => '11',
			"to" => $to_uid,
		);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
		curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
		$return = curl_exec ( $ch );
		curl_close ( $ch );
		echo $return;
	}

	/**
	 * 注释
	 * 点击我想要，跳转到聊天交流页面，判断是否生成消息列表
	 */
	public function msglist(){
		$n_id = I('goodsId');
		cookie('goodsId',$n_id);
		$h_id = cookie('user');
		$db1 = M('ngoods');
		$db2 = M('msglist');
		$res2 = $db2->select();
		$res = $db1->where("n_id = '{$n_id}'")->select();
		cookie('otherId',$res[0]['h_id']);
		if($res[0]['h_id'] == $h_id){
			echo 1;
		}else{
			$flag = 0;
			for($i=0;$i<count($res2);$i++){
				if($res2[$i]['h_id1']==$h_id&&$res2[$i]['h_id2']==$res[0]['h_id']&&$res2[$i]['n_id']==$n_id){
					$flag=1;
					break;
				}
			}
			if($flag==0){
				$ary['h_id1']=$h_id;
				$ary['h_id2']=$res[0]['h_id'];
				$ary['n_id']=$n_id;
				$db2->add($ary);
			}
			echo 2;
		}
	}

	//判断是否在线
	public function state(){
		$user = I('user');
		$h_id = cookie('otherId');
		$ary = explode(',',$user);
		if(in_array($h_id,$ary)){
			echo 1;
		}else{
			echo 2;
		}
	}
  
	/**
	 * 注释
	 * 获取登录人id 以及商品id；
	 */
	public function getIdGoodsAndUser(){
		$n_id = cookie('goodsId');
		$h_id = cookie('user');
		$this -> ajaxreturn([$n_id,$h_id]);
	}

	public function redirect(){
		$flag = I('flag');//商品类型的标志；
		cookie('goodsFlag',$flag);
		$n_id = cookie('goodsId');
		
		$h_id = cookie('user');
		
		$order = M('order');
		$where = array('n_id'=>$n_id,'h_id'=>$h_id);
		$res = $order -> where($where)->select();
		if(count($res) > 0){
			echo 1;
		}else{
			echo 0;
		}
	}

}