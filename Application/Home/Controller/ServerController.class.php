<?php
namespace Home\Controller;
use Think\Controller;
class ServerController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */

	/*
	 *进入客服页面
	 */
	public function server(){
		$h_id = cookie('user');
		$db = M('service');
		$ary['falg'] = 1;
		$res = $db->where("h_id='{$h_id}' AND status=2")->save($ary);
	    $this->display();
    }

	/*
	 * 获取聊天记录
	 */
	public function ChatContent(){
		$h_id = cookie('user');
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
			$arr = array('h_id'=>$res[$i]['h_id'],'msg'=>$b,'time'=>$c,'sta'=>$d);
			array_push($ary2,$arr);
		}
		$ary = array();
		array_push($ary,$ary2,$res2);
		echo json_encode($ary);
		$ary2['falg'] = 1;
		$res3 = $db->where("h_id='{$h_id}' AND status=2")->save($ary2);
	}

	/*
	 * 点击发送事件
	 */
	public function send(){
		$h_id = cookie('user');
		$msg = I('msg');
		$db = M('service');
		$ary = array();
		$ary['time'] = date("Y-m-d H:i:s",time());
		$ary['msg'] = $msg;
		$ary['h_id'] = $h_id;
		$ary['falg'] = 2;
		$ary['status'] = 1;
		$res = $db->add($ary);

		// 指明给谁推送，为空表示向所有在线用户推送
		// 推送的url地址，使用自己的服务器地址
		$push_api_url = "http://eh.liuzhi66.top:2121/";
		$post_data = array(
			"type" => "publish",
			"content" => $h_id,
			"to" => 888,
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
?>