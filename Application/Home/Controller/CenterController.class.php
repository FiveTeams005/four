<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	/**
	 * 个人中心页面加载
	 */
	public function Center(){
		$this->display();
	}
	public function PersonalInfo(){
        $this->display();
    }
    public function MyPublish(){
	    $this->display();
    }
}