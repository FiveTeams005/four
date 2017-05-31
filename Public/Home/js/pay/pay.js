// 支付页面脚本
$(function(){
	new Loading();
	$('#loading').remove();
	Vue.component('todo-item',{
		props:['list'],
		template:
				'<div class="row">\
					<div class="col-xs-12 col-sm-12" v-on:click="getAddress">\
						<p><span>名字</span>&nbsp;&nbsp<span>手机号</span></p>\
						<p>{{list}}</p>\
					</div>\
				</div>',
		methods:{
			//获取地址；
			getAddress:function(event){
				// console.log(event.currentTarget.innerHTML);
				$('#address-list-box').css({'display':'none'});
				$('.show-address-div').html(event.currentTarget.innerHTML);
			},
		}
	});
	var vm = new Vue({
		el:"#app",
		data:{
			orderInfo	:{},
			addressList	:[
				"福建省 厦门市 思明区 软件园二期 xx号楼 xx楼",
				"福建省 厦门市 思明区 软件园二期 xx号楼 xx楼",
				"北京市 朝阳区 软件园二期 xx号楼 xx楼",
				"北京市 朝阳区 软件园二期 xx号楼 xx楼",
				],
		},
		methods:{
			//显示获取地址列表；
			showList:function(){
				$('#address-list-box').css({'display':'block'});
			},
			//确认付款；
			payment:function(){
				alert(123);
			},
			//地址列表的取消按钮 点击事件；
			close:function(){
				$('#address-list-box').css({'display':'none'});
			},
			//地址列表 新增按钮 点击事件；

		}
	})
})