// 订单详情页 脚本
$(function(){
	var vm = new Vue({
		el:"#content",
		data:{
			orderInfo:'',
			img:'',
			goodsFlag:'n',
		},
		mounted:function(){
			$.post(MVC('Home','OrderDetail','getInfo'),function(data){
				vm.orderInfo = data[0][0];
				vm.img = data[1][0];
				vm.goodsFlag = data[2];
			})
		},
		methods:{
			//评价按钮 点击时间；
			appraise:function(){
				if(this.orderInfo.o_status==5){
					layer.open({
						content:'努力开发中...',
					})
				}
			},
			//确认收货按钮
			sonfirmGoods:function(){
				layer.open({
					content:'确认要收货么',
				})
			},
			//去付款按钮 点击事件(把订单id 存入cookie（'orderId'）)；
			goToPay:function(orderId){

				$.post(MVC('Home','OrderDetail','saveOrderId'),{orderId:orderId},function(data){
					if(data == 1){
						window.location.href = MVC('Home','Pay','pay');
					}else{
						layer.open({
							content:'页面跳转失败。。。',
						})
					}
				})
				
			},
			//联系卖家；
			contactSeller:function(){
				window.location.href = MVC('Home','Chat','chat');
			}
		}
	})
})