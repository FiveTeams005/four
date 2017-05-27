/*
* 商品详情；
*/

$(document).ready(function(){
        var detail = MVC('Home','Detail','show')
        $.post(detail,{},function (data) {
            alert(data);
        })
	
})