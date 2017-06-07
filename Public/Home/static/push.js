/**
 * Created by Administrator on 2017/6/5 0005.
 */
$(function(){


    var userid = MVC('Home','index','userid');
    var uid;
    $.ajax({
        url:userid,
        type:'POST',
        async:false,
        success:function (data) {
            uid = data;
        }
    })
    //连接服务端
    var socket = io('http://'+document.domain+':2120');
    // 连接后登录
    socket.on('connect', function(){
        socket.emit('login', uid);
    });
    // 后端推送来消息时
    socket.on('push', function(data){
        // 广告推送
        var position = 3;
        var msg=path+"Home/img/images/a.jpg";
        var effect="lightSpeedIn";
            Notification.create(
                // Text
                "二货有精品商品推荐哦，查看详情！",
                // Illustration
                msg,
                // Effect
                effect,
                // Position
                position,
                //商品id
                data
            );
    });


    $("body").on("click",".dismiss",function () {
        $(this).parent().remove();
    })


    $("body").on("click",".push",function () {
        var n_id = $(this).attr('rel')
        var push = MVC('Home','Detail','push');
        $.post(push,{id:n_id},function (data) {
            window.location.href = MVC('Home','Detail','detail');
        })
    })
    
    
    
    
    
})