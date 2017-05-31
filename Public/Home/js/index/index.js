/**
 * Created by lenovo on 2017/5/18.
 */

$(function(){
    new Loading();//加载等待
    // setTimeout(function(){
    //     $('#loading').remove();
    // },1000);
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
    var componentList = {
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
    };

    var app1 = new Vue({
        el:'#app1',
        components:{
            'todo-item':componentList
        },
        data:{
            List:List,
        }
    });
    //时间差过滤器；
    Vue.filter('diffTime',function(value){
        var timestamp1 = Date.parse(new Date(new Date()));
        var timestamp2 = Date.parse(new Date(value));
        var t = timestamp1 - timestamp2;
        var d = Math.floor(t/1000/60/60/24);//天数；
        var h = Math.floor(t/1000/60/60%24);//小时；
        var m = Math.floor(t/1000/60%60);//分钟；
        d = d == 0 ? '' : d + "天";
        h = h == 0 ? '' : h + "小时";
        m = m + '分';
        return d+h+m;
        // console.log(111+":::"+d+':'+h+':'+m);
        // console.log(222+":::"+'timestamp1:'+timestamp1+" "+'timestamp2:'+timestamp2);
    });
// 商品加载；
    var signalGoods = {
        props:['goods'],
        template : `
            <div class="row signal-goods" :ng="goods.n_id" v-on:click="goodsDetail(goods.n_id)">
                <div class="col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-sm-3 col-xs-3 text-center">
                            <img :src="goods.h_head" alt="头像" class="img-responsive img-circle img-head">
                        </div>
                        <div class="col-sm-6 col-xs-6 user-info ">
                            <p>
                                <span class="nick">{{goods.h_nick == ''? '用户nick' : goods.h_nick}}</span>
                                <span class="icon">
                                    <img src="`+path+`Home/img/xianyu/person_confirmed.png" class="img-responsive">
                                </span>
                            </p>
                            <p>
                                <span class="icon">
                                    <img src="`+path+`Home/img/xianyu/items_exposure_care.png">
                                </span>
                                <span style="font-size: 11px;">已上架{{goods.n_time | diffTime}}</span>
                            </p>
                        </div>
                        <div class="col-sm-3 col-xs-3" style="padding:0;overflow:hidden;">
                            <p style="color: red">￥<span>{{goods.n_price}}</span></p>
                        </div>
                    </div>
                    <div class="row goods-img">
                        <div class="col-sm-4 col-xs-4">
                            <img :src="goods.n_img" alt="showImg1"  class="img-responsive">
                        </div>
                    </div>
                    <div clas="row">
                        <div class="col-sm-12 col-xs-12">
                            {{goods.n_name}}
                        </div>
                    </div>
                </div>
            </div> `,
        methods:{
            goodsDetail:function(key){
                alert(key)
                window.location.href = MVC('Home','Detail','detail');
            }
        },
    };
    var app2 = new Vue({
        el:'#app2',
        components:{
            'signalGoods':signalGoods
        },
        data:{
            goodsList:'',
        },
        mounted: function () {
            this.$http.post(MVC('Home','Index','loadGoods'),{},{emulateJSON:true}).then(function(res){
                this.goodsList = res.body;
                $('#loading').remove();
                console.log(this.goodsList);
            },function(res){
                console.log(res.status);
            });
        },
        methods:{
            //获取商品；
            get: function () {
                this.$http.post(MVC('Home','Index','loadGoods'),{},{emulateJSON:true}).then(function(res){
                    this.goodsList = res.body;
                    console.log(this.goodsList)  
                },function(res){
                    console.log(res.status);
                }).bind(this)
            }
        }
    });

    
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
