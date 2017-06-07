<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    /**
     * 加载登录页面
     */
    public function login(){
    	if(IS_AJAX){
    		if(!check_verify($_POST['code'],1)){
			    echo "验证码错误！";  
			}
			else{
				$db = M('auser');
				$where['a_account'] = $_POST['username'];
				$where['a_pwd'] = md5($_POST['pwd']);
				$res = $db->where($where)->select();
				if($res){
					if($res[0]['a_status'] == 1){
						cookie("auserid",$res[0]['a_id']);
						$log = M('log');
						$data['a_id'] = $_COOKIE['auserid'];
						$data['manipulation'] = "登录了后台管理系统";
						$logres = $log->data($data)->add();
						echo 1;
					}
					else{
						echo "该用户已被冻结！";
					}
				}
				else{
					echo "用户名或密码错误！";
				}
			}
    	}
    	else{
    		$this->display();
    	}
    }

    /**
     * 验证码
     */
    public function checkCode(){
    	$config =    array(
		    'fontSize'    =>    50,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		);
    	$Verify = new \Think\Verify($config);
		$Verify->entry(1);
    }
}