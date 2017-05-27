<?php
namespace Org;
  var_dump(222);
  require_once "Jssdk.class.php";
  $jssdk = new JSSDK("wx0bcc58e7cb182a1f", "6bca2d2e1e4a0892b462590aec81716f");
  $accessToken = $jssdk->getAccessToken();
  $serverId=$_REQUEST['serverId'];
  var_dump($serverId);
  $url="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$accessToken&media_id=$serverId";
  $ret=file_get_contents("$url");//下载文件
  $img="$serverId.jpg"; //设置服务器端图片保存地址
  $resource = fopen("upimg/".$img,"w+");
  fwrite($resource,$ret);
  fclose($resource);
  echo $img;

?>
