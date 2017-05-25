$(function(){
	// 取消按钮点击事件
	$(".cancel").click(function(){
		location.href = url;
	})
	// 添加按钮点击事件
	$(".add").click(function(){
		if($("#roleid").val() == "" || $("#account").val() == "" || $("#pwd").val() == ""){
			layer.msg("请将必要信息填写完整！");
		}
		else{
			$.ajax({
				url:urlAdd,
				type:'POST',
				data:{account:$("#account").val(),pwd:$("#pwd").val(),nick:$("#nick").val(),roleid:$("#roleid option:selected").val()},
				success:function(data){
					layer.alert(data.info,{
						time:0,
						btn: ['确定'],
						yes: function(index){
							layer.close(index);
							if(data.info == "添加成功！"){
								location.href = url;
							}
						}
					});

				}
			})
		}
	})
})