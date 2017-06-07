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
//		cookie('user',1);
        $this->display('index');
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
				$this->display('advert');
			}else{
				var_dump('无法获取openid');
			}

		}else{
			$re = urlencode('http://eh.liuzhi66.top/index.php/Home/Index/grant');
			$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0bcc58e7cb182a1f&redirect_uri='.$re.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			redirect($url);
		}
	}


	//测试
	public function userid(){
		echo cookie('user');
	}
	public function msg(){
		// 指明给谁推送，为空表示向所有在线用户推送
		$to_uid = I('id');
		$con = I('con');
		// 推送的url地址，使用自己的服务器地址
		$push_api_url = "http://eh.liuzhi66.top:2121/";
		$post_data = array(
			"type" => "publish",
			"content" => $con,
			"to" => $to_uid,
		);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
		curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
		$return = curl_exec ( $ch );
		curl_close ( $ch );
		echo $return;
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
 	* 进入首页加载商品
 	*/
 	//拍卖商品；
 	public function loadAuctionGoods(){
 		$pgoods = M('pgoods');
 		$res1 = $pgoods ->order("p_time desc")->limit(0,2)->where("p_status in (0,1,2)") -> select();
 		$img = M('images');
		$res2 = $img -> select();//图片；
		$this->ajaxreturn( array($res1,$res2) );
 	}

 	//普通商品
 	public function loadGoods(){
 		$flag = I('flag',0,'intval');//判断点击的是新鲜的 还是附近的；

 		$me_id = cookie('user');
 		$ngoods = M('ngoods');
 		$img = M('images');
 		$res1 = array();
 		if($flag == 0){
 			$res1 = $ngoods->join('left join f_huser on f_ngoods.h_id=f_huser.h_id')->page((isset($_POST['page'])?$_POST['page']:1).',4')->order("n_time desc")->where("n_status = 1")->select();
 		}else if($flag == 1){
 			$currPage = isset($_GET['page'])?$_GET['page']:1;

 			$res = array();//计算距离后的结果数组;
 			$user = M('huser');
 			$address = $user -> where("h_id = $me_id") -> getField('h_id,h_loginlongitude,h_loginlatitude');
			$result = $ngoods->join('left join f_huser on f_ngoods.h_id=f_huser.h_id')->where('n_status = 1')->select();
			for($i = 0; $i <count($result); $i++){
				$distance = GetDistance($address[1]['h_loginlongitude'],$address[1]['h_loginlatitude'],$result[$i]['lng'],$result[$i]['lat']);
				if(floor ($distance) <= 3){
					array_push($res,$result[$i]);
				}
			}
			$len = $currPage*4 >= count($res)?count($res): $currPage*4;//遍历当前数组的长度;
			for($j = ($currPage-1)*4; $j < $len ; $j++){
				array_push($res1,$res[$j]);//最终的返回结果;
			}
 		}
 		// var_dump($address);die();
 		$res2 = $img -> select();//图片；

 		$res = array($res1,$res2);

		$this->assign('log',$res);

 		$this->ajaxreturn($res);
 	}
	/*
 	* 查询商品
 	*/
 	public function searchGoods(){
 		$g_name = I('goodsname');
 		cookie('clickVal',$g_name);//把搜索内容存入cookie
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


	/*
	 * 气泡提示事件
	 */
	public function prompt(){
		$db = M('chat');
		$h_id = cookie('user');
		$res = $db->where("t_h_id = '{$h_id}' AND l_status = 2")->select();
		$db2 = M('service');
		$res2 = $db2->where("h_id = '{$h_id}' AND  falg=2 AND status = 2")->select();
		$ary = array();
		array_push($ary,$res,$res2);
		echo json_encode($ary);
	}
}
