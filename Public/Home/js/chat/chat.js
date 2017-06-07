
/*
*聊天页面脚本；
**/
$(function(){
	new Loading();


    //进来加载信息
    var chatDes = MVC('Home','Chat','chatDes');
    $.post(chatDes,{},function (data) {
        if(data[0][0]['h_id']==data[5]){
            $("#buy").css("display","none");
        }
        $("#nick").html(data[1][0]['h_nick']);
        $("#price").html("￥"+data[0][0]['n_price']);
        $("#img").attr("src",data[4][0]['n_img']);
    },'json');

    //加载聊天记录
    function chatLog() {
        var ChatLog = MVC('Home','Chat','ChatLog');
        $.post(ChatLog,{},function (data) {
            // console.log(data)
            $("#chat").html("");
            for(var i=0;i<data[2].length;i++){
                if(data[2][i]['f_h_id']==data[3]){
                    var a = $("\
				<div class='row q-div'>\
					<div class='q-text col-sm-10 col-xs-10'>\
						<p class='pull-right'>"+data[2][i]['l_message']+"</p><i></i>\
					</div>\
					<div class='heard_img col-sm-2 col-xs-2' style='padding-right: 0;'>\
						<img src='"+data[1][0]['h_head']+"' class='img-responsive img-circle'>\
					</div>\
				</div>")
                    $("#chat").append(a);
                }else {
                    var b = $('\
				<div class="row a-div">\
					<div class="heard_img col-sm-2 col-xs-2" style="padding-left: 0;">\
						<img src="'+data[0][0]['h_head']+'" class="img-responsive img-circle">\
					</div>\
					<div class="a-text col-sm-10 col-xs-10">\
						<i></i><p class="pull-left">'+data[2][i]['l_message']+'</p>\
					</div>\
				</div>')
                    $("#chat").append(b);
                }

            }
            $('#loading').remove();
            $("body").scrollTop($('body')[0].scrollHeight);//滚动条自动在最底部
        },'json');
    }
    chatLog();

	var vm = new Vue({
		el:"#app",
        data:{
            goodsId:'',
            userId:'',
        },
        mounted:function(){
            $.post(MVC('Home','Chat','getIdGoodsAndUser'),function(data){
                // console.log(data);
                vm.goodsId = data[0];//商品id；
                vm.userId = data[1];//登录用户id
            })
        },
		methods:{
			//同步显示输入内容 及 显示发送按钮；
			//头部更多按钮点击事件；
			moreClick:function(){
				layer.open({
					type:1,
					content:"<div class='pop-div'><p><a href='"+MVC('Home','Index','index')+"'>帮助</a></p><p><a href='"+MVC('Home','Index','index')+"'>查看对方个人主页</a></p></div>"
					,anim: 'up'
    				,style: 'position:fixed; bottom:46%; left:5%; width: 90%; height: auto; padding:10px 0; border:none;border-radius:8px;'
				});
			},
            back:function () {
              window.location.href=MVC("Home","Message","message");
            },
			//商品图片点击 显示详情事件
			goodsImgClick:function(){
				window.location.href = MVC('Home','Detail','detail');
			},
			//立即购买 按钮点击事件；
			buyClick:function(){
				window.location.href = MVC('Home','Pay','pay');
			},
			//语音按钮点击事件；
			voiceClick:function(){
				alert("正在开发，敬请期待。。。");
			},
			//添加图pain按钮点击事件；
			addPicClick:function(){
				alert("正在开发，敬请期待。。。");
			},
			//发送消息按钮点击事件；
			sendClick:function(){
				if($("#send-input").html()==''){
					layer.open({content:'输入不为空！'})
				}else {
					var send = MVC('Home','Chat','send');
					$.post(send,{chat:$("#send-input").html()},function (data) {
						chatLog();
						$("#send-input").html("");
					})
				}
			},
			//点击 商品信息跳转页面事件；
			infoClick:function(){
				$.post(MVC('Home','Chat','redirect'),{flag
                    :'n'},function(data){
                    if(data == 1){
                        window.location.href = MVC('Home','OrderDetail','orderDetail');
                    }else{

                    }
                })
			},
			//

		}
	});

	// $('#send-input').keyup(function(){
	// 	if($('.input-con').length == 1){
	// 		$('.input-con').html($('#send-input').val());

	// 	}else{
	// 		console.log($('.input-con').length);
	// 	}
	// });
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

    //聊天模块
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
        chatLog();
    });

    // 后端推送来在线数据时
    socket.on('update_online_count', function(online_stat){
        var state = MVC('Home','Chat','state');
        var user = online_stat;
        $.post(state,{user:user},function (data) {
            if(data==1){
                $("#state").html('（在线）')
            }else{
                $("#state").html('（离线）')
            }
        })
    })
})
