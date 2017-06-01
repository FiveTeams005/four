/*
* 商品详情；
*/

$(document).ready(function(){

	new Loading();

var g_flag = '';
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

    });
  var bus = new Vue();//中转组件;
        //头部组件；
        var header = new Vue({
          el:'header',
          data:{
            flag : false,
            userInfo:'',
            bTime:'',//拍卖开始时间；
            eTime:'',//拍卖结束时间；
            timeStr: '',
          },
          mounted:function(){
            bus.$on('info',function(res){
              header.userInfo = res;
              header.bTime = res.bTime;
              header.eTime = res.eTime;
            });
            let time = setInterval(()=>{
              if(this.flag == true){
                  clearInterval(time);
              }
              this.timeDown();
            },500)

          },
          methods:{
            timeDown () {
              const nowTime   = new Date();
              const beginTime = new Date(this.userInfo.bTime);
              const endTime   = new Date(this.userInfo.eTime);
              var leftTime = '';
              var title = '';
              if(beginTime.getTime() > nowTime.getTime()){
                title = '距拍卖开始';
                leftTime = parseInt((nowTime.getTime()-beginTime.getTime())/1000);
              }else if(beginTime.getTime() <= nowTime.getTime() && endTime.getTime() >= nowTime.getTime()){
                title = '距拍卖结束';
                leftTime = parseInt((endTime.getTime() - nowTime.getTime())/1000);
              }else{
                title = '拍卖结束';
                leftTime = '';
              }
              // let d = parseInt(leftTime/(24*60*60))
              let h = this.formate(parseInt(leftTime/(60*60)%24))
              let m = this.formate(parseInt(leftTime/60%60))
              let s = this.formate(parseInt(leftTime%60))
              if(leftTime <= 0){
                  this.flag = true
              }
              header.timeStr = `${title}:${h}小时${m}分${s}秒`;
            },
            formate (time) {
              if(time>=10){
                  return time
              }else{
                  return `0${time}`
              }
            },
          }
        });
        //中间组件；
        var content = new Vue({
          el:'#content',
          data:{
            addPrice:false,//显示加价按钮；
            goodsInfo:'',
            imgs:'',
          },
          beforeCreate:function(){
            $.post(MVC('Home','Detail','getInfo'),function(data){
                var sellInfo = '';
                g_flag = data[0];
                if(data[0] == 'p'){
                  // content.timeShow = true;
                  content.addPrice = true;
                  sellInfo= {
                    type:data[0],
                    head:data[1][0].h_head,
                    nick:data[1][0].h_nick,
                    price:data[1][0].p_bprice,
                    time:data[1][0].p_time,
                    info:data[1][0].p_info,
                    bTime:data[1][0].p_btime,
                    eTime:data[1][0].p_etime,
                  }
                }else{
                  // content.timeShow = false;
                  content.addPrice = false;
                  sellInfo= {
                    type:data[0],
                    head:data[1][0].h_head,
                    nick:data[1][0].h_nick,
                    price:data[1][0].n_price,
                    time:data[1][0].n_time,
                    info:data[1][0].n_info,
                  }
                }
                console.log(sellInfo);
                bus.$emit('info',sellInfo);
                content.goodsInfo = sellInfo;
                content.imgs = data[2];


                console.log(data);
                $('#loading').remove();
            })
          },
          methods:{
            

          }
        })

	//判断登陆;


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
        },

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

    alert(g_flag);
    //点击留言按钮
    $("footer").on("click",".l-btn",function () {
       $("footer").html("");
       var div1='<div class="container-fluit">' +
           '<div class="row text-center">' +
           '<div class="col-xs-8 want-input"><input type="text" class="form-control msg-input" placeholder="我想说点啥">' +
           '</div><div class="col-xs-4  want-btn" rel="0">发 送</div></div></div>'
        $("footer").append(div1);
       $("footer").find('input').focus();
    });
    $("footer").on("blur",".want-input",function () {
        $("footer").html("");
        var div2='<div class="container-fluit"><div class="row text-center">' +
            '<div class="col-xs-2 col-sm-2 text-right l-btn">' +
            '<img src="'+path+'Home/img/xianyu/comment.png" class="img-responsive"><br>' +
            '<span>留言&nbsp;</span></div>' +
            '<div class="col-xs-2 col-sm-2 text-center z-btn">' +
            '<img src="'+path+'Home/img/xianyu/love_gray.png" class="img-responsive"><br>' +
            '<span>点赞</span></div><div class="col-xs-4 col-sm-4 auction-btn"></div>' +
            '<div class="col-xs-4 col-sm-4 want-btn" rel="1">我 想 要</div></div></div>'
        $('footer').append(div2);
    })
   $('footer').on("click",".want-btn",function () {
       // 点击发送留言按钮
       if($(this).attr("rel")==0){
           $("footer").html("");
           var div2='<div class="container-fluit"><div class="row text-center">' +
               '<div class="col-xs-2 col-sm-2 text-right l-btn">' +
               '<img src="'+path+'Home/img/xianyu/comment.png" class="img-responsive"><br>' +
               '<span>留言&nbsp;</span></div>' +
               '<div class="col-xs-2 col-sm-2 text-center z-btn">' +
               '<img src="'+path+'Home/img/xianyu/love_gray.png" class="img-responsive"><br>' +
               '<span>点赞</span></div><div class="col-xs-4 col-sm-4 auction-btn"></div>' +
               '<div class="col-xs-4 col-sm-4 want-btn" rel="1">我 想 要</div></div></div>'
           $('footer').append(div2);
       }
       // 点击我想要按钮
       else if($(this).attr("rel")==1){
           window.location.href=MVC('Home','Chat','chat');
       }
   })

   
})//ready

	

