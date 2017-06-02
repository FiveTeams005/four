<?php
namespace Common\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize(){
		if(empty($_COOKIE['auserid'])){
			$this->redirect('Login/login');
		}
	}
}