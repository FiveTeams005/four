$(function(){
	// 左侧菜单点击事件
	$(".sideMenu").on('click','li',function(){
		var path = $(this).attr("path");
		var name = $(this).children('a').text();
		for(var i = 0;i < $(".daohang>ul li").length;i++){
			if($(".daohang>ul>li:eq("+i+")").attr("path") == path){
				$(".navTop").removeClass("navTop");
				$("iframe").css("display","none");
				$("iframe[src='"+path+"']").css('display','block');
				$(".daohang>ul>li:eq("+i+")").find(".am-btn").addClass('navTop');
				break;
			}
			else if(i == $(".daohang>ul>li").length-1){
				$(".navTop").removeClass("navTop");
				$(".daohang>ul").append('<li path="'+path+'"><button type="button" class="am-btn am-btn-default am-radius am-btn-xs navTop">'+name+'<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close="">×</a></button></li>');
				$("iframe").css("display","none");
				$(".admin").append('<iframe src="'+path+'"></iframe>');
				break;
			}
		}
	});
	// 顶部导航点击事件
	$(".daohang").on('click','button',function(){
		$(".navTop").removeClass("navTop");
		$(this).addClass("navTop");
		$("iframe").css("display","none");
		$("iframe[src='"+$(this).parent().attr("path")+"']").css('display','block');
	})
	// 顶部导航删除点击事件
	$(".daohang").on('click','a',function(event){
		event.stopPropagation();
		if($(this).parent().is('.navTop')){
			$("iframe[src='"+$(this).parent().parent().attr("path")+"']").remove();
			$(this).parent().parent().prev('li').find('button').addClass('navTop');
			$(".navTop").last().parent().remove();
			$("iframe[src='"+$(".navTop").parent().attr("path")+"']").css("display","block");
		}
		else{
			$("iframe[src='"+$(this).parent().parent().attr("path")+"']").remove();
			$(this).parent().parent().remove();
		}
	})
})