$(function(){
	// 登录按钮点击事件
	$("#button").click(function(){
		if($("#codeIpt").val() == ""){
			layer.msg('请输入验证码！',function(){});
		}
		else{
			if($("#username").val() == "" || $("#userpwd").val() == ""){
				layer.msg('用户名或密码不能为空！',function(){});
			}
			else{
				$.ajax({
					url:url,
					type:'POST',
					data:{code:$("#codeIpt").val(),username:$("#username").val(),pwd:$("#userpwd").val()},
					success:function(data){
						if(data == 1){
							location.href = urlIndex;
						}
						else{
							layer.msg(data);
							$("#img").attr('src',urlCheck);
						}
					}
				})
			}
		}
	})
	// 验证码图片点击重新生成事件
	$("#img").click(function(){
		$(this).attr('src',urlCheck);
	})
})