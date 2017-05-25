/**
 * Created by lenovo on 2017/5/18.
 */

$(function(){
    //获取定位；
    var a = MVC('Home','Index','aaa');
    $.ajax({
        url:a,
        type:'POST',
        success:function (data) {
            alert(data)
        }
    })

    // 轮播滑动函数
    slide();
    function slide(){
        var myElement= document.getElementById('myCarousel');
        var hm=new Hammer(myElement);
        hm.on("swipeleft",function(){
            $('#myCarousel').carousel('next');
        })
        hm.on("swiperight",function(){
            $('#myCarousel').carousel('prev');
        })
    }
    //自动轮播；每隔3秒自动轮播
    $('#myCarousel').carousel({interval:3000});
    //获取拍卖商品；
    $.post('',{},function (data){
        console.log(data);
    });    
    //导航滚动顶部置顶；
    $(window).scroll(function () {
        var menu_top = $('#menu-wrap').offset().top;
        if ($(window).scrollTop() >= menu_top) {
            $('.menu').addClass('menuFixed');
        }
        else {
            $('.menu').removeClass('menuFixed');
        }
    });
    //（新鲜的、附近的）导航点击事件；
    $('#menu-wrap').on('click','nav ul li',function () {
        $(this).addClass('active').siblings().removeClass('active');
        if($(this).index() == 0){   //新鲜的
            alert(1);
            $.post();
        }else if($(this).index() == 1){     //附近的；
            alert(2);
            $.post();
        }
    });
    //商品展示；



    //引入封装footer
    var Obottom=new showBtm(0);
    Obottom.setFather("footer")


    //分类选择传值
    $(".glyphicon-th-list").click(function () {
        $(".my-classify").show();
    })
    Vue.component('todo-item',{
        props:['todo'],
        template:' <p class="col-xs-12" v-on:click="greet(todo.text)">{{todo.text}}</p>',
        methods:{
            greet:function(vue) {
                $("#app1").hide();
            }
        }

    })
    var app1=new Vue({
        el:'#app1',
        data:{
            List:[
                {text:'男装'},
                {text:'女装'},
                {text:'童装'},
                {text:'数码'}
            ]
        }
    })
})
