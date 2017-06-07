/*分类页脚本*/

$(function(){
	new Loading();

	//选择城市 start
	// $('body').on('click', '.city-list p', function () {
	// 	var type = $('.city-box').data('type');
	// 	$('#zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
	// 	$('#gr_zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
	// 	$('.icon-1').css({'transform':'rotate(0)'});
	// 	$('.city-box').css('display','');
	// });
	// $('body').on('click', '.letter li', function () {
	// 	var s = $(this).find('a').html();
	// 	$(window).scrollTop($('#' + s + '1').offset().top-56);
	// });

	var bus = new Vue();//中转组件；
	//头部组件;
	var header = new Vue({
		el:"header",
		data:{
			secConn:'拍卖商品',//显示当前商品的分类或搜索的条件；
			list:[],
		},
		mounted:function(){
			bus.$on('secConn',function(data){
				// header.$set(header.$data,'secConn',data);
				header.secConn = data;
			})
		},
		methods:{
			//搜索；
			sec:function(){
				var conn = document.getElementById('input-box').value;
				if(conn != ''){
					this.secConn = conn;
					$.post(MVC('Home','Classify','pSecGoods'),{conn:conn},function(res){
						this.list = res;
						var dataArr = res[0];
						if(dataArr.length > 0){
							for(let j = 0; j < dataArr.length;j++){
			                    for(let i=0; i < res[1].length; i ++){
			                        if(res[1][i].p_id == dataArr[j].p_id){
			                            dataArr[j]['img'] = res[1][i].n_img;
			                            break;
			                        }
			                    }
			                }
							bus.$emit("list",dataArr);
						}else{
							bus.$emit("list",[]);
							layer.open({
								content:'暂无数据',
							});
						}
					});
				}
			},
			//区域点击事件；
			areaClick:function(){
				//清除价格样式；
				$('.icon-2-desc').css('border-bottom-color','');
				$('.icon-2-asc').css('border-top-color','');
				$(event.currentTarget).addClass('bold').siblings().removeClass('bold');;
				var rotate = $('.icon-1').css('transform');
				if(rotate == 'matrix(1, 0, 0, 1, 0, 0)'){
					$('.icon-1').css({'transform':'rotate(180deg)'});
					$('.city-box').css('display','block');
				}else{
					$('.icon-1').css({'transform':'rotate(0)'});
					$('.city-box').css('display','');
				}
			},
			//综合按钮点击事件；
			synthClick:function(){
				//清除价格样式；
				$('.icon-2-desc').css('border-bottom-color','');
				$('.icon-2-asc').css('border-top-color','');
				//清楚区域样式；
				$(event.currentTarget).siblings().find('.icon-1').css({'transform':'rotate(0)'});
				$('.city-box').css('display','');
				$(event.currentTarget).addClass('bold').siblings().removeClass('bold');
			},
			//发布时间 按钮点击事件；
			timeClick:function(){
				$(event.currentTarget).addClass('bold').siblings().removeClass('bold');
				//清除价格样式；
				$('.icon-2-desc').css('border-bottom-color','');
				$('.icon-2-asc').css('border-top-color','');
				//清楚区域样式；
				$(this).siblings().find('.icon-1').css({'transform':'rotate(0)'});
				$('.city-box').css('display','');
			},
			//价格排序按钮点击事件；
			priceClick: function(){
				$(event.currentTarget).addClass('bold').siblings().removeClass('bold');
				//清楚区域样式；
				$(event.currentTarget).siblings().find('.icon-1').css({'transform':'rotate(0)'});
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
			},

		}
	});

	//内容显示组件；
	var content = new Vue({
		el: "#content",
		data:{
			dataList:[],
		},
		methods:{
			//如果没有图片；
			noneImg:function(val){
				console.log(val);
				if(val == undefined){
					val = path+'Home/img/xianyu/page_item_deleted.png';
				}
				return val;
			},
			//单个商品点击事件；
			goodsClick:function(key){
				// alert('p'+key)
				$.post(MVC('Home','Detail','saveInfo'),{goods_flag:'p',goods_id:key},function(res){
                    if(res){
                        window.location.href = MVC('Home','Detail','detail');
                    }else{
                        layer.open({
                            content:'页面跳转失败',
                        });
                    }
                });
			},
		},
		mounted: function (){
			bus.$on('list',function(data){
				content.dataList = data;
			});
			//进来加载商品东西
			var showGoods = MVC('Home','Classify','pgoods');
			$.post(showGoods,{flag:0},function (res) {

				var dataArr = res[0];
						// console.log(dataArr);
				for(let j = 0; j < dataArr.length;j++){
					for(let i=0; i < res[1].length; i ++){
						if(res[1][i].p_id == dataArr[j].p_id){
							dataArr[j]['img'] = res[1][i].n_img;
							break;
						}
					}
				}
				content.dataList = dataArr;
				// content.$set(content.$data,'dataList',dataArr);
				$('#loading').remove();
			},'json');
		},




	});


})
