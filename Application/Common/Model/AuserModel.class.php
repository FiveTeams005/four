<?php
namespace Common\Model;
use Think\Model;
class AuserModel extends Model {
	protected $tableName = 'auser';

   // // 定义自动验证
   // protected $_validate    =   array(
   //     array('a_account','require','用户名格式不正确。'),
   //     array('a_account','/^[a-zA-z]\w{4,19}$/s','帐号格式不正确',1,'regex'),
   //     array('a_account','','帐号已经存在',1,'unique'),
   //     array('a_pwd','6,12','密码长度不正确',2,'length'),
   // );

 }