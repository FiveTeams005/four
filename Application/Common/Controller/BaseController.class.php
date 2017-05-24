<?php
namespace Common\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize(){
		if(empty(cookie('auserid'))){
			$this->redirect('Login/login');
		}
	}
}