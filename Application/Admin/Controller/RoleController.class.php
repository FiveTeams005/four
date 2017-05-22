<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends Controller {
	/**
	 * 角色列表
	 */
	public function roleList(){
		$db = M('role');
		$res = $db->select();
		$this->assign('role',$res);
		$this->display('Role/roleList');
	}

	/**
	 * 添加角色
	 * @return boolen
	 */
	public function addRole(){
		if(IS_POST){
			$db = M('role');
			$data['r_name'] = $_POST['name'];
			$data['r_authority'] = $_POST['authority'];
			$data['r_decribe'] = $_POST['decribe'];
			$res = $db->add($data);
			echo $res;
		}
		else{
			$this->display('Role/roleAdd');
		}
	}

	/**
	 * 权限管理
	 * @return Array
	 */
	public function authority(){
		$db2 = M('menu');
		$res2 = $db2->select();
		if(isset($_POST['roleId'])){
			$roleId = $_POST['roleId'];
			$db = M('role');
			$where = " r_id = {$roleId}";
			$res = $db->field("r_authority")->where($where)->select();
			$res = explode(',', $res[0]['r_authority']);
			$result = array($res,$res2);
			echo json_encode($result);
		}
		else{
			echo json_encode($res2);
		}
	}

	/**
	 * 修改权限
	 * @return boolen
	 */
	public function updateAuthority(){
		$authority = $_POST['authority'];
		$r_id = $_POST['id'];
		$db = M('role');
		$data['r_authority'] = $authority;
		$res = $db->data($data)->where("r_id = {$r_id}")->save();
		echo $res;
	}

	/**
	 * 修改角色信息
	 */
	public function updateRole(){
		if(IS_POST){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$decribe = $_POST['decribe'];
			$db = M('role');
			$where = "r_id = {$id}";
			$data['r_name'] = $name;
			$data['r_decribe'] = $decribe;
			$res = $db->data($data)->where($where)->save();
			echo $res;
		}
		else{
			$id = $_GET['id'];
			$db = M('role');
			$where = "r_id = {$id}";
			$res = $db->where($where)->select();
			$this->assign('role',$res);
			$this->display("Role/roleUpdate");
		}
	}
}