$(function () {
    $('#menu-wrap').on('click','nav ul li',function () {
        $(this).addClass('active').siblings().removeClass('active');
        if($(this).index() == 0){   //我的优惠券

        }else if($(this).index() == 1){     //如何获取优惠券

        }
    })
    //获取账号余额
    $.post(MVC("Home","Center","showMoney"),function (data) {
          $("#money").text(data.h_money)
    },'json')
    //用户充值
    $(".btn-money").on("click",function () {
        var money=prompt("请输入充值金额");
        if(money){
            // console.log(parseInt(money));
            $.post(MVC("Home","Center","addMoney"),{h_money:money},function (data) {
                if(data==1){
                    layer.open({
                        content: '充值成功'
                        ,btn: ['确定']
                        ,yes: function(index){
                            layer.close(index);
                            window.location.href=MVC("Home","Center","MyMoney");
                        }
                    });

                }
                else{
                    layer.open({
                        content: '充值失败'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    })
                }
            })
        }
    })
})
