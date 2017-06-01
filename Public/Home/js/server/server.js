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
                    $("#send-input").focus();
                    var Oimg=document.createElement('img');
                    Oimg.setAttribute('src',$(this).find('img').attr('src'));
                    insertHtmlAtCaret(Oimg);
                    $("#send-input").blur();
                    // $('#send-input').append();
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


    function insertHtmlAtCaret(childElement) {
        var sel, range;
        if (window.getSelection) {
            // IE9 and non-IE
            sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                range = sel.getRangeAt(0);
                range.deleteContents();

                var el = document.createElement("div");
                el.appendChild(childElement);
                var frag = document.createDocumentFragment(), node, lastNode;
                while ((node = el.firstChild)) {
                    lastNode = frag.appendChild(node);
                }

                range.insertNode(frag);
                if (lastNode) {
                    range = range.cloneRange();
                    range.setStartAfter(lastNode);
                    range.collapse(true);
                    sel.removeAllRanges();
                    sel.addRange(range);
                }
            }
        }
        else if (document.selection && document.selection.type != "Control") {
            // IE < 9
            //document.selection.createRange().pasteHTML(html);
        }
    }
});

