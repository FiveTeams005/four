/**
 * Created by Administrator on 2017/6/2 0002.
 */
$(function () {
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
    socket.on('new_msg', function(msg){
        // alert(msg);
    });
    // 后端推送来在线数据时
    socket.on('update_online_count', function(online_stat){
        // alert(online_stat);
    });

    $("#send").click(function(){
        var b=MVC('Home','index','msg');
        $.post(b,{id:$("#b").text(),con:$("#msg").val()},function (data) {
            alert(data);
        })
        var a =$("#msg").val()
        $("#show").append(a);
        $("#msg").val("");
    })
})