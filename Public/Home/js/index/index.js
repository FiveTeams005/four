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
    /*$.post('',{},function (data){
        console.log(data);
    }); */   
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

    //头部搜索；
    $('#sch-input').keyup(function(){//输入内容时；
        var val = $(this).val();
        $('.search-info .show-val').text(val);
        if(val != ''){
            $('.search-info').slideDown(200);
        }else{
            $('.search-info').slideUp(200);
        }
       
    });
    //点击搜索按钮时；
    $('#sec-btn').click(function(){
       if($('#sch-input').val() != ''){
            $('.search-info').slideUp(200);
            $.post(MVC('Home','Index','searchGoods'),{goodsname:$('#sch-input').val()},function(data){
                   if(data){
                       window.location.href = "index.php?p=Home&c=Classify&a=classify&name="+$('.search-info').slideUp(200);;
                   }else{
                       // alert('搜索的'+this.v+'不存在');
                       layer.open({
                           content:'搜索的'+$('#sch-input').val()+'不存在',
                       });
                   }
            });
       }
    });
    //搜索商品；
    $('.search-info .row:eq(0)').click(function(){
        $('.search-info').slideUp(200);
        $.post(MVC('Home','Index','searchGoods'),{goodsname:$('#sch-input').val()},function(data){
           if(data){
               window.location.href = "index.php?p=Home&c=Classify&a=classify&name="+$('#sch-input').val();
           }else{
               // alert('搜索的'+this.v+'不存在');
               layer.open({
                   content:'搜索的'+$('#sch-input').val()+'不存在',
               });
           }
        });
    });
    //搜索用户
    $('.search-info .row:eq(1)').click(function(){
        $('.search-info').slideUp(200);
        $.post(MVC('Home','Index','schUser'),{username:$('#sch-input').val()},function(data){
           if(data){
               window.location.href = '';
           }else{
               // alert('搜索的'+this.v+'不存在');
               layer.open({
                   content:'搜索的'+$('#sch-input').val()+'用户不存在',
               });
           }
        });
    });

    //引入封装footer
    var Obottom=new showBtm(0);
    Obottom.setFather("footer");



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

    });
//分类列表；
    var componentList = Vue.extend({
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
    });

    var app1 = new Vue({
        el:'#app1',
        components:{
            'todo-item':componentList
        },
        data:{
            List:List,
        }
    });

    
    // var header = new Vue({
    //     el:'#header',
    //     data:{
    //         hideDiv :false,
    //         v       :'',//输入框的值；
    //     },
        
    //     methods:{
    //         //输入框有值时，显示相关div；
    //         showDiv:function(){
    //             if(this.v !== ''){
    //                 this.hideDiv = true;
    //             }
    //         },
    //         //点击搜索商品；
    //         searchGoods:function(){
    //             if(this.v != ''){
    //                 this.hideDiv = false;
    //                 $.post(MVC('Home','Index','searchGoods'),{goodsname:this.v},function(data){
    //                     if(data){
    //                         window.location.href = "index.php?p=Home&c=Classify&a=classify&name="+header.v;
    //                     }else{
    //                         // alert('搜索的'+this.v+'不存在');
    //                         layer.open({
    //                             content:'搜索的'+header.v+'不存在',
    //                         });
    //                     }
    //                 });
    //             }
    //         },
    //         //点击搜索用户；
    //         searchUser:function(){
    //             if(this.v != ''){
    //                 this.hideDiv = false;
    //                 $.post(MVC('Home','Index','schUser'),{username:this.v},function(data){
    //                     if(data){
    //                         window.location.href = '';
    //                     }else{
    //                         layer.open({
    //                             content:'搜索的'+header.v+'用户不存在',
    //                         });
    //                     }
    //                 });
    //             }
    //         },
    //     },

    // });
    //气泡提示；
    var num1 = 10;
    var num2 = 6;
    if(num1 > 0){
        new BubbleTip(num1,'#Ocontainer1 a:eq(1)','-6px','77%');
    }
    if(num2 > 0){
        new BubbleTip(num2,'#Ocontainer1 a:eq(2)','-6px','77%');
    }
})
//点击定位显示地图
    function map(){
        var map = MVC("Home",'Index','map');
        window.location.href = map;
    }
