<?php
namespace Common\Model;
use Think\Model;
class BannerModel extends Model {
	protected $tableName = 'banner';

//    // 定义自动验证
//    protected $_validate    =   array(
//        array('username','require','用户名格式不正确。'),
//        array('username','/^[a-zA-z]\w{4,19}$/s','帐号格式不正确',1,'regex'),
//        array('username','','帐号已经存在',1,'unique'),
//        array('type',array(1,2,3),'值的范围不正确！',1,'in'), // 当值不为空的时候判断是否在一个范围内
//        array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
//        array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
//        // array('email','checkEmail','邮箱已经存在。',1,'callback'),
//    );
//    // 定义自动完成
//    protected $_auto    =   array(
//        array('regtime','getCurentDate',1,'function'),
//    );

 }