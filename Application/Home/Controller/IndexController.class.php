<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */

	/**
	 * 加载主页
	 */
    public function index(){
        $this->display();
    }
    public function advert(){
        $this->display();
    }
	/**
	 * 微信授权
	 */
	public function grant(){
		$code = $_REQUEST['code'];//我们要的code
		if(!empty($code)){
			$jssdk = new \Org\Jssdk("wx0bcc58e7cb182a1f", "6bca2d2e1e4a0892b462590aec81716f");
			$signPackage = $jssdk->GetSignPackage();
			$ret = $jssdk->getOpenId($code);
			$openid=$ret->openid;
			setcookie('openid',$openid);
			$accessToken = $jssdk->getAccessToken();
			setcookie('acce',$accessToken);
			$usrinfo=file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=$accessToken&openid=$openid&lang=zh_CN");
			$usrinfo=(json_decode($usrinfo,1));
//			var_dump($ret);
			$this->display('index');
		}else{
			$re = urlencode('http://eh.liuzhi66.top/index.php/Home/Index/grant');
			$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0bcc58e7cb182a1f&redirect_uri='.$re.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			redirect($url);
		}
		

	}

	public function aaa(){

		echo $_COOKIE['openid'];

	}

}