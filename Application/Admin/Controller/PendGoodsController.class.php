<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class PendGoodsController extends BaseController {
	/**
	 * 普通审核商品
	 */
	public function nPendGoods(){
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
		$where['n_status'] = 2;
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
	//普通审核商品 详情；
	public function nPendDetail(){
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
	 * 拍卖审核商品
	 */
	public function pPendGoods(){
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
		$where['p_status'] = 3;
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
	 * 拍卖审核商品-详情
	 */
	public function pPendDetail(){
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
	 * 审核通过
	 */
	public function pass(){
		if(isset($_POST['pid'])){
			$id = $_POST['pid'];
			$goods = M('pgoods');
			$goodsName = $goods->where("p_id = {$id}")->getfield("p_name");
			$str = "拍卖商品:{$goodsName}";
			$data['p_status'] = 0;
			$res = $goods->data($data)->where("p_id = {$id}")->save();
		}
		else{
			$id = $_POST['nid'];
			$goods = M('ngoods');
			$goodsName = $goods->where("n_id = {$id}")->getfield("n_name");
			$str = "普通商品:{$goodsName}";
			$data['n_status'] = 1;
			$res = $goods->data($data)->where("n_id = {$id}")->save();
		}
		if($res){
			$log = M('log');
			$da['a_id'] = $_COOKIE['auserid'];
			$da['manipulation'] = "审核通过了{$str}";
			$logres = $log->data($da)->add();
			echo "审核通过！";
		}
		else{
			echo "审核失败！";
		}
	}

	/**
	 * 审核驳回
	 */
	public function reject(){
		if(isset($_POST['pid'])){
			$id = $_POST['pid'];
			$goods = M('pgoods');
			$goodsName = $goods->where("p_id = {$id}")->getfield("p_name");
			$str = "拍卖商品:{$goodsName}";
			$data['p_status'] = 4;
			$res = $goods->data($data)->where("p_id = {$id}")->save();
		}
		else{
			$id = $_POST['nid'];
			$goods = M('ngoods');
			$goodsName = $goods->where("n_id = {$id}")->getfield("n_name");
			$str = "普通商品:{$goodsName}";
			$data['n_status'] = 3;
			$res = $goods->data($data)->where("n_id = {$id}")->save();
		}
		if($res){
			$log = M('log');
			$da['a_id'] = $_COOKIE['auserid'];
			$da['manipulation'] = "审核驳回了{$str}";
			$logres = $log->data($da)->add();
			echo "已驳回！";
		}
		else{
			echo "驳回失败！";
		}
	}
}
?>