// 后台用户脚本

$(function(){

	var  role_list = '';//角色列表
	var vm = new Vue({
		el		:'#app',
		data	:{
			roleList : role_list,
		},
		methods :{
			//用户添加；
			addUser:function(){
				$.ajax({
					url:MVC('Admin','Role','getRole')
				});
				$('.add-user').slideToggle(200);
			},
		}
	});
});