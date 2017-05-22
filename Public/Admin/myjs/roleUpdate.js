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
				url:"updateRole",
				type:'POST',
				data:{id:$("input[type='hidden']").val(),name:$("#name").val(),decribe:$("#decribe").val()},
				success:function(data){
					if(data){
						layer.alert('修改成功！',function(){
							location.href = url+"roleList";
						});
					}
					else{
						layer.alert('修改失败！');
					}
				}
			})
		}
	})
})