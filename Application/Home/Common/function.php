<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/23 0023
 * Time: 下午 1:26
 */

//自动验证码
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}