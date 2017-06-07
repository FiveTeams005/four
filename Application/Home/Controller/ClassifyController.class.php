<?php
namespace Home\Controller;
use Think\Controller;
class ClassifyController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */

	/**
	 * 跳转到分类页面
	 */
	public function classify(){
		 $this->display();
	}
	/**
	 * 跳转到分类页面(拍卖商品)
	 */
	public function pclassify(){
		 $this->display();
	}
	/**
	 * 获取拍卖商品数据；
	 */
	public function pgoods(){
		$flag = I('flag',0,'intval');//如果是刚进页面 加载商品 flag=0；
		$pgoods = M('pgoods');//拍卖商品表
		$images = M('images');//图片表
		$classify = M('classify');//商品分类表；

		$c_id = cookie('clickVal');//存储搜索的商品信息；
		$res1 = array();
		if($flag == 0){
			$res1 = $pgoods->select();
		}else{
			$res1 = $pgoods->where("p_name like '%{$c_id}%'")->select();
		}
		$res2 = $images ->where('p_id != 0') -> select();

		$this->ajaxreturn(array($res1,$res2));
	}
	/**
	 * 存储点击跳转的条件内容；
	 */
	public function saveClassify(){
		$classID = I('classID',0,intval);//存数字分类；
		cookie('clickVal',$classID);
		$save = cookie('clickVal');
		if(empty($save)){
			echo false;
		}else{
			echo true;
		}
	}


	/**
	 * 根据商品分类显示商品
	 */
	public function showGoods(){
		$db = M('ngoods');//普通商品表
		$images = M('images');//图片表
		$classify = M('classify');//商品分类表；

		$c_id = cookie('clickVal');//存储搜索的商品信息；
		$val = (int)$c_id;
		$res1 = array();
		$res3 = null;
		if($val == 0){	//检测cookie 转换后 的值 如果是0，则是搜索内容，如果是大于0数字 则点击的是分类
			// var_dump($val);
			$res1 = $db->where("n_name like '%{$c_id}%'")->select();
			$res3 = $c_id;
		}else{
			$res1 = $db->where("c_id='{$c_id}'")->select();
			$res3 = $classify ->field('c_name')->where("c_id='{$c_id}'")->select();
		}
		$res2 = $images ->where('n_id != 0') -> select();

		$this->ajaxreturn(array($res1,$res2,$res3));
	}

	// 显示搜索商品
	public function secGoods(){
		$conn = I('conn');
		$ngoods = M('ngoods');//普通用户表
		$images = M('images');//图片表；
		$res1 = $ngoods -> where("n_name like '%{$conn}%'") -> select();
		$res2 = $images ->where('n_id != 0') -> select();
		$this->ajaxreturn(array($res1,$res2));

	}
	// 显示搜索拍卖商品
	public function pSecGoods(){
		$conn = I('conn');
		$ngoods = M('pgoods');//拍卖商品表
		$images = M('images');//图片表；
		$res1 = $ngoods -> where("p_name like '%{$conn}%'") -> select();
		$res2 = $images ->where('p_id != 0') -> select();
		$this->ajaxreturn(array($res1,$res2));

	}

}
