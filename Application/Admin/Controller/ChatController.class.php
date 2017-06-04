<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class ChatController extends BaseController {
	/**
	 * 客服页面
	 */
	public function chat(){
		$this->display();
	}

	/**
	 * 在线客户列表
	 */
	public function userList(){
		$user = I('user');
		$db = M('huser');
		$res = $db->where("h_id in({$user})")->select();
		$db2 = M('service');
		$res2 = $db2->where("h_id in({$user}) AND falg=2 ")->select();
		$ary = array();
		array_push($ary,$res,$res2);
		echo json_encode($ary);
		cookie('userList',$user);
	}

	/**
	 * 在线客户列表2
	 */
	public function userList2(){
		$user = cookie('userList');
		$db = M('huser');
		$res = $db->where("h_id in({$user})")->select();
		$db2 = M('service');
		$res2 = $db2->where("h_id in({$user}) AND falg=2 ")->select();
		$ary = array();
		array_push($ary,$res,$res2);
		echo json_encode($ary);
	}
	
	/*
	 * 获取聊天记录
	 */
	public function ChatContent(){
		$h_id = I('h_id');
		$db = M('service');
		$db2 = M('huser');
		$res = $db->where("h_id = '{$h_id}'")->select();
		$res2 = $db2->where("h_id = '{$h_id}'")->select();
		$ary2 = array();
		for($i=0;$i<count($res);$i++){
			$a = $res[$i]['msg'];
			$b = htmlspecialchars_decode($a);
			$c = $res[$i]['time'];
			$d = $res[$i]['status'];
			$arr = array('h_id'=>$res[$i]['h_id'],'msg'=>$b,'time'=>$c,'status'=>$d);
			array_push($ary2,$arr);
		}
		$ary = array();
		array_push($ary,$ary2,$res2);
		echo json_encode($ary);
		$ary2['falg']=1;
		$res2 = $db->where("h_id = '{$h_id}' AND status=1")->save($ary2);
	}
	//客服点击发送，进行聊天记录储存
	public function send(){
		$h_id = I("h_id");
		$msg = I("msg");
		$db = M('service');
		$ary = array();
		$ary['h_id']=$h_id;
		$ary['msg']=$msg;
		$ary['time']=date("Y-m-d H:i:s",time());
		$ary['status']=2;
		$ary['falg']=2;
		$res = $db->add($ary);

		// 指明给谁推送，为空表示向所有在线用户推送
		// 推送的url地址，使用自己的服务器地址
		$push_api_url = "http://eh.liuzhi66.top:2121/";
		$post_data = array(
			"type" => "publish",
			"content" => '11',
			"to" => $h_id,
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
}