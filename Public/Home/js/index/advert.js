function lefttime(){
    $t=$('#t').html();
    if($t!=0){
        $('#t').html($t-1);
        $i=setTimeout("lefttime()",1000);
    }
//        判断时间是否为0，若为0则跳转至首页
    else{
        window.location.href=MVC("Home","Index","index");
        clearTimeout($i);
    }
};
$(document).ready(function(){
    lefttime();
//            点击跳过跳转至首页
    $('.ad_time').click(function(){
        window.location.href=MVC("Home","Index","index");
        clearTimeout($i);
    })
})
