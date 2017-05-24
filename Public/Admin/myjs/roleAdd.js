$(function(){
	// 取消按钮点击事件
	$(".cancelBtn").click(function(){
		location.href = url+"roleList";
	})
	// 确定按钮点击事件
	$(".sureBtn").click(function(){
		if($("#name").val() == "" || $("#decribe").val() == ""){
			layer.alert('角色名称和角色描述不能为空！');
		}
		else{
			$.ajax({
				url:"authority",
				type:'POST',
				dataType:'json',
				success:function(data){
					$('body').append("<div class='cover'></div>");
					$('.cover').append("<div class='authority'><ul id='red' class='treeview-red'></ul></div>");
					for(var i = 0;i < data.length;i++){
						if(data[i].b_pid == 0){
							$("#red").append("<li><input type='checkbox' name='role' roleId='"+data[i].b_id+"'><span>"+data[i].b_name+"</span><ul id='"+data[i].b_id+"'></ul></li>");
						}
					}
					for(var i = 0;i < data.length;i++){
						if(data[i].b_pid != 0){
							$("#"+data[i].b_pid+"").append("<li><input type='checkbox' name='role' roleId='"+data[i].b_id+"'><span>"+data[i].b_name+"</span></li>");
						}
					}
					// 开启树形菜单插件功能
					$("#red").treeview({
						animated: "fast",
						collapsed: true,
						unique: true,
						persist: "cookie",
						toggle: function() {
							// window.console && console.log("%o was toggled", this);
						}
					})
					$(".authority").append("<input type='button' value='确定' class='btn btn-info btn-xs sure'><input type='button' value='取消' class='btn btn-info btn-xs cancel'>")
				}
			})
		}
	})
	// 权限管理取消按钮点击事件
	$("body").on('click','.cancel',function(){
		$(".cover").remove();
	})
	// 权限管理取消按钮点击事件
	$("body").on('click','.sure',function(){
		var ary = new Array();
		$("input[name='role']").each(function(){
			if($(this).prop("checked") == true){
				ary.push($(this).attr("roleId"));
			}
		})
		var str = ary.join(",");
		if(str == ""){
			layer.msg('请选择权限！',function(){});
		}
		else{
			$.ajax({
				url:'addRole',
				type:'POST',
				data:{authority:str,name:$("#name").val(),decribe:$("#decribe").val()},
				success:function(data){
					if(data){
						layer.alert("添加成功！",function(){
							location.href = url+"roleList";
						});
						$(".cover").remove();
					}
					else{
						layer.alert("添加失败！");
						$(".cover").remove();
					}
				}
			})
		}
	})
	// 权限一级菜单复选框点击事件
	$("body").on('click','#red>li>input',function(){
		if($(this).prop("checked") == true){
			$(this).parent().find("ul>li>input").prop("checked",true);
		}
		else{
			$(this).parent().find("ul>li>input").prop("checked",false);
		}
	})
	// 权限二级菜单复选框点击事件
	$("body").on('click','#red>li>ul>li>input',function(){
		if($(this).parent().find("input").prop("checked") == true){
			$(this).parent().parent().siblings("input").prop("checked",true);
		}
		else if($(this).parent().siblings("li").find("input").prop("checked") == false || $(this).parent().siblings("li").find("input").prop("checked") == undefined){
			$(this).parent().parent().siblings("input").prop("checked",false);
		}
	})
})