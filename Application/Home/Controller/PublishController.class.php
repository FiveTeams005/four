<?php
namespace Home\Controller;
use Think\Controller;
class PublishController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */


	/**
	 * 注释
	 * 点击发布商品判断是否是手机验证过的
	 */
	public function Publish(){
		if(cookie('flag')==2){
			$this->display('Login/regGetCode');
		}else{
			$this->display();
		}
    }

	/**
	 * 注释
	 * 点击发拍卖商品布判断是否是手机验证过的
	 */
    public function PublishAuction(){
		if(cookie('flag')==2){
			$this->display('Login/regGetCode');
		}else{
			$this->display();
		}
    }
	
	/**
	 * 注释
	 * 商品信息存入数据库
	 */
	public function masg(){
		$db = M('ngoods');
		$ary['n_name']=I('tit');
		$ary['n_info']=I('des');
		$ary['n_price']=I('price');
		$ary['lat']=I('lat');
		$ary['lng']=I('lng');
		$ary['city']=I('city');
		$ary['h_id']=cookie('user');
		$ary['c_id']=cookie('setClassId');
		$res = $db->add($ary);
		if ($res){
			$n_id = $res;
			cookie('n_id',$n_id);
		}
	}

	/**
	 * 注释
	 * 拍卖商品信息存入数据库
	 */
	public function pmasg(){
		$db = M('pgoods');
		$ary['p_name']=I('tit');
		$ary['p_info']=I('des');
		$ary['p_bPrice']=I('price');
		$ary['lat']=I('lat');
		$ary['lng']=I('lng');
		$ary['city']=I('city');
		$ary['h_id']=cookie('user');
		$ary['c_id']=cookie('setClassId');
		$ary['p_bail']=I('bail');
		$ary['p_step']=I('step');
		$ary['p_bTime']=I('bTime');
		$ary['p_eTime']=I('eTime');
		$res = $db->add($ary);
		if ($res){
			$p_id = $res;
			cookie('p_id',$p_id);
		}
	}
	
	/**
	 * 注释
	 * 点击上传图片方法
	 */
	public function upimg(){
		$jssdk = new \Org\Jssdk("wx0bcc58e7cb182a1f", "6bca2d2e1e4a0892b462590aec81716f");
		$accessToken = $jssdk->getAccessToken();
		$serverId=I('img');
		$url="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$accessToken&media_id=$serverId";
		$ret=file_get_contents("$url");//下载文件
		$img="$serverId.jpg"; //设置服务器端图片保存地址
		$resource = fopen("upimg/".$img,"w+");
		$db = M('images');
		$ary['n_id'] = cookie('n_id');
		$ary['n_img'] = 'http://eh.liuzhi66.top/upimg/'.$img;
		$res = $db->add($ary);
		fwrite($resource,$ret);
		fclose($resource);
	}

	/**
	 * 注释
	 * 点击上传拍卖商品图片方法
	 */
	public function pupimg(){
		$jssdk = new \Org\Jssdk("wx0bcc58e7cb182a1f", "6bca2d2e1e4a0892b462590aec81716f");
		$accessToken = $jssdk->getAccessToken();
		$serverId=I('img');
		$url="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$accessToken&media_id=$serverId";
		$ret=file_get_contents("$url");//下载文件
		$img="$serverId.jpg"; //设置服务器端图片保存地址
		$resource = fopen("upimg/".$img,"w+");
		$db = M('images');
		$ary['p_id'] = cookie('p_id');
		$ary['n_img'] = 'http://eh.liuzhi66.top/upimg/'.$img;
		$res = $db->add($ary);
		fwrite($resource,$ret);
		fclose($resource);
	}

	/**
	 * 注释
	 * 选择商品分类，暂存分类ID
	 */
	public function setClassId(){
		cookie('setClassId',I('setClassId'));
	}


	
}