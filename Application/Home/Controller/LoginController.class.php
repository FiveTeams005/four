<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */

	/**
	 * 加载登录页面
	 */
	public function login(){
		$this->display('login');
	}

	/**
	 * 加载注册页面
	 */
	public function reg(){
		$this->display('reg');
	}
	/**
	 * 加载注册获取手机验证页面
	 */
	public function getCode(){
		$this->display('regGetCode');
//		var_dump(cookie('openid'));
	}

	/**
	 * 生成验证码函数
	 */
	public function code(){
		$config =    array(
			'fontSize'    => 30,    // 验证码字体大小
			'length'      =>  4,     // 验证码位数
			'useNoise'    =>  false, // 关闭验证码杂点
		);
		$Verify =     new \Think\Verify($config);
		$Verify->codeSet = '0123456789';  //设置验证码纯数字
		$Verify->entry(2);
	}

	/**
	 * 验证码校验
	 */
	public function checkCode(){
		$res = check_verify($_POST['code'],2);
		if($res){
			echo 1;
		}else{
			echo 2;
		}
	}

	/**
	 * 校验用户名密码
	 */
	public function checkUser(){
		$user = $_POST['user'];
		$pwd = md5($_POST['pwd']);
		$db = M('huser');
		$res  = $db->where("h_account = '{$user}' AND h_pwd = '{$pwd}'")->select();
		if($res){
			echo 1;
		}
	}

	/**
	 * 手机获短信取验证码事件
	 */
	public function send(){
		//初始化必填
		$options['accountsid']='8b05dde663b2a81c2a17a6efe2e13270'; //填写自己的
		$options['token']='7b92b7b37b7e31ec507c6545610bbbae'; //填写自己的
		//初始化 $options必填
		$ucpass = new \Org\Ucpaas($options);
		//随机生成6位验证码
		srand((double)microtime()*1000000);//create a random number feed.
		$ychar="0,1,2,3,4,5,6,7,8,9";
		$list=explode(",",$ychar);
		for($i=0;$i<6;$i++){
			$randnum=rand(0,10); // 10+26;
			$authnum.=$list[$randnum];
		}
		//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
		$appId = "a65d146056ae4895ae97e8aae0e8aa39";  //填写自己的
		$to = $_POST['phone'];
		$templateId = "53147";
		$param=$authnum;
		$arr=$ucpass->templateSMS($appId,$to,$templateId,$param);
		if (substr($arr,21,6) == 000000) {
			//如果成功就，这里只是测试样式，可根据自己的需求进行调节
			echo $authnum;
		}else{
			//如果不成功
			echo "短信验证码发送失败，请联系客服";

		}
	}

	/**
	 * 通过手机验证后后存下手机号码
	 */
	public function setPhone(){
		setcookie('phone',I('phone'));
		echo $_COOKIE['phone'];
		$db = M('huser');
		$ary = array();
		$ary['h_tel'] = I('phone');
		$h_id = cookie('user');
		$res = $db->data($ary)->where("h_id = '{$h_id}'")->save();
		if($res){
			cookie('flag',1);
			echo 1;
		}
	}

	/**
	 * 校验账号是否重复
	 */
	public function accUser(){
		$db = M('huser');
		$user = I('account');
		$res = $db->where("h_account = '{$user}'")->select();
		if($res){
			echo 1;
		}
	}

	/**
	 * 校验手机是否重复
	 */
	public function accPhone(){
		$db = M('huser');
		$phone = I('phone');
		$res = $db->where("h_tel = '{$phone}'")->select();
		if($res){
			echo 1;
		}
	}

	/**
	 * 注册账号，添加数据库
	 */
	public function regUser(){
		$db = M('huser');
		$user = I('user');
		$pwd = md5(I('pwd'));
		$phone = $_COOKIE['phone'];
		$openid = cookie('openid');
		$ary = array();
		$ary['h_account'] = $user;
		$ary['h_pwd'] = $pwd;
		$ary['h_tel'] = $phone;
		$res = $db->data($ary)->where("openid = '{$openid}'")->save();
		if($res){
			cookie('flag',1);
//			$user = $db->where("openid = '{$openid}'")->select();
//			$string=serialize($user);
//			cookie('user',$string);
			echo 1;
		}
	}
}