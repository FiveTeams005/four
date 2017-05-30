/*
* 商品详情；
*/

$(document).ready(function(){
	//判断登陆；


    //留言信息组件；
    Vue.component('todo-item',{
        props:['todo'],
        template:' <div class="row row-msg">' +
        '<div class="col-xs-12 col-hn">' +
        '<div class="col-xs-12 col-nick">' +
        '<img src="'+path+'Home/img/xianyu/aliuser_place_holder.jpg" class="img-circle col-img">{{todo.nick}}</div>' +
        '</div>' +
        '<div class="col-xs-12"><div class="col-xs-10 col-xs-offset-1 col-msg">{{todo.msg}}</div></div>' +
        '</div>',
    })
    var app1=new Vue({
        el:'#app1',
        data:{
            List:[
                {nick:'lz的猫',msg:'哈哈哈哈红红火火',id:'1'},
                {nick:'楚留香的狗',msg:'在嘛在嘛在嘛',id:'2'},
                {nick:'流川枫的猪',msg:'嘻嘻嘻嘻嘻',id:'3'},
                {nick:'耳边的呢喃细语',msg:'哈哈哈哈红红火火',id:'4'},
            ]
        }
    })

  //判断滚动条状态，是否滑动到底部
    function getScrollTop() {
        var scrollTop = 0;
        if (document.documentElement && document.documentElement.scrollTop) {
            scrollTop = document.documentElement.scrollTop;
        }
        else if (document.body) {
            scrollTop = document.body.scrollTop;
        }
        return scrollTop;
    }

    //获取当前可是范围的高度
    function getClientHeight() {
        var clientHeight = 0;
        if (document.body.clientHeight && document.documentElement.clientHeight) {
            clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight);
        }
        else {
            clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
        }
        return clientHeight;
    }

    //获取文档完整的高度
    function getScrollHeight() {
        return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    }
    var page=0;//page为当前页面，滚动到底部时+1；
    window.onscroll = function () {
        var yy = $(this).scrollTop();//获得滚动条top值
            $(".con-input").css({"position":"absolute",top:yy+250+"px",});
        if (getScrollTop() + getClientHeight() == getScrollHeight()) {
            page++;
            console.log(page);
            //ajax加载数据
            alert("到达底部");

        }
    };


    //点击留言按钮
    $(".l-btn").click(function () {
        $(".kb-space").hide();
        $(".con-input").show();
        $("#input-msg").focus();
    })

    var detail=MVC('home','Detail','show')
    $.post(detail,{},function (data) {
        alert(data);
    })
})//ready
	

