<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	public function message(){
		$this->display();
	}
	/*
	 * 删除聊天列表
	 */
	public function delList(){
		$otherId = I('otherId');
		$n_id = I('goodsid');
		$h_id = cookie('user');
		$db = M('msglist');
		$res = $db->where("(h_id1 = '{$h_id}' AND h_id2 = '{$otherId}' AND n_id ='{$n_id}') OR (h_id2 = '{$h_id}' AND h_id1 = '{$otherId}' AND n_id ='{$n_id}')")->delete();
		$db2 = M('chat');
		$res2 = $db2->where("(f_h_id = '{$h_id}' AND t_h_id = '{$otherId}' AND n_id ='{$n_id}') OR (t_h_id = '{$h_id}' AND f_h_id = '{$otherId}' AND n_id ='{$n_id}')")->delete();
	}

	/*
	 * 气泡清零
	 */
	public function zero(){
		$h_id = cookie('user');
		$db = M('chat');
		$ary['l_status']=1;
		$res = $db->where("t_h_id = '{$h_id}'")->save($ary);
	}


}