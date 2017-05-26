/**
 * Created by lenovo on 2017/5/18.
 */

$(function(){
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
            $.post(map);
        }
    });
    //商品展示；



    //引入封装footer
    var Obottom=new showBtm(0);
    Obottom.setFather("footer")


    //分类选择传值
    var List = [];
    $(".glyphicon-th-list").click(function () {
        $(".my-classify").show();
        var classfiy = MVC('Home','Index','classfiy');
        $.post(classfiy,{},function (data) {
            for(var i=0;i<data.length;i++){
                var a = {text:data[i]['c_name'],id:data[i]['c_id']};
                List.push(a);
            }
        },'json');
    })
    Vue.component('todo-item',{
        props:['todo'],
        template:' <p class="col-xs-12" v-on:click="greet(todo.id)">{{todo.text}}</p>',
        methods:{
            greet:function(vue) {
                var classID = MVC('Home','Classify','classify');
                $.post(classID,{classID:vue},function () {
                    window.location.href = classID;
                });
            }
        }

    })

    var app1=new Vue({
        el:'#app1',
        data:{
            List: List,
        }
    })
})

//点击定位显示地图
    function map(){
        var map = MVC("Home",'Index','map');
        window.location.href = map;
    }
