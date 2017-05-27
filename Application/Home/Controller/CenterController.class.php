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
    public function UnderSale(){
        $this->display();
    }
    public function MySale(){
        $this->display();
    }
    public function MyBuy(){
        $this->display();
    }
    public function MyZan(){
        $this->display();
    }
    public function MyAuction(){
        $this->display();
    }
    public function MyMoney(){
        $this->display();
    }
    public function MyAddr(){
        $this->display();
    }
    public function AddAddr(){
        $this->display();
    }
}