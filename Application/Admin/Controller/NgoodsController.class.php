<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class NgoodsController extends BaseController {
	/**
	 * 普通商品
	 */
	public function ngoods(){
		$classify = M('classify');
		$cRes = $classify->getfield("c_id,c_name","");
		$this->assign('classify',$cRes);

		$this->assign('status',C('NG_STATUS'));

		$huser = M('huser');
		$huserRes = $huser->getfield("h_id,h_account");
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
		$this->display();
	}

	/**
	 * 删除用户
	 * @return string
	 */
	public function ngoodsDel(){
		$n_id = $_POST['n_id'];
		$ngoods = M('ngoods');
		$delRes = $ngoods->where("n_id in({$n_id})")->delete();
		if($delRes){
			echo "删除商品成功！";
		}
		else{
			echo "删除商品失败！";
		}
	}
}