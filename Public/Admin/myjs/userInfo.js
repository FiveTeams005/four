$(function(){
	// 分页居中样式
	for(var i = 0;i < $(".pageBox").length;i++){
		$(".pageBox>div:eq("+i+")").css("margin-left",(parseFloat($(".pageBox>div:eq("+i+")").css("width"))/-2)+"px");
	}
})