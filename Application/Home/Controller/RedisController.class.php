<?php
namespace Home\Controller;
use Think\Controller;
class RedisController extends Controller {
	/**
	 * 拍卖高并发处理（需要商品id--goodsId   用户Id--userId）
	 * @return string
	 */
	public function redis(){
		$goodsId = I("goodsId");
		$userId = I("userId");
		$redis = new \Redis();
		$redis->connect('127.0.0.1',6379);
		if($redis->llen('user-list'.$goodsId) < 1){
			$redis->rpush("user-list{$goodsId}",$userId);
			$test = $redis->lrange("user-list{$goodsId}",0,100);
			if($userId == $redis->lindex('user-list'.$goodsId,0)){
				$redis->del("user-list".$goodsId);
				echo 1;
			}
			else{
				echo 0;
			}
		}
		else{
			echo 0;
		}
	}
}
?>