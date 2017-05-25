$(function(){
	// 权限管理点击事件
	var r_id;
	$("tbody").on('click','.authorityBtn',function(){
		r_id = $(this).attr("roleId");
		$.ajax({
			url:url+"authority",
			type:'POST',
			data:{roleId:r_id},
			dataType:'json',
			success:function(data){
				$('body').append("<div class='cover'></div>");
				$('.cover').append("<div class='authority'><ul id='red' class='treeview-red'></ul></div>");
				for(var i = 0;i < data[1].length;i++){
					if(data[1][i].b_pid == 0){
						$("#red").append("<li><input type='checkbox' name='role' roleId='"+data[1][i].b_id+"'><span>"+data[1][i].b_name+"</span><ul id='"+data[1][i].b_id+"'></ul></li>");
					}
				}
				for(var i = 0;i < data[1].length;i++){
					if(data[1][i].b_pid != 0){
						$("#"+data[1][i].b_pid+"").append("<li><input type='checkbox' name='role' roleId='"+data[1][i].b_id+"'><span>"+data[1][i].b_name+"</span></li>");
					}
				}
				for(var i = 0;i < data[0].length;i++){
					$("input[roleId='"+data[0][i]+"']").attr("checked","checked");
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
	})
	// 权限管理取消按钮点击事件
	$("body").on('click','.cancel',function(){
		$(".cover").remove();
	})
	// 权限管理确定按钮点击事件
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
				url:url+'updateAuthority',
				type:'POST',
				data:{authority:str,id:r_id},
				success:function(data){
					if(data){
						layer.alert("修改成功！");
						$(".cover").remove();
					}
					else{
						layer.alert("修改失败！");
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
	// 添加新角色按钮点击事件
	$(".addRole").click(function(){
		location.href = url+"addRole";
	})
	// 删除按钮点击事件
	$("tbody").on('click','.delete',function(){
		var r_id = $(this).siblings('.authorityBtn').attr('roleId');
		layer.msg('确定删除？', {
			time: 0 //不自动关闭
			,btn: ['确定', '取消']
			,yes: function(index){
		    	layer.close(index);
		    	$.ajax({
		    		url:url+'deleteRole',
		    		type:'POST',
		    		data:{r_id:r_id},
		    		success:function(data){
		    			layer.alert(data,{
		    				time:0,
		    				btn: ['确定'],
		    				yes:function(index){
		    					layer.close(index);
		    					if(data == '删除角色成功！'){
		    						location.href = url+'roleList';
		    					}
		    				}
		    			})
		    		}
		    	})
		  	}
		});
	})
	// 分页居中样式
	$("#pageBox>div").css("margin-left",(parseFloat($("#pageBox>div").css("width"))/-2)+"px");
})