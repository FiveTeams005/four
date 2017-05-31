<?php
function Rad($d){
    return $d * PI() / 180.0;//经纬度转换成三角函数中度分表形式。
}
//计算距离，参数分别为第一点的，经度,纬度；第二点的经度,纬度，
function GetDistance($lng1,$lat1,$lng2,$lat2){

    $radLat1 = Rad($lat1);
    $radLat2 = Rad($lat2);
    $a = $radLat1 - $radLat2;
    $b = Rad($lng1) - Rad($lng2);
    $s = 2 * asin(sqrt(pow(sin($a/2),2) +
                    cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)));
    $s = $s *6378.137 ;// EARTH_RADIUS;
    $s = round($s * 10000) / 10000; //输出为公里
    //s=s.toFixed(4);
    return $s ;
}
?>