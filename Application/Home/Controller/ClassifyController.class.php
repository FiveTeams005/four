<?php
namespace Home\Controller;
use Think\Controller;
class ClassifyController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */

	/**
	 * 跳转到分类页面
	 */
	public function classify(){
		$classID = I('classID');
		cookie('classID',$classID);
		$this->display();
	}


	/**
	 * 根据商品分类显示商品
	 */
	public function showGoods(){
		$db = M('ngoods');
		$c_id = cookie('classID');
		$res = $db->where("c_id='{$c_id}'")->select();
		echo json_encode($res);
	}


}