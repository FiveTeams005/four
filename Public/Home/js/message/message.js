// 个人聊天信息列表
$(function(){
	new Loading();
	setTimeout(function(){
        $('#loading').remove();
    },1000);

	var footer = new showBtm(2);//底部
		footer.setFather('footer');
	Vue.component('todo-item',{
		props:['list'],
		template:'<div :otherId="list.otherId" :goodsId="list.goodsId" v-on:click="listSingle(list.otherId,list.goodsId)" class="col-xs-12 col-sm-12 chat-list-single">\
				<div class="row">\
					<div class="col-xs-3 col-sm-3">\
						<img :src="list.headImg" class="img-responsive img-circle">\
					</div>\
					<div class="col-xs-6 col-sm-6" style="padding:0">\
						<p><b>{{list.username}}</b></p>\
						<span>{{list.lastMessage}}</span> | <span>{{list.lastTime}}</span>\
					</div>\
					<div class="col-xs-3 col-sm-3">\
						<img :src="list.goodsImg" class="img-responsive" >\
					</div>\
				</div>\
				<div @click.stop="delList(list.otherId,list.goodsId)" class="del-btn"><img src="'+path+'Home/img/xianyu/template_clean_icon.png" class="img-responsive"></div>\
				<hr />\
			</div>',
		methods:{
			//聊天列表点击事件（跳转至聊天页面）；
			listSingle:function(uId,goodsId){
				
				$.post(MVC('Home','Chat','getInfo'),{otherId:uId,goodsId:goodsId},function(){
					window.location.href = MVC('Home','Chat','chat');
				});
			},
			//删除该聊天列表；
			delList:function(uId,goodId){
				layer.open({
				    content: '确定要删除么，删除后聊天信息将不能找回'
				    ,btn: ['删除', '取消']
				    ,yes: function(index){
                        // $.post(MVC('Home','Message','delList'),{meId:1,otherId:uId},function(){
                        //
					  		layer.open({content: '删除成功！'});
                        //
						// });
				    }
				});
			},
		}

	});
	var chat = MVC('Home','Chat','show');
	var chatList=[];
	$.post(chat,{},function (data) {
		for(var i=0;i<data[0].length;i++){
			for(var j=0;j<data[1].length;j++){
				if(data[1][j]['h_id']==data[3]){
					if((data[1][j]['h_id']==data[0][i]['f_h_id'] || data[1][j]['h_id']==data[0][i]['t_h_id'])&&data[1][j]['h_id']==data[3]){
						if(data[1][j]['h_id']==data[0][i]['f_h_id']){
							var a = {goodsId:data[0][i]['n_id'],otherId:data[0][i]['t_h_id'],headImg:data[1][j]['h_head'],username:data[1][j]['h_nick'],lastMessage:data[0][i]['l_message'],lastTime:data[0][i]['l_time'],goodsImg:path+'Home/img/images/f.jpg'};
							chatList.push(a);
						}else {
							var a = {goodsId:data[0][i]['n_id'],otherId:data[0][i]['f_h_id'],headImg:data[1][j]['h_head'],username:data[1][j]['h_nick'],lastMessage:data[0][i]['l_message'],lastTime:data[0][i]['l_time'],goodsImg:path+'Home/img/images/f.jpg'};
							chatList.push(a);
						}

					}
				}else{
					if((data[1][j]['h_id']==data[0][i]['f_h_id'] || data[1][j]['h_id']==data[0][i]['t_h_id'])&&data[1][j]['h_id']!=data[3]){
						var a = {goodsId:data[0][i]['n_id'],otherId:data[1][j]['h_id'],headImg:data[1][j]['h_head'],username:data[1][j]['h_nick'],lastMessage:data[0][i]['l_message'],lastTime:data[0][i]['l_time'],goodsImg:path+'Home/img/images/f.jpg'};
						chatList.push(a);
					}
				}
			}

		}
	},'json')
	
	var vm = new Vue({
		el:"#content",
		data:{
			chatList:chatList,
		},
		
	});
	//气泡提示；
	var num1 = 0;
	var num2 = 0;
	if(num1 > 0){
		new BubbleTip(num1,'#Ocontainer1 a:eq(1)','-6px','77%');
	}
	if(num2 > 0){
		new BubbleTip(num2,'#Ocontainer1 a:eq(2)','-6px','77%');
	}
	

})