// 支付页面脚本
$(function(){
new Loading();
	var show = MVC('Home','Pay','show');
	// $.post(show,{},function(data){
	// 	var addressList = [];
	// 	var add;
	// 	for(var i=0;i<data[2].length;i++){
	// 		if(data[2][i]['d_status']==1){
	// 			var a = {name:data[2][i]['d_name'],tel:data[2][i]['d_tel'],add:data[2][i]['d_address']}
	// 			addressList.push(a);
	// 		}else{
	// 			add=data[2][i];
	// 		}
	// 	}

	// 	$("#goodsName").html(data[1][0]['n_name']);
	// 	$("#price").html('￥:'+data[1][0]['n_price']);
	// 	$("#goodsName").html(data[1][0]['n_name']);
	// 	$("#nick").html(add['d_name']);
	// 	$("#phone").html(add['d_tel']);
	// 	$("#img").attr('src',data[3][0]['n_img']);
		
	// 	$('#loading').remove();
		Vue.component('todo-item',{
			props:['list'],
			template:
				'<div class="row" :class="{checked:list.d_status!=1}">\
					<div class="col-xs-12 col-sm-12"  v-on:click="getAddress">\
						<p><span id="nick">{{list.d_name}}</span>&nbsp;&nbsp<span id="phone">{{list.d_tel}}</span></p>\
						<p id="add">{{list.d_address}}</p>\
					</div>\
				</div>',
			methods:{
				//获取地址；
				getAddress:function(event){
					$('#address-list-box').css({'display':'none'});
					$('.show-address-div').html(event.currentTarget.innerHTML);
				},
			}
		});
		var vm = new Vue({
			el:"#app",
			mounted:function(){
				$.post(show,{},function(data){
					vm.flag = data[4];
					vm.addressList = data[2];
					for(var i=0;i<data[2].length;i++){
						if(data[2][i]['d_status'] !=1){
							vm.defaultAdd=data[2][i];//默认地址;
							// var a = {name:data[2][i]['d_name'],tel:data[2][i]['d_tel'],add:data[2][i]['d_address']}
							// vm.addressList.push(a);//地址列表;
						}
					}
					vm.goodsInfo = data[1][0];//商品信息;
					vm.goodsImg = data[3][0];//商品图片;
					$('#loading').remove();
				},'json');
			},
			data:{
				flag 		:'n',//普通/拍卖
				defaultAdd 	:'',//默认收货地址;
				goodsInfo	:'',//商品信息
				goodsImg	:'',//商品图片;
				addressList	:[],//收货地址列表;
				transportCost:0.00,
			},

			methods:{
				//获取并显示地址列表；
				showList:function(){
					$('#address-list-box').css({'display':'block'});
				},
				//确认付款；
				payment:function(){
					var address = MVC('Home','Pay','depAdd');
					var add = $("#add").html()+' '+ $("#phone").html() +' '+$("#nick").html();
					var price = $("#price").text();
					$.post(address,{add:add,price:price},function (data) {
						window.location.href=MVC('Home','Pay','payIndex');
					})
					
				},
				//地址列表的取消按钮 点击事件；
				close:function(){
					$('#address-list-box').css({'display':'none'});
				},
				//地址列表 新增按钮 点击事件；

			}
		});
	// },'json')
})