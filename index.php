<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);

if (get_magic_quotes_gpc()) {
	function stripslashes_deep($value){
		$value = is_array($value) ?
		array_map('stripslashes_deep', $value) :
		stripslashes($value);
		return $value;
	}
	$_POST = array_map('stripslashes_deep', $_POST);
	$_GET = array_map('stripslashes_deep', $_GET);
	$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}

function XSSClean($val) {
	if (is_array($val))
    {
        while (list($key) = each($val))
        {
            $val[$key] = XSSClean($val[$key]);
        }
        return $val;
    }
	$val = preg_replace('/([\x00-\x08\x0b-\x0c\x0e-\x19])/', '', $val);
	$search = 'abcdefghijklmnopqrstuvwxyz';
	$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$search .= '1234567890!@#$%^&*()';
	$search .= '~`";:?+/={}[]-_|\'\\';
	for ($i = 0; $i < strlen($search); $i++) {
	  $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
	  $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
	}

	$val = str_replace("`","‘",$val);
	$val = str_replace("'","‘",$val);
	//$val = str_replace("\"","“",$val);
	//$val = str_replace(",","，",$val);
	$val = str_replace("(","（",$val);
	$val = str_replace(")","）",$val);

	$ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'frameset', 'ilayer', 'bgsound', 'title', 'base');
	$ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	$ra = array_merge($ra1, $ra2);

	$found = true;
	while ($found == true) {
	  $val_before = $val;
	  for ($i = 0; $i < sizeof($ra); $i++) {
		 $pattern = '/';
		 for ($j = 0; $j < strlen($ra[$i]); $j++) {
			if ($j > 0) {
			   $pattern .= '(';
			   $pattern .= '(&#[xX]0{0,8}([9ab]);)';
			   $pattern .= '|';
			   $pattern .= '|(&#0{0,8}([9|10|13]);)';
			   $pattern .= ')*';
			}
			$pattern .= $ra[$i][$j];
		 }
		 $pattern .= '/i';
		 $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
		 $val = preg_replace($pattern, $replacement, $val);
		 if ($val_before == $val) {
			$found = false;
		 }
	  }
	}
	return $val;
}

$_GET = XSSClean($_GET);
$_POST = XSSClean($_POST);
$_REQUEST = XSSClean($_REQUEST);
$_COOKIE = XSSClean($_COOKIE);

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Application/');

//define('BIND_MODULE','Admin');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单