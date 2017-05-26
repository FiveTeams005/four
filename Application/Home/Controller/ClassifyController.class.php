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
		$classID = I('classID');
		cookie('classID',$classID);
		$this->display();
	}


}