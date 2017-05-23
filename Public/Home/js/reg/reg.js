// 注册脚本

    $(function() {
        // 手机验证
        // 手机号码验证
        var telReg=/^1[3|4|5|8][0-9]\d{8}$/;
        $('#tel').blur(function(){
            if($(this).val() == ''){
                $('.telInfo').html('<i class="cuo"></i> 手机号不能为空');
            }else if(!$(this).val().match(telReg)){
                $('.telInfo').html('<i class="cuo"></i> 输的手机号不符合规范');
            }else{
                $.post('url',{account:$(this).val()},function(data){
                    if(data){
                        $('.telInfo').html('<i class="right"></i>OK!');
                    }
                });
            }
        });
        //下一步按钮；
        $('.code-header button').click(function(){
            window.location.href = "reg";
        });
        //获取验证码；
        $('#tel-verify-btn').click(function(){
            var countdown=60; 
            function settime() { 
                countdown--;
                n = countdown;
                if(countdown >= 0 && countdown < 10){
                    n = "0" + countdown;
                }
                if (countdown < 0) { 
                    $('#tel-verify-btn').attr("disabled",false);
                    $('#tel-verify-btn').css('background-color',"");    
                    $('#tel-verify-btn').val("免费获取验证码"); 
                    countdown = 60;
                    return;
                } else {
                    $('#tel-verify-btn').attr("disabled", true);
                    $('#tel-verify-btn').css('background-color',"#ddd");
                    $('#tel-verify-btn').val(n+"后重新发送"); 
                } 
                setTimeout(function(){settime();},1000);
            }
            setTimeout(function(){settime();},1000);
        });

        //账号密码脚本；
        var accReg=/^[a-zA-Z]{1}[0-9a-zA-Z\_]{4,24}$/;
        var pwdReg=/^[0-9a-zA-Z]{4,12}$/;

        $('#account').focus(function(){
            $('.accInfo').css("display","inline-block");
            $('.accInfo').html('<i class="warn"></i> 5-25个字符,首字符为字母.');
        });
        /*$('#account').keyup(function(){
            count.style.visibility="visible";
            name_length=getLength(this.value);
            count.innerHTML=name_length+"个字符";
            if(name_length==0){
                count.style.visibility="hidden";
            }
        });*/
        $('#account').blur(function(){
            if($(this).val() == ''){
                $('.accInfo').html('<i class="cuo"></i>不能为空');
            }else if(!$(this).val().match(accReg)){
                $('.accInfo').html('<i class="cuo"></i>输入内容不符合规范');
            }else{
                $.post('url',{account:$(this).val()},function(data){
                    if(data){
                        $('.accInfo').html('<i class="right"></i>OK!');
                    }
                });
            }
        });

        $('#pwd').focus(function(){
            $('.pwdInfo').css("display","inline-block");
            $('.pwdInfo').html('<i class="warn"></i> 6-16个字符，请使用字母、数字、下划线.');
        });
        $('#pwd').keyup(function(){
            var len = $(this).val().length;
            if(len >= 0 && len <= 5){
                $("#pwd1").attr("disabled","disabled");
                $('.pwd1Info').css('display',"");
                $("#pwd1").val('');
                $('.strong p span').eq(0).attr("class","hover").siblings().removeAttr('class');
            }else if(len > 5){
                $("#pwd1").removeAttr("disabled");
                if(len > 5 && len <=11){
                    $('.strong p span').eq(2).removeAttr('class').siblings().attr("class","active");
                }else if(len > 11){
                    $('.strong p span').attr("class","active1");
                }
            }else{
                
            }
            // if($(this).val().length > 0){
            //     $('.strong p span').eq(0).attr("class","hover");
            // }else if($(this).val().length >= 8){
            //     alert(2)
            //     $('.strong p span').eq(1).attr("class","active");
            // }else if($(this).val().length > 12){ 
            //     $('.strong p span').attr("class","active1");
            // }else{
            //     $('.f1').attr("class","f1");
            //     $("#pwd1").val('');
            // }

        });
        $('#pwd').blur(function(){
            if($(this).val() == ""){
                $('.pwdInfo').html('<i class="cuo"></i> 不能为空');
            }else if(!$(this).val().match(pwdReg)){
                $('.pwdInfo').html('<i class="cuo"></i> 输入内容不符合规范');
            }else{
                $('.pwdInfo').html('<i class="right"></i> OK');
                $('.pwd1Info').css('display',"inline-block");
                $('.pwd1Info').html('<i class="warn"></i> 再输入一次');
            }
        })

        $('#pwd1').blur(function(){
            if($(this).val()!=$('#pwd').val()){
                $('.pwd1Info').html('<i class="warn"></i> 两次输入的密码不一致');
            }else{
                $('.pwd1Info').html('<i class="right"></i> OK');
            }
        });
        

});
