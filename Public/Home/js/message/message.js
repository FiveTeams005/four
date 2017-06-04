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
						<span>{{list.lastMessage}}</span> | <span>{{list.lastTime}}条</span>\
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
				var a = uId;
				var b = goodId;
				layer.open({
				    content: '确定要删除么，删除后聊天信息将不能找回'
				    ,btn: ['删除', '取消']
				    ,yes: function(index){
                        $.post(MVC('Home','Message','delList'),{goodsid:b,otherId:a},function(){
					  		layer.open({content: '删除成功！'});
							window.location.reload();
						});
				    }
				});
			},
		}

	});
	var chat = MVC('Home','Chat','show');
	var chatList=[];
	$.post(chat,{},function (data) {
		for(var i=0;i<data[0].length;i++){
			var len = 0;
			for(var j=0;j<data[3].length;j++){
				if(data[3][j]['t_h_id']==data[2]&&data[3][j]['n_id']==data[0][i]['n_id']&&data[3][j]['l_status']==2){
					len++;
				}
			}

			for(var k=0;k<data[1].length;k++){
				if(data[0][i]['h_id2']==data[1][k]['h_id']&&data[0][i]['h_id2']!=data[2]){
					var a = {goodsId:data[0][i]['n_id'],otherId:data[0][i]['h_id2'],headImg:data[1][k]['h_head'],username:data[1][k]['h_nick'],lastMessage:'未读消息',lastTime:len};
					chatList.push(a);
				}
				if(data[0][i]['h_id1']==data[1][k]['h_id']&&data[0][i]['h_id2']==data[2]){
					var a = {goodsId:data[0][i]['n_id'],otherId:data[0][i]['h_id1'],headImg:data[1][k]['h_head'],username:data[1][k]['h_nick'],lastMessage:'未读消息',lastTime:len};
					chatList.push(a);
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
	//气泡提示函数
	function Prompt(){
		var num1;
		var num2;
		var Prompt = MVC('Home','Index','prompt');
		$.post(Prompt,{},function (data) {
			if(data[0]==''){
				num2=0;
			}else {
				num2 = data[0].length;
			}

			if(data[1]==''){
				num1=0;
			}else {
				num1 = data[1].length;
			}
			if(num1 > 0){
				new BubbleTip(num1,'#Ocontainer1 a:eq(1)','-6px','77%');
			}
			if(num2 > 0){
				new BubbleTip(num2,'#Ocontainer1 a:eq(2)','-6px','77%');
			}
		},'json')
	}
	Prompt();

	var userid = MVC('Home','index','userid');
	var uid;
	$.ajax({
		url:userid,
		type:'POST',
		async:false,
		success:function (data) {
			uid = data;
		}
	})
	//连接服务端
	var socket = io('http://'+document.domain+':2120');
	// 连接后登录
	socket.on('connect', function(){
		socket.emit('login', uid);
	});
	// 接收发送来消息时
	socket.on('new_msg', function(msg){
		Prompt();
		//一进来气泡清零
		var zero = 	MVC('Home','Message','zero');
		$.post(zero,{},function () {

		})
	});


	//一进来气泡清零
	var zero = 	MVC('Home','Message','zero');
	$.post(zero,{},function () {

	})

})