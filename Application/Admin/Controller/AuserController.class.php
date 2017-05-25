<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class AuserController extends BaseController {
	/**
	 * 前台用户列表
	 */
	public function auser(){
		$where = "";
		if(isset($_GET['userStatus']) && $_GET['userStatus'] != ""){
			$where['a_status'] = array('eq',$_GET['userStatus']);
		}
		if(isset($_GET['userRole']) && $_GET['userRole'] != ""){
			$where['f_role.r_id'] = array('eq',$_GET['userRole']);
		}
		if(isset($_GET['selectInp'])){
			$where['_string'] = "(a_account like '%{$_GET['selectInp']}%') OR (a_nick like '%{$_GET['selectInp']}%')";
		}
		$auser = M('auser'); // 实例化auser对象
		$list = $auser->join("f_role on f_auser.r_id = f_role.r_id")->page((isset($_GET['p'])?$_GET['p']:1).',5')->where($where)->select();
		$this->assign('data',$list);// 赋值数据集
		$count      = $auser->join("f_role on f_auser.r_id = f_role.r_id")->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$role = M('role');
		$res2 = $role->select();
		$this->assign('role',$res2);

		$this->display();
	}

	/**
	 * 删除用户
	 * @return string
	 */
	public function auserDel(){
		$a_id = $_POST['a_id'];
		$auserid = $_COOKIE['auserid'];
		$auser = M('auser');
		$checkRes = $auser->where("a_id in({$a_id})")->select();
		$auserRes = $auser->where("a_id = {$auserid}")->select();
		for($i = 0;$i < count($checkRes);$i++){
			if($checkRes[$i]['r_id'] == 1 || $checkRes[$i]['r_id'] == $auserRes[0]['r_id']){
				echo "对不起，您的权限不够！";
				exit();
			}
		}
		$delRes = $auser->where("a_id in({$a_id})")->delete();
		if($delRes){
			echo "删除用户成功！";
		}
		else{
			echo "删除用户失败！";
		}
	}

	/**
	 * 解锁/锁定用户
	 * @return string
	 */
	public function auserLock(){
		$a_id = $_POST['a_id'];
		$auserid = $_COOKIE['auserid'];
		$auser = M('auser');
		$checkRes = $auser->where("a_id in({$a_id})")->select();
		$auserRes = $auser->where("a_id = {$auserid}")->select();
		for($i = 0;$i < count($checkRes);$i++){
			if($checkRes[$i]['r_id'] == 1 || $checkRes[$i]['r_id'] == $auserRes[0]['r_id']){
				echo "对不起，您的权限不够！";
				exit();
			}
		}
		$data['a_status'] = $_POST['a_stutas'];
		if($_POST['a_stutas'] == 1){
			$str = "解锁";
		}
		else{
			$str = "锁定";
		}
		$lockRes = $auser->data($data)->where("a_id in({$a_id})")->save();
		if($lockRes){
			echo $str."用户成功！";
		}
		else{
			echo $str."用户失败！";
		}
	}
}
?>