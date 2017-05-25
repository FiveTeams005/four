// 个人聊天信息列表
$(function(){
	var footer = new showBtm(2);//底部
	footer.setFather('footer');
	Vue.component('todo-item',{
		props:['list'],
		template:'<div :otherId="list.otherId" :goodsId="list.goodsId" v-on:click="listSingle(list.otherId,list.goodsId)" class="col-xs-12 col-sm-12 chat-list-single">\
				<div class="row">\
					<div class="col-xs-3 col-sm-3">\
						<img :src="list.headImg" class="img-responsive img-circle">\
					</div>\
					<div class="col-xs-6 col-sm-6">\
						<p><b>{{list.username}}</b></p>\
						<span>{{list.lastMessage}}</span> | <span>{{list.lastTime}}</span>\
					</div>\
					<div class="col-xs-3 col-sm-3">\
						<img :src="list.goodsImg" class="img-responsive" >\
					</div>\
				</div>\
				<button @click.stop="delList(list.otherId)"><img src="'+path+'Home/img/xianyu/alipay_msp_close.png" class="img-responsive"></button>\
				<hr />\
			</div>',
		methods:{
			//聊天列表点击事件（跳转至聊天页面）；
			listSingle:function(uId,goodsId){
				// window.location.href = MVC('Home','Chat','chat',a,b);
				$.post(MVC('Home','Chat','getInfo'),{meId:1,otherId:uId,goodsId:goodsId},function(){
					//

				});
			},
			//删除该聊天列表；
			delList:function(uId){
				layer.open({
				    content: '确定要删除么，删除后聊天信息将不能找回'
				    ,btn: ['删除', '取消']
				    ,yes: function(index){
				    	$.post(MVC('Home','Message','delList'),{meId:1,otherId:uId},function(){

					  		layer.open({content: '执行删除操作'});

						});
				    }
				});
			},
		}

	});
	var vm = new Vue({
		el:"#content",
		data:{
			chatList:[
						{goodsId:2,otherId:12,headImg:path+'Home/img/xianyu/aliuser_place_holder.jpg',username:'username1',lastMessage:'lastMessage1',lastTime:'time1',goodsImg:path+'Home/img/images/f.jpg'},
					  	{goodsId:3,otherId:13,headImg:path+'Home/img/xianyu/aliuser_place_holder.jpg',username:'username2',lastMessage:'lastMessage2',lastTime:'time2',goodsImg:path+'Home/img/images/e.jpg'}
					 ],
		},
		
	});
})