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
			$ret = $jssdk->getOpenId($code);
			$openid=$ret->openid;
			if(!empty($openid)){
				cookie('openid',$openid);
				$accessToken = $jssdk->getAccessToken();
				cookie('acce',$accessToken);
				$usrinfo=file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=$accessToken&openid=$openid&lang=zh_CN");
				$usrinfo=(json_decode($usrinfo,1));
				$db = M('huser');
				$opid = cookie("openid");
				$res1 = $db->where("openid = '{$opid}'")->select();
				if($res1){
					$loginTime = date('Y-m-d H:i:s',time());
					$ary['h_loginlasttime']=date('Y-m-d H:i:s',time());
					$res = $db->data($ary)->where("openid='{$openid}'")->save();
					if($res1[0]['h_tel']!=0){
						cookie('flag',1);
					}else{
						cookie('flag',2);
					}


				}else{
					$ary['h_nick']=$usrinfo['nickname'];
					$ary['h_sex']=$usrinfo['sex'];
					$ary['h_head']=$usrinfo['headimgurl'];
					$ary['openid']=cookie('openid');
					$ary['h_status']=1;
					$ary['h_mone']=0;
					$ary['h_grade']=1;
					$ary['h_honor']=5;
					$ary['h_loginlasttime']=date('Y-m-d H:i:s',time());
					$res = $db->add($ary);
					cookie('flag',2);
				}
				$user = $db->where("openid = '{$openid}'")->select();
//				$string=serialize($user);
				cookie('user',$user[0]['h_id']);
//			var_dump(unserialize(cookie('user')));
				$this->display('index');
			}else{
				var_dump('无法获取openid');
			}

		}else{
			$re = urlencode('http://eh.liuzhi66.top/index.php/Home/Index/grant');
			$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0bcc58e7cb182a1f&redirect_uri='.$re.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			redirect($url);
		}
	}

	/**
	 * 记录当前位置
	 */
	public function address(){
		$db = M('huser');
		$ary['h_loginlongitude']=I('longitude');
		$ary['h_loginlatitude']=I('latitude');
		$ary['h_add']=I('add');
		$opid = cookie('openid');
		$res = $db->data($ary)->where("openid='{$opid}'")->save();
	}

	/**
	 * 显示定位地图
	 */
	public function map(){
		$this->display('Index/map');
	}

	/*
 	* 显示商品分类
 	*/
	public function classfiy(){
		$db = M('classify');
		$res = $db->select();
		echo json_encode($res);
	}
	/*
 	* 查询商品
 	*/
 	public function searchGoods(){
 		$g_name = I('goodsname');
 		$ngoods = M('ngoods');
 		$pgoods = M('pgoods');
 		$res1 = $ngoods->where("n_name like '%{$g_name}%'")->select();
 		$res2 = $pgoods->where("p_name like '%{$g_name}%'")->select();
 		
 		$result = array();
 		if(count($res1) != 0 && count($res2) != 0){
 			$result = array_merge($res2,$res1);
 		}elseif(count($res1) > 0 && count($res2) == 0){
 			$result = $res1;
 		}elseif(count($res2) > 0 && count($res1) == 0){
 			$result = $res2;
 		}
 		// $this->redirect('Classify/classify');
 		// var_dump($result);
 		if(count($result) > 0){
 			$this->ajaxreturn(true);
 		}else{
 			$this->ajaxreturn(false);
 		}
 	}
 	/*
 	* 查询用户
 	*/
 	public function schUser(){
 		$u_name = I('username');
 		$huser = M('huser');
 		$res = $huser->where("h_nick = '{$u_name}'")->select();
 		if(empty($res)){
 			$this->ajaxreturn(false);
 		}else{
 			$this->ajaxreturn(true);
 		}
 	}
	
}