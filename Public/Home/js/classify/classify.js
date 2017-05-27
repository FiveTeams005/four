/*分类页脚本*/

$(function(){
	//搜索按钮点击事件；
	$('.sec-btn').click(function(){
		//请求数据；
		$.post('url',{conn:$('#sec').val()},function(){

		});
	});
	//筛选按钮点击事件；
	$('header nav>div').click(function(){

		$(this).addClass('bold').siblings().removeClass('bold');
		var index = $(this).index();
		
		if(index == 0){
			//清除价格样式；
			$('.icon-2-desc').css('border-bottom-color','');
			$('.icon-2-asc').css('border-top-color','');
			var rotate = $(this).find('.icon-1').css('transform');
			if(rotate == 'matrix(1, 0, 0, 1, 0, 0)'){ 
				$(this).find('.icon-1').css({'transform':'rotate(180deg)'});
				$('.city-box').css('display','block');
			}else{
				$(this).find('.icon-1').css({'transform':'rotate(0)'});
				$('.city-box').css('display','');
			}
		}else if (index == 1) {
			//清除价格样式；
			$('.icon-2-desc').css('border-bottom-color','');
			$('.icon-2-asc').css('border-top-color','');
			//清楚区域样式；
			$(this).siblings().find('.icon-1').css({'transform':'rotate(0)'});
			$('.city-box').css('display','');

		}else if (index == 2) {
			//清除价格样式；
			$('.icon-2-desc').css('border-bottom-color','');
			$('.icon-2-asc').css('border-top-color','');
			//清楚区域样式；
			$(this).siblings().find('.icon-1').css({'transform':'rotate(0)'});
			$('.city-box').css('display','');

		}else if (index == 3) {	//价格排序；
			//清楚区域样式；
			$(this).siblings().find('.icon-1').css({'transform':'rotate(0)'});
			$('.city-box').css('display','');

			var c1 = $('.icon-2-desc').css('border-bottom-color');
			var c2 = $('.icon-2-asc').css('border-top-color');

			if(c1 == 'rgb(204, 204, 204)' && c2 == 'rgb(204, 204, 204)'){
				$('.icon-2-desc').css('border-bottom-color','#ffda45');
			}else if (c1 == 'rgb(255, 218, 69)') {
				$('.icon-2-desc').css('border-bottom-color','');
				$('.icon-2-asc').css('border-top-color','#ffda45');
			}else if(c2 == 'rgb(255, 218, 69)'){
				$('.icon-2-desc').css('border-bottom-color','#ffda45');
				$('.icon-2-asc').css('border-top-color','');
			}
			
		}
	});
	//选择城市 start
	$('body').on('click', '.city-list p', function () {
		var type = $('.city-box').data('type');
		$('#zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
		$('#gr_zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
		$(this).find('.icon-1').css({'transform':'rotate(0)'});
		$('.city-box').css('display','');
	});
	$('body').on('click', '.letter li', function () {
		var s = $(this).find('a').html();
		$(window).scrollTop($('#' + s + '1').offset().top-56);
	});
	
	
	//进来加载商品东西
	var showGoods = MVC('Home','Classify','showGoods');
	$.post(showGoods,{},function (data) {
		for(var i=0;i<data.length;i++){
			var oDiv = $("<div onclick='detail("+data[i]['n_id']+")' class='col-sm-6 col-xs-6 bg-primary one-goods'>\
							<img src='"+data[i]['n_src']+"' class='img-responsive'>\
								<div>"+data[i]['n_name']+"</div>\
							<p class='text-danger'>&yen;<span>"+data[i]['n_praise']+"</span></p>\
							</div>");
			$("#showGoods").append(oDiv);
		}

	},'json');
	
})