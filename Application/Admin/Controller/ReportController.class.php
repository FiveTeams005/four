<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class ReportController extends BaseController {
	/**
	 * 报表
	 */
	public function report(){
		$this->display();
	}
	public function getUserCount(){
	    $db1=M('huser');
	    $db2=M('order');
	    $sql1="select DATE_FORMAT(h_regtime,'%m') as month,count(h_id) as id from __TABLE__ where DATE_FORMAT(h_regtime,'%Y')=2017 group by month order by month;";
        $res1=$db1->query($sql1);
        $sql2="select DATE_FORMAT(o_rtime,'%m') as month,count(o_id) as id from __TABLE__ where DATE_FORMAT(o_rtime,'%Y')=2017 AND o_status=5 group by month order by month;";
        $sql3="select DATE_FORMAT(o_rtime,'%Y-%m') as month,sum(o_money) as money from __TABLE__ where DATE_FORMAT(o_rtime,'%Y')=2017 AND o_status=5 group by month order by month;";
        $res2=$db2->query($sql2);
        $res3=$db2->query($sql3);
        $res=array($res1,$res2,$res3);
        echo json_encode($res);
    }
}