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
}