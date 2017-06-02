<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class RoleController extends BaseController {
	/**
	 * 角色列表
	 */
	public function roleList(){
		$db = M('role'); // 实例化role对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$list = $db->page((isset($_GET['p'])?$_GET['p']:1).',5')->select();
		$this->assign('role',$list);// 赋值数据集
		$count      = $db->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->display('Role/roleList'); // 输出模板
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
			if($res){
				$log = M('log');
				$da['a_id'] = $_COOKIE['auserid'];
				$da['manipulation'] = "添加了新角色:{$_POST['name']}";
				$logres = $log->data($da)->add();
			}
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
		if($res){
			$roleName = $db->where("r_id = {$r_id}")->getfield("r_name");
			$log = M('log');
			$da['a_id'] = $_COOKIE['auserid'];
			$da['manipulation'] = "修改了角色:{$roleName} 的权限";
			$logres = $log->data($da)->add();
		}
		echo $res;
	}

	/**
	 * 修改角色信息
	 * @return boolen
	 */
	public function updateRole(){
		if(IS_POST){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$decribe = $_POST['decribe'];
			$db = M('role');

			$roleName = $db->where("r_id = {$id}")->getfield("r_name");

			$where = "r_id = {$id}";
			$data['r_name'] = $name;
			$data['r_decribe'] = $decribe;
			$res = $db->data($data)->where($where)->save();
			if($res){
				$log = M('log');
				$da['a_id'] = $_COOKIE['auserid'];
				$da['manipulation'] = "修改了角色:{$roleName} 的信息";
				$logres = $log->data($da)->add();
			}
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

	/**
	 * 删除角色
	 */
	public function deleteRole(){
		$r_id = $_POST['r_id'];
		if($r_id == 1){
			echo "超级管理员角色不能删除！";
		}
		else{
			$user = M('auser');
			$res = $user->where("r_id = {$r_id}")->select();
			if($res){
				echo "此角色存在用户，无法删除！";
			}
			else{
				$role = M('role');

				$roleName = $role->where("r_id = {$r_id}")->getfield("r_name");

				$result = $role->where("r_id = {$r_id}")->delete();
				if($result){
					$log = M('log');
					$da['a_id'] = $_COOKIE['auserid'];
					$da['manipulation'] = "删除了角色:{$roleName}";
					$logres = $log->data($da)->add();
					echo "删除角色成功！";
				}
				else{
					echo "删除角色失败！";
				}
			}
		}
		
	}
}