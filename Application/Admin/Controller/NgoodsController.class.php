<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class NgoodsController extends BaseController {
	/**
	 * 普通商品
	 */
	public function ngoods(){
		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name");
		$this->assign('classify',$cRes);

		$this->assign('status',C('NG_STATUS'));

		$huser = M('huser');
		$huserRes = $huser->getfield("h_id,h_nick");
		$this->assign('huser',$huserRes);

		$img = M('images');
		$imgRes = $img->group('n_id')->getfield('n_id,n_img');
		$this->assign('img',$imgRes);

		$where = "";
		if(isset($_GET['goodsStatus']) && $_GET['goodsStatus'] != "none"){
			$where['n_status'] = array('eq',$_GET['goodsStatus']);
		}
		if(isset($_GET['classify']) && $_GET['classify'] != ""){
			$where['c_id'] = $_GET['classify'];
		}
		if(isset($_GET['selectInp'])){
			$where['_string'] = "(n_name like '%{$_GET['selectInp']}%') OR (n_info like '%{$_GET['selectInp']}%')";
		}

		$goods = M('ngoods');

		if($_GET['publishTime'] == 'asc'){
			$res = $goods->where($where)->page((isset($_GET['p'])?$_GET['p']:1).',6')->order('n_time asc')->select();
		}
		else{
			$res = $goods->where($where)->page((isset($_GET['p'])?$_GET['p']:1).',6')->order('n_time desc')->select();
		}
		$this->assign('goods',$res);
		$count = $goods->where($where)->count();
		$Page = new \Think\Page($count,6);
		$show = $Page->show();
		$this->assign('page',$show);

		$this->display();
	}

	/**
	 * 商品详情
	 */
	public function ngoodsDetail(){
		$n_id = $_GET['id'];
		$goods = M('Ngoods');
		$res = $goods->where("n_id = {$n_id}")->select();
		$this->assign("goods",$res);
		$this->assign('status',C('NG_STATUS'));

		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name","");
		$this->assign('classify',$cRes);

		$img = M('images');
		$imgRes = $img->field('n_img')->where("n_id = {$n_id}")->select();
		$this->assign('img',$imgRes);

		$huser = M('huser');
		$huserRes = $huser->field('h_nick')->where("h_id = {$res[0]['h_id']}")->select();
		$this->assign('huser',$huserRes[0]['h_nick']);

		$this->display();
	}

	/**
	 * 删除商品
	 * @return string
	 */
	public function ngoodsDel(){
		$n_id = $_POST['n_id'];
		$ngoods = M('ngoods');

		// 日志
		$ngoodsName = $ngoods->where("n_id in({$n_id})")->select();
		$name = array();
		for($i = 0;$i < count($ngoodsName);$i++){
			array_push($name,$ngoodsName[$i]['n_name']);
		}
		$name = implode("、",$name);

		$delRes = $ngoods->where("n_id in({$n_id})")->delete();
		if($delRes){
			$log = M('log');
			$data['a_id'] = $_COOKIE['auserid'];
			$data['manipulation'] = "删除了普通商品:{$name}";
			$logres = $log->data($data)->add();
			echo "删除商品成功！";
		}
		else{
			echo "删除商品失败！";
		}
	}

	/**
	 * 删除商品
	 * @return string
	 */
	public function push(){
		$n_id = I('id');
		// 推送的url地址，使用自己的服务器地址
		$push_api_url = "http://eh.liuzhi66.top:2121/";
		$post_data = array(
			"type" => "publish",
			"content" => $n_id,
			"to" => '',
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
}