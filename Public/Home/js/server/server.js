$(function(){

    /*
     *		pace:		【数字】表情弹出层淡入淡出的速度
     *		dir:		【数组】保存表情包文件夹名字
     *		text:		【二维数组】保存表情包title文字
     *		num:		【数组】保存表情包表情个数
     *		isExist:	【数组】保存表情是否加载过,对于加载过的表情包不重复请求。
     */
    var rl_exp = {
        pace:		200,
        dir:		['mr','gnl','lxh','bzmh'],
        num:		[30,30,30,30],
        isExist:	[0,0,0,0],
        bind:	function(i){
            $("#rl_bq .rl_exp_main").eq(i).find('.rl_exp_item').each(function(){
                $(this).bind('click',function(){
                    var Oimg=$("<img src="+$(this).find('img').attr('src')+">")
                    $('#send-input').append(Oimg);
                    // $('#rl_bq').fadeOut(rl_exp.pace);
                    // $('footer').removeClass('up-bottom');
                    $("#sendClick").show();
                    $("#addPicClick").hide();
                });
            });
        },
        /*加载表情包函数*/
        loadImg:function(i){
            var node = $("#rl_bq .rl_exp_main").eq(i);
            for(var j = 0; j<rl_exp.num[i];j++){
                var domStr = 	'<li class="rl_exp_item">' +
                    '<img src="' + path + 'Home/img/face/' + rl_exp.dir[i] + '/' + j + '.gif"/>' +
                    '</li>';
                $(domStr).appendTo(node);
            }
            rl_exp.isExist[i] = 1;
            rl_exp.bind(i);
        },
        /*在div里光标后面插入文字*/
        insertText:function(obj,str){
            obj.focus();
            if (document.selection) {
                var sel = document.selection.createRange();
                sel.text = str;
            } else if (typeof obj.selectionStart == 'number' && typeof obj.selectionEnd == 'number') {
                var startPos = obj.selectionStart,
                    endPos = obj.selectionEnd,
                    cursorPos = startPos,
                    tmpStr = obj.value;
                obj.value = tmpStr.substring(0, startPos) + str + tmpStr.substring(endPos, tmpStr.length);
                cursorPos += str.length;
                obj.selectionStart = obj.selectionEnd = cursorPos;
            } else {
                obj.value += str;
            }
        },
        init:function(){
            $("#rl_bq > ul.rl_exp_tab > li > a").each(function(i){
                $(this).bind('click',function(){
                    if( $(this).hasClass('selected') )
                        return;
                    if( rl_exp.isExist[i] == 0 ){
                        rl_exp.loadImg(i);
                    }
                    $("#rl_bq > ul.rl_exp_tab > li > a.selected").removeClass('selected');
                    $(this).addClass('selected');
                    $('#rl_bq .rl_selected').removeClass('rl_selected').hide();
                    $('#rl_bq .rl_exp_main').eq(i).addClass('rl_selected').show();
                });
            });
            /*绑定表情弹出按钮响应，初始化弹出默认表情。*/
            $("#emojiClick").bind('click',function(){
                if( rl_exp.isExist[0] == 0 ){
                    rl_exp.loadImg(0);
                }
                var w = $(this).position();
                $('footer').toggleClass('up-bottom');
                $('#rl_bq').slideToggle(400);
            });
            /*绑定关闭按钮*/
            $('#rl_bq a.close').bind('click',function(){
                $('#rl_bq').fadeOut(rl_exp.pace);
                $('footer').removeClass('up-bottom');
            });
            /*绑定document点击事件，对target不在rl_bq弹出框上时执行rl_bq淡出，并阻止target在弹出按钮的响应。*/
            $(document).bind('click',function(e){
                var target = $(e.target);
                if( target.closest("#emojiClick").length == 1 )
                    return;
                if( target.closest("#rl_bq").length == 0 ){
                    $('#rl_bq').fadeOut(rl_exp.pace);
                    $('footer').removeClass('up-bottom');
                }
            });
        }
    };
    rl_exp.init();	//调用初始化函数。


    //输入框判定隐藏/显示发送btn
    $('#send-input').on('keyup',function () {
        if($(this).html()==""){
            $("#sendClick").hide();
            $("#addPicClick").show();
        }
        else{
            $("#sendClick").show();
            $("#addPicClick").hide();
        }
    })

    function ChatContent() {
        var ChatContent = MVC('Home','Server','ChatContent');
        $.post(ChatContent,{},function (data) {
            $("#chat").html("");
            for(var i=0;i<data[0].length;i++){
                if(data[0][i].sta==1){
                    var a = $("<div class='row q-div'>\
                                    <div class='q-text col-sm-10 col-xs-10'>\
                                        <p class='pull-right'>"+data[0][i]['msg']+"</p><i></i>\
                                    </div>\
                                    <div class='heard_img col-sm-2 col-xs-2' style='padding: 0;'>\
                                        <img src='"+data[1][0]['h_head']+"' class='img-responsive'>\
                                    </div>\
                                </div>")
                    $("#chat").append(a);
                }else{
                    var b = $("<div class='row a-div'>\
                                    <div class='heard_img col-sm-2 col-xs-2' style='padding: 0;'>\
                                        <img src='http://eh.liuzhi66.top/Public/Home/img/xianyu/aliuser_custom_head.png' class='img-responsive'>\
                                    </div>\
                                    <div class='a-text col-sm-10 col-xs-10'>\
                                        <i></i><p class='pull-left'>"+data[0][i]['msg']+"</p>\
                                    </div>\
                            </div>")
                    $("#chat").append(b);
                }
            }
            $(document).scrollTop(999999999);
        },'json');
    }

    ChatContent();

    $("#sendClick").click(function () {
        var msg = $("#send-input").html();
        var send = MVC('Home','Server','send');
        if($("#send-input").html()==''){
            layer.open({content:'输入不为空！'})
        }else {
            $.post(send,{msg:msg},function (data) {
                ChatContent();
                $("#send-input").html("");
            })
        }
    })


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
    // 接收发送来消息时
    socket.on('new_msg', function(msg){
        ChatContent();
    });

});

