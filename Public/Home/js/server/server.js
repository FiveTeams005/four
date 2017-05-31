/*
*聊天页面脚本；
**/
$(function(){
	new Loading();
    $('#loading').remove();
	Vue.component("input-con",{
			props:['msg'],
			template:"<div>{{msg}}</div>",
			
	});
	var vm = new Vue({
		el:"#app",
		data:{
			divFlag	:false,
			btnFlag	:false,
			conn 	:"",
			msg		:[],
		},
		methods:{
			//同步显示输入内容 及 显示发送按钮；
			showBtn:function(){
				if(vm.conn != ''){
					vm.btnFlag = true;//显示按钮
					vm.divFlag = true;//显示文本内容
				}else{
					vm.btnFlag = false;//隐藏按钮
					vm.divFlag = false;//隐藏显示文本div；
				}
			},
			//输入框失焦事件；
			hideBtn:function(){
				if(vm.conn == ''){
					vm.btnFlag = false;//隐藏按钮
					vm.divFlag = false;//隐藏显示文本div；
				}
			},
			
			//表情包点击事件；
			emojiClick:function(){
				alert('biaoqingbao');
			},
			//添加图pain按钮点击事件；
			addPicClick:function(){
				alert("正在开发，敬请期待。。。");
			},
			//发送消息按钮点击事件；
			sendClick:function(){
				alert('zhengzaifasong..')
			},
			
			
		}
	});
	
})