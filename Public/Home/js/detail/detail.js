/*
* 商品详情；
*/

$(document).ready(function(){

	new Loading();


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
          header.timeStr = title;
        }else{
          header.timeStr = `${title}:${h}小时${m}分${s}秒`;
        }
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
      addPrice  :false,//显示加价按钮；
      goodsInfo :'',
      imgs      :'',
      
    },
    mounted:function(){
      $.post(MVC('Home','Detail','getInfo'),function(data){
          var sellInfo = '';
          var g_id = '';
          g_flag = data[0];
          if(data[0] == 'p'){
            // content.timeShow = true;
            content.addPrice = true;
            g_id = data[1][0].p_id;
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
            g_id = data[1][0].n_id;
            sellInfo= {
              type:data[0],
              head:data[1][0].h_head,
              nick:data[1][0].h_nick,
              price:data[1][0].n_price,
              time:data[1][0].n_time,
              info:data[1][0].n_info,
            }
          }
          bus.$emit('info',sellInfo);//发送信息给头部组件；
          bus.$emit('footerInfo',[g_id,g_flag]);//发送商品id、商品类型 给脚部组件；
          content.goodsInfo = sellInfo;
          content.imgs = data[2];
          // console.log(data);
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
        '<div class="col-xs-12 col-nick" :user-id="todo.h_id">' +
        '<img :src="todo.h_head" class="img-circle col-img">{{todo.h_nick}}</div>' +
        '</div>' +
        '<div class="col-xs-12"><div class="col-xs-10 col-xs-offset-1 col-msg">{{todo.m_message}}</div></div>' +
        '</div>',
    })
    var app1=new Vue({
        el:'#app1',
        data:{
            page      :1,//当前页;
            goodsFlag :'',
            goodsId   :'',
            List:[
                {nick:'lz的猫',msg:'哈哈哈哈红红火火',id:'1'},
                {nick:'楚留香的狗',msg:'在嘛在嘛在嘛',id:'2'},
                {nick:'流川枫的猪',msg:'嘻嘻嘻嘻嘻',id:'3'},
                {nick:'耳边的呢喃细语',msg:'哈哈哈哈红红火火',id:'4'},
            ]
        },
        mounted:function(){
          //接收发送过来的商品信息（id、类型）；
          bus.$on('footerInfo',function(res){
            app1.goodsId = res[0];
            app1.goodsFlag =res[1];
            $.post(MVC('Home','Detail','getLeaveMsg'),{goodsId:app1.goodsId,goodsFlag:app1.goodsFlag},function(data){
              app1.List = data;
            })
          });
          //
          bus.$on('pushMsg',function(res){
            var msg = res;
            $.post(MVC('Home','Detail','getSelfInfo'),function(data){
              var obj = {
                h_id:data[0].h_id,
                h_head:data[0].h_head,
                h_nick:data[0].h_nick,
                m_message:msg,
                m_time:'',
              }
              app1.List.unshift(obj);
            })
          });
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
            // alert("到达底部");

        }
    };


    //脚部组件；
    var componentA = {
      props:['isP','id'],
      template:'<div class="container-fluit"><div class="row text-center">' +
            '<div class="col-xs-2 col-sm-2 text-right l-btn" @click="leaveMsg">' +
            '<img src="'+path+'Home/img/xianyu/comment.png" class="img-responsive"><br>' +
            '<span>留言&nbsp;</span></div>' +
            '<div class="col-xs-2 col-sm-2 text-center z-btn">' +
            '<img src="'+path+'Home/img/xianyu/love_gray.png" class="img-responsive"><br>' +
            '<span>点赞</span></div><div class="col-xs-4 col-sm-4 auction-btn" v-if="type(isP)">出 个 价</div>' +
            '<div class="col-xs-4 col-sm-4" v-else></div>'+
            '<div class="col-xs-4 col-sm-4 want-btn" @click="wantBtn">我 想 要</div></div></div>',
      methods:{
        //商品类型；
        type:function(val){
            if(val == 'p'){
              return true;
            }else if(val == 'n'){
              return false;
            }
        },
        //留言按钮点击事件；
        leaveMsg:function(){
          this.$emit('leave-msg');
        },
        //我想要按钮点击事件；
        wantBtn:function(){
          // alert(this.id);
          if(this.isP == 'p'){
            window.location.href = MVC('Home','Pay','pay');
          }else{
              var msglist = MVC('Home','Chat','msglist');
              $.post(msglist,{goodsId:this.id},function (data) {
                  if(data==1){
                      layer.open({content:'不能购买自己的商品！'});
                  }else {
                      window.location.href = MVC('Home','Chat','chat');
                  }
              })
          }
        }
      }
    }
    var componentB = {
      props:['isP','id'],//id为商品id；
      data:function(){
        return{
          leaveMsgList:'',//留言信息列表；
        }
      },
      template:'<div class="container-fluit">' +
           '<div class="row text-center">' +
           '<div class="col-xs-8 want-input">'+
           '<input ref="input" type="text" @blur="loseBlur" class="form-control msg-input" placeholder="想说点啥">' +
           '</div><div class="col-xs-4  want-btn" @click="sendMsg">发 送</div></div></div>',
      mounted:function(){
        bus.$on('msgList',function(data){
          componentB.leaveMsgList = data;
        });
      },
      methods:{
        //失焦事件；
        loseBlur:function(){
          if(this.$refs.input.value == ''){
            this.$emit('lose-blur');
          }else{

          }
        },
        //发送按钮点击事件；
        sendMsg:function(){
          var msg = this.$refs.input.value
          if( msg != ''){
            $.post(MVC('Home','Detail','sendMsg'),{msg:msg,id:this.id,goodsFlag:this.isP},function(res){
              if(res){
                this.$emit('send-msg');
                bus.$emit('pushMsg',msg);
                this.$refs.input.value=='';
              }else{
                alert('留言失败');
              }
            }.bind(this));
          }else{
            this.$emit('send-msg');
          }  
        },

      }
    }
    var footer = new Vue({
      el:"footer",
      data:{
        goodsId:'',
        goodsFlag:'',
        component:'componentA',
      },
      components:{
        componentA:componentA,
        componentB:componentB,
      },
      mounted:function(){
        //接收发送过来的商品信息（id、类型）；
        bus.$on('footerInfo',function(res){
          // console.log(111,res)
          footer.goodsId = res[0];
          footer.goodsFlag =res[1];
        });
      },
      methods:{
        //监听留言按钮 事件；
        resLevEvent:function(){
          footer.component = 'componentB'
        },
        //监听 失焦、发送按钮事件；
        resSendEvent:function(){
          footer.component = 'componentA'
        },
      }

    })

   
})//ready

	

