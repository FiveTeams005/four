<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class PgoodsController extends BaseController {
	/**
	 * 拍卖商品
	 */
	public function pgoods(){
		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name","");
		$this->assign('classify',$cRes);

		$this->assign('status',C('PG_STATUS'));

		$huser = M('huser');
		$huserRes = $huser->getfield("h_id,h_nick");
		$this->assign('huser',$huserRes);

		$img = M('images');
		$imgRes = $img->group('p_id')->getfield('p_id,n_img');
		$this->assign('img',$imgRes);

		$where = "";
		if(isset($_GET['goodsStatus']) && $_GET['goodsStatus'] != "none"){
			$where['p_status'] = array('eq',$_GET['goodsStatus']);
		}
		if(isset($_GET['classify']) && $_GET['classify'] != ""){
			$where['c_id'] = $_GET['classify'];
		}
		if(isset($_GET['selectInp'])){
			$where['_string'] = "(p_name like '%{$_GET['selectInp']}%') OR (p_info like '%{$_GET['selectInp']}%')";
		}

		$goods = M('pgoods');

		if($_GET['publishTime'] == 'asc'){
			$res = $goods->where($where)->page((isset($_GET['p'])?$_GET['p']:1).',6')->order('p_time asc')->select();
		}
		else{
			$res = $goods->where($where)->page((isset($_GET['p'])?$_GET['p']:1).',6')->order('p_time desc')->select();
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
	public function pgoodsDetail(){
		$p_id = $_GET['id'];
		$goods = M('Pgoods');
		$res = $goods->where("p_id = {$p_id}")->select();
		$this->assign("goods",$res);
		$this->assign('status',C('PG_STATUS'));

		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name","");
		$this->assign('classify',$cRes);

		$img = M('images');
		$imgRes = $img->field('n_img')->where("p_id = {$p_id}")->select();
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
	public function pgoodsDel(){
		$p_id = $_POST['p_id'];
		$pgoods = M('pgoods');

		// 日志
		$pgoodsName = $pgoods->where("p_id in({$p_id})")->select();
		$name = array();
		for($i = 0;$i < count($pgoodsName);$i++){
			array_push($name,$pgoodsName[$i]['p_name']);
		}
		$name = implode("、",$name);

		$delRes = $pgoods->where("p_id in({$p_id})")->delete();
		if($delRes){
			$log = M('log');
			$data['a_id'] = $_COOKIE['auserid'];
			$data['manipulation'] = "删除了拍卖商品:{$name}";
			$logres = $log->data($data)->add();
			echo "删除商品成功！";
		}
		else{
			echo "删除商品失败！";
		}
	}
}