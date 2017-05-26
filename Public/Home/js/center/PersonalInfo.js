$(function () {
    //性别选择插件
    $('#sex').mobiscroll().select({
        theme: 'android-ics',
        lang:'zh',
        display: 'modal',
        minWidth: 200,
        disable:"true"
    })
    //取消修改返回上一页
    $("#cancel").on("click",function () {
        layer.open({
            content: '您确定要取消修改资料吗？'
            ,btn: ['确定', '取消']
            ,yes: function(index){
                window.history.go(-1);
            }
        });
    })
    //修改登录密码
    $(".load-pwd").on("click",function () {
        window.parent.layer.open({
            type:1,
            title:'修改登录密码',
            skin: 'layui-layer-rim', //加上边框
            area: ['600px', '510px'], //宽高
            content: '<div class="container con-load">'+
            '<div style="margin-left:15px">当前密码：<input style="width:220px" class="password" placeholder="输入当前密码"></div><br>'+
            '<div style="margin-left:30px">新密码：<input  style="width:220px" class="newpass" placeholder="输入新密码"></div><br>'+
            '<div>重复新密码：<input  style="width:220px"  class="renew" placeholder="重复新密码"></div><br>'+
            '<div class="row">' +
            '<div class="col-xs-6 text-center"><button type="button" id="btn-sub" class="btn btn-pwd">修改</button></div>' +
            '<div class="col-xs-6 text-center"><button type="button" id="btn-cancel" class="btn btn-pwd">取消</button></div>' +
            '</div></div>',
            success:function (layero,index) {

                //密码输入正则验证
                var num=0;
                $(document).on("blur",".newpass",function () {
                    var s= $.trim($(this).val());
                    var reg1=/^[0-9a-zA-Z]{4,12}$/;
                    if(s.match(reg1)){
                        num=1;
                    }
                    else if(s==""){
                        layer.open({
                            content:'密码不能为空'
                        })
                    }
                    else{
                        layer.open({
                            content:'请输入4-12位数字、英文密码'
                        })
                    }
                })
                $(document).on("blur",".renew",function () {
                    var pwd1= $.trim($(this).parent().parent().find('div').eq(1).find('input').val());
                    var pwd2= $.trim($(this).val());
                    if(pwd1==pwd2){
                        num=1;
                    }
                    else {
                        num=0;
                        layer.open({
                            content:'密码不一致'
                        })
                    }
                })
                $(document).off("click","#btn-sub").on("click","#btn-sub",function () {
                   var oldPwd=$(this).parents('.con-load').find("div").eq(0).find("input").val();
                   var newPwd=$(this).parents('.con-load').find("div").eq(1).find("input").val();
                   var subPwd=$(this).parents('.con-load').find("div").eq(2).find("input").val();
                   if(num==1&&newPwd==subPwd){
                       //ajax传值$.ajax();
                       alert(1);
                       $(this).closest('.layui-m-layer').remove();
                   }
                   else{
                       layer.open({
                           content:'新密码/确认密码格式不正确'
                       })
                   }
                })
                $(document).off("click","#btn-cancel").on("click","#btn-cancel",function () {
                   $(this).closest('.layui-m-layer').remove();
                })
            }
        })
    })
    //修改支付密码
    $(".pay-pwd").on("click",function () {
        window.parent.layer.open({
            type:1,
            title:'修改支付密码',
            skin: 'layui-layer-rim', //加上边框
            area: ['600px', '510px'], //宽高
            content: '<div class="container con-load">'+
            '<div style="margin-left:15px">当前密码：<input style="width:220px" class="password" placeholder="输入当前密码"></div><br>'+
            '<div style="margin-left:30px">新密码：<input  style="width:220px" class="newpass" placeholder="输入新密码"></div><br>'+
            '<div>重复新密码：<input  style="width:220px"  class="renew" placeholder="重复新密码"></div><br>'+
            '<div class="row">' +
            '<div class="col-xs-6 text-center"><button type="button" id="btn-sub" class="btn btn-pwd">修改</button></div>' +
            '<div class="col-xs-6 text-center"><button type="button" id="btn-cancel" class="btn btn-pwd">取消</button></div>' +
            '</div></div>',
            success:function (layero,index) {
                //密码输入正则验证
                var num=0;
                $(document).on("blur",".newpass",function () {
                    var s= $.trim($(this).val());
                    var reg1=/^[0-9a-zA-Z]{4,12}$/;
                    if(s.match(reg1)){
                        num=1;
                    }
                    else if(s==""){
                        layer.open({
                            content:'密码不能为空'
                        })
                    }
                    else{
                        layer.open({
                            content:'请输入4-12位数字、英文密码'
                        })
                    }
                })
                $(document).on("blur",".renew",function () {
                    var pwd1= $.trim($(this).parent().parent().find('div').eq(1).find('input').val());
                    var pwd2= $.trim($(this).val());
                    if(pwd1==pwd2){
                        num=1;
                    }
                    else {
                        num=0;
                        layer.open({
                            content:'密码不一致'
                        })
                    }
                })
                $(document).off("click","#btn-sub").on("click","#btn-sub",function () {
                    var oldPwd=$(this).parents('.con-load').find("div").eq(0).find("input").val();
                    var newPwd=$(this).parents('.con-load').find("div").eq(1).find("input").val();
                    var subPwd=$(this).parents('.con-load').find("div").eq(2).find("input").val();
                    if(num==1&&newPwd==subPwd){
                        //ajax传值$.ajax();
                        alert(2);
                        $(this).closest('.layui-m-layer').remove();
                    }
                    else{
                        layer.open({
                            content:'新密码/确认密码格式不正确'
                        })
                    }
                })
                $(document).off("click","#btn-cancel").on("click","#btn-cancel",function () {
                    $(this).closest('.layui-m-layer').remove();
                })
            }
        })
    })
})
