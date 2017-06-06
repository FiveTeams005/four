<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class AuserController extends BaseController {
	/**
	 * 前台用户列表
	 */
	public function auser(){
		$where = "";
		if(isset($_GET['userStatus']) && $_GET['userStatus'] != "none"){
			$where['a_status'] = array('eq',$_GET['userStatus']);
		}
		if(isset($_GET['userRole']) && $_GET['userRole'] != "none"){
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
			$name = array();
			for($i = 0;$i < count($checkRes);$i++){
				array_push($name,$checkRes[$i]['a_account']);
			}
			$name = implode("、",$name);
			$log = M('log');
			$data['a_id'] = $auserid;
			$data['manipulation'] = "删除了后台用户:{$name}";
			$logres = $log->data($data)->add();
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
			$log = M('log');
			$data['a_id'] = $auserid;
			$data['manipulation'] = "{$str}了后台用户:{$checkRes[0]['a_account']}";
			$logres = $log->data($data)->add();
			echo $str."用户成功！";
		}
		else{
			echo $str."用户失败！";
		}
	}

	/**
	 * 添加用户
	 * @return json
	 */
	public function add(){
		if(IS_POST){
			$data = array();
			$data['a_account'] = $_POST['account'];
			$data['a_pwd'] = $_POST['pwd'];
			$data['a_nick'] = $_POST['nick'];
			$data['r_id'] = $_POST['roleid'];
			$rules = array(
				array('a_account','require','用户名格式不正确。'),
		        array('a_account','/^[a-zA-z]\w{4,19}$/s','帐号格式不正确',1,'regex'),
		        array('a_account','','帐号已经存在',1,'unique'),
		        array('a_pwd','6,12','密码长度不正确',2,'length'),
			);
			$user = M("auser");
	    	if($user->validate($rules)->create($data)){
	    		$data['a_pwd'] = md5($data['a_pwd']);
	    		$res = $user->add($data);
	    		if($res){
	    			$log = M('log');
					$da['a_id'] = $_COOKIE['auserid'];
					$da['manipulation'] = "添加了后台用户:{$_POST['account']}";
					$logres = $log->data($da)->add();
	    			$this->success('添加成功！');
	    		}
	    		else{
		    		$this->error('添加失败！');
		    	}
	    	}
	    	else{
	    		$this->error($user->getError());
	    	}
		}
		else{
			$role = M('role');
			$res = $role->select();
			$this->assign('role',$res);
			$this->display();
		}
	}

	/**
	 * 修改用户
	 */
	public function update(){
		$auser = M('auser');
		if(IS_POST){
			$aid = $_POST['aid'];
			$accountName = $auser->where("a_id = {$aid}")->getfield('a_account');
			$data['a_nick'] = $_POST['nick'];
			$data['r_id'] = $_POST['rid'];
			$res = $auser->data($data)->where("a_id = {$aid}")->save();
			if($res){
				$log = M('log');
				$da['a_id'] = $_COOKIE['auserid'];
				$da['manipulation'] = "修改了后台用户:{$accountName} 的信息";
				$logres = $log->data($da)->add();
				echo "修改成功！";
			}
			else{
				echo "修改失败！";
			}
		}
		else{
			$role = M('role');
			$res = $role->select();
			$this->assign('role',$res);

			$auserRes = $auser->where("a_id = {$_GET['aid']}")->select();
			$this->assign('user',$auserRes);

			$this->display();
		}
	}

	/**
	 * 重置密码
	 */
	public function auserReset(){
		$aid = $_POST['aid'];
		$auser = M('auser');
		$accountName = $auser->where("a_id = {$aid}")->getfield('a_account');
		$data['a_pwd'] = md5('123456');
		$res = $auser->data($data)->where("a_id = {$aid}")->save();
		if($res){
			$log = M('log');
			$da['a_id'] = $_COOKIE['auserid'];
			$da['manipulation'] = "重置了后台用户:{$accountName} 的登录密码";
			$logres = $log->data($da)->add();
			echo "重置密码成功！";
		}
		else{
			echo "重置密码失败！";
		}
	}
}
?>