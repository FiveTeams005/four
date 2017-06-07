/**
 * Created by lenovo on 2017/5/18.
 */

$(function(){
    new Loading();//加载等待

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

   /* 商品展示；*/

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
               window.location.href = MVC('Home','Classify','classify');
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

    $("#classify").click(function () {
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
                $.post(MVC('Home','Classify','saveClassify'),{classID:vue},function (data) {
                    if(data){
                        window.location.href = classID;
                    }else{
                        layer.open({
                            content:'页面跳转失败',
                        })
                    }

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

    //拍卖商品加载；
    var app3 = new Vue({
        el: "#auction",
        data:{
            auctionGoods:[],
            imgArr:[],
        },
        mounted: function(){
             this.$http.post(MVC('Home','Index','loadAuctionGoods')).then(function(res){
                this.auctionGoods = res.body[0];
                this.imgArr = res.body[1];
                $('#loading').remove();
            },function(res){
                console.log(res.status);
            });
        },
        computed: {
            resivedGoods:function(){
                for(let j = 0; j < this.auctionGoods.length;j++){
                    for(let i=0; i < this.imgArr.length; i ++){
                        if(this.imgArr[i].p_id == this.auctionGoods[j].p_id){
                            this.auctionGoods[j]['img'] = this.imgArr[i].n_img;
                            break;
                        }
                    }
                }
                 return this.auctionGoods;
            }

        },
        methods: {
            //点击商品跳转详情页；
            goodsDetail:function(key){
                this.$http.post(MVC('Home','Detail','saveInfo'),{goods_flag:'p',goods_id:key},{emulateJSON:true}).then(function(res){
                    if(res.body){
                        window.location.href = MVC('Home','Detail','detail');
                    }else{
                        layer.open({
                            content:'页面跳转失败',
                        });
                    }
                },function(res){
                    console.log(res.status);
                });
            },
            //图片显示；
            showImg:function(arr,goodsIndex){
                var resArr = [];
                for(let i=0; i < arr.length; i ++){
                    if(arr[i].n_id == goodsIndex ){
                        resArr.push(arr[i]);
                    }
                    if(resArr.length >= 1) break;
                }
                return resArr;
            }
            //点击更多跳转分类页；

        }

    });
    //时间差过滤器；
    Vue.filter('diffTime',function(value){
        value=value.replace(/-/g, '/');     //兼容IOS;
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

    });
// 商品加载；
    var signalGoods = {
        props:['goods','imgs'],
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
                        <div class="col-sm-4 col-xs-4" v-for="val in showImg(imgs,goods.n_id)">
                            <img :src="val.n_img" alt="showImg1"  class="img-responsive">
                        </div>
                    </div>
                    <div clas="row">
                        <div class="col-sm-12 col-xs-12">
                            {{goods.n_name}}
                        </div>
                   </div>
                </div>
            </div> `,
        data: function () {
                return {

                }
        },
        methods:{
            //点击商品跳转详情页;
            goodsDetail:function(key){

                this.$http.post(MVC('Home','Detail','saveInfo'),{goods_flag:'n',goods_id:key},{emulateJSON:true}).then(function(res){
                    if(res.body){
                        window.location.href = MVC('Home','Detail','detail');
                    }else{
                        layer.open({
                            content:'页面跳转失败',
                        });
                    }
                },function(res){
                    console.log(res.status);
                });


            },
            //判断图片显示；
            showImg:function(arr,goodsIndex){
                var resArr = [];
                for(let i=0; i < arr.length; i ++){
                    if(arr[i].n_id == goodsIndex ){
                        resArr.push(arr[i]);
                    }
                    if(resArr.length >= 3) break;
                }
                return resArr;
            }
        },
    };
    var app2 = new Vue({
        el:'#app2',
        components:{
            'signalGoods':signalGoods
        },
        data:{
            loadState:0,//加载商品状态;
            isActive:true,
            goodsList:[],
            imgArr: [],
            flag : 0,//默认新鲜的,1为附近的;
            currentPage:1,//加载(新鲜的)的当前页

        },
        mounted: function () {
            // flag 0新鲜的 1附近的;
            this.$http.post(MVC('Home','Index','loadGoods'),{flag:0},{emulateJSON:true}).then(function(res){
                this.currentPage++;
                this.goodsList = res.body[0];
                this.imgArr = res.body[1];
                $('#loading').remove();
            },function(res){
                console.log(res.status);
            });
             //监听滚动事件；
              this.$nextTick(function () {
                window.addEventListener('scroll', this.scrollEvent)
              })
        },
        methods:{
            //点击标题获取相应商品；
            get: function () {
                var index = event.currentTarget.getAttribute('flag');
                app2.flag = index;
                app2.currentPage = 1;
                if(index == 0){
                    app2.isActive = true;
                }else{
                    app2.isActive = false;
                }
                //获取数据;
                this.$http.post(MVC('Home','Index','loadGoods'),{flag:index},{emulateJSON:true}).then(function(res){
                    this.currentPage++;
                    if(res.body[0]) {
                        this.goodsList = res.body[0];
                        this.imgArr = res.body[1];
                    }
                },function(res){
                    console.log(res.status);
                }).bind(this)


            },
            //滚动事件;
            scrollEvent:function(){
                this.loadState = 1;
                if (getScrollTop() + getClientHeight() == getScrollHeight()) {
                    this.$http.post(MVC('Home','Index','loadGoods'),{flag:this.index,page:this.currentPage},{emulateJSON:true}).then(function(res){

                        if(res.body[0].length > 0) {
                            this.loadState = 0;
                            // console.log(res.body[0])
                            this.goodsList = this.goodsList.concat(res.body[0]);//对商品列表重新赋值,不然视图不会更新;
                            this.imgArr=res.body[1];
                            this.currentPage++;
                        }else{
                            this.loadState = 2;
                        }
                    },function(res){
                        console.log(res.status);
                    }).bind(this)

                }
            }
        }
    });

    //气泡提示函数
    function Prompt(){
        var num1;
        var num2;
        var Prompt = MVC('Home','Index','prompt');
        $.post(Prompt,{},function (data) {
            if(data[0]==''){
                num2=0;
            }else {
                num2 = data[0].length;
            }

            if(data[1]==''){
                num1=0;
            }else {
                num1 = data[1].length;
            }
            if(num1 > 0){
                new BubbleTip(num1,'#Ocontainer1 a:eq(1)','-6px','77%');
            }
            if(num2 > 0){
                new BubbleTip(num2,'#Ocontainer1 a:eq(2)','-6px','77%');
            }
        },'json')
    }
    Prompt();

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
        Prompt();
    });

})
//点击定位显示地图
    function map(){
        var map = MVC("Home",'Index','map');
        window.location.href = map;
    }
