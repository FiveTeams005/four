
$(function () {

    //输入框自动获取焦点
    var editor = document.getElementById('send-input');
    editor.onfocus = function () {
        window.setTimeout(function () {
            var sel,range;
            if (window.getSelection && document.createRange) {
                range = document.createRange();
                range.selectNodeContents(editor);
                range.collapse(true);
                range.setEnd(editor, editor.childNodes.length);
                range.setStart(editor, editor.childNodes.length);
                sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            } else if (document.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(editor);
                range.collapse(true);
                range.select();
            }
        }, 1);
    };
    editor.focus();

    //好友列表点击切换Class
    $(".m-list").on('click','li',function () {
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    })

    //表情包
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


})