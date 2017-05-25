<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class HuserController extends BaseController {
	/**
	 * 前台用户列表
	 */
	public function huser(){
		$where = "";
		if(isset($_GET['userStatus']) && $_GET['userStatus'] != ""){
			$where['h_status'] = array('eq',$_GET['userStatus']);
		}
		if(isset($_GET['selectInp'])){
			$where['_string'] = "(h_account like '%{$_GET['selectInp']}%') OR (h_nick like '%{$_GET['selectInp']}%')";
		}
		$huser = M('huser'); // 实例化auser对象
		$list = $huser->page((isset($_GET['p'])?$_GET['p']:1).',5')->where($where)->select();
		$this->assign('data',$list);// 赋值数据集
		$count = $huser->where($where)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	/**
	 * 锁定/解锁用户
	 * @return string
	 */
	public function huserLock(){
		$h_id = $_POST['h_id'];
		$huser = M('huser');
		$data['h_status'] = $_POST['h_stutas'];
		$lockRes = $huser->data($data)->where("h_id in({$h_id})")->save();
		if($lockRes){
			echo "操作成功！";
		}
		else{
			echo "操作失败！";
		}
	}
}
?>