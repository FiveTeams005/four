<?php
return array(
	//'配置项'=>'配置值'
//    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
//    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
//    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '112.74.189.240', // 服务器地址
    'DB_NAME'               =>  'four',          // 数据库名
    'DB_USER'               =>  'liuzhi',      // 用户名
    'DB_PWD'                =>  '6895172liu',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'f_',    // 数据库表前缀

    // 普通商品状态
    'NG_STATUS' =>   array(
    	'0' => '下 架',
    	'1'=>'上 架',
    	'2'=>'审核中',
    	'3'=>'审核失败',
    	'4'=>'交易关闭',
    	'5'=>'交易中',
    	'6'=>'交易成功'
    ),
);