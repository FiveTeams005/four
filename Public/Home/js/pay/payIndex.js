$(function(){
    var price = MVC('Home','Pay','price');
    $.post(price,{},function (data) {
        $("#price").html('￥:'+data);
        $("#price2").html(data);
    })
    //出现浮动层
    $(".ljzf_but").click(function(){
        $(".ftc_wzsf").show();
    });
    //关闭浮动
    $(".close").click(function(){
        $(".ftc_wzsf").hide();
    });
    //数字显示隐藏
    $(".xiaq_tb").click(function(){
        $(".numb_box").slideUp(500);
    });
    $(".mm_box").click(function(){
        $(".numb_box").slideDown(500);
    });
    //----
    var i = 0;
    $(".nub_ggg li a").click(function(){
        i++
        if(i<6){
            $(".mm_box li").eq(i-1).addClass("mmdd");
        }else{
            $(".mm_box li").eq(i-1).addClass("mmdd");
            setTimeout(function(){
                var buy = MVC('Home','Pay','buy')
                $.post(buy,{},function (data) {
                    if(data==1){
                        layer.open({
                            content: '余额不足，请充值！'
                            ,btn: ['确定']
                            ,yes: function(index){
                                location.href=MVC("Home","Center","MyMoney");
                            }
                        });

                    }else {
                        location.href=MVC("Home","Pay","paySuccess");
                    }
                })
            },500);
        }
    });

    $(".nub_ggg li .del").click(function(){

        if(i>0){
            i--
            $(".mm_box li").eq(i).removeClass("mmdd");
            i==0;
        }
        //alert(i);
    });
})
