<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class LogController extends BaseController {
	/**
	 * 日志
	 */
	public function log(){
		$log = M('log');
		$res = $log->join("f_auser on f_log.a_id = f_auser.a_id")->page((isset($_GET['p'])?$_GET['p']:1).',10')->order("time desc")->select();
		$this->assign('log',$res);
		$count = $log->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$this->assign('page',$show);

		$this->display();
	}
}