/*
* 商品详情；
*/

$(document).ready(function(){
	new Loading();

        var detail = MVC('Home','Detail','show')
        $.post(detail,{},function (data) {
            alert(data);
            $('#loading').remove();
        })
	
})