$(function () {
    //点击切换验证码
    $("#code").click(function () {
        var code = MVC('Home','Login','code');
        $("#code").attr("src",code);
    })

    //点击登录函数
    $("#submit").click(function () {
        if($("#user").val()==""  ||  $("#pwd").val()==""){
            layer.alert('输入不为空！')
        }else {
            $.ajax({
                url:MVC('Home','Login','checkCode'),
                data:{code:$("#code2").val()},
                type:'POST',
                success:function(data){
                    if(data==1){
                        $.ajax({
                            url:MVC('Home','Login','checkUser'),
                            data:{user:$("#user").val(),pwd:$("#pwd").val()},
                            type:'POST',
                            success:function(data){
                                if(data==1){
                                    layer.alert('登录成功！')
                                }else {
                                    layer.alert('密码错误！')
                                    var code = MVC('Home','Login','code');
                                    $("#code").attr("src",code);
                                }
                            }
                        })
                    }else {
                        layer.alert('验证码错误！')
                    }
                }
            })
        }

    })
    
})
