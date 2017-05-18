<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    /**
     * 加载登录页面
     */
    public function login(){
        $this->display();
    }
}