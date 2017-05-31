<?php
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	public function paySuccess(){
	    $this->display();
    }
    public function payFail(){
	    $this->display();
    }
    public function payIndex(){
        $this->display();
    }
}