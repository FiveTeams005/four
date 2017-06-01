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
		$db = M('chat');
		$h_id = cookie('user');
		$res = $db->query("SELECT * FROM (select * from f_chat where f_h_id='{$h_id}' OR t_h_id='{$h_id}' ORDER BY l_id desc) as a GROUP BY n_id;");
		$db2 = M('huser');
		$db3 = M('ngoods');
		$str = '';
		for($i=0;$i<count($res);$i++){
			if($i==count($res)-1){
				$str = $str.$res[$i]['n_id'];
			}else{
				$str = $str.$res[$i]['n_id'].',';
			}
		}
		$res2 = $db3->where("n_id in({$str})")->select();
		$str2 = '';
		for($i=0;$i<count($res2);$i++){
			if($i==count($res2)-1){
				$str2 = $str2.$res2[$i]['h_id'];
			}else{
				$str2 = $str2.$res2[$i]['h_id'].',';
			}
		}
		$res3 = $db2->where("h_id in({$str2})")->select();
		$ary = array();
		array_push($ary,$res,$res3,$res2,$h_id);
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
		array_push($ary,$res1,$res2,$res3,$res4,$res5);
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
		array_push($ary,$res2,$res3,$res4,$h_id2);
		echo json_encode($ary);
	}
	/**
	 * 注释
	 * 点击发送
	 */
	public function send(){
		$chat = I('chat');
		$ary['l_message'] = $chat;
		$ary['f_h_id'] = cookie('user');
		$ary['t_h_id'] = cookie('otherId');
		$ary['n_id'] = cookie('goodsId');
		$ary['l_status'] = 2;
		$db = M('chat');
		$res = $db->add($ary);
	}
}