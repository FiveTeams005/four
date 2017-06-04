/**
 * Created by Administrator on 2017/5/26.
 */
$(function () {
    Vue.component('todo-item',{
        props:['todo'],
        template:'  <div class="row" v-on:click="open(todo.d_id)" v-bind:class="{active:isDefault(todo.d_status)}">' +
        '<div class="col-xs-11 addr-detail">' +
        '<div class="col-xs-6 text-left addr-name">收货人：{{todo.d_name}}</div>' +
        '<div class="col-xs-6  text-right addr-tel">{{todo.d_tel}}</div>' +
        '<div class="col-xs-12 addr-addr">收货地址：{{todo.d_address}}</div>' +
        '</div>' +
        '<div class="col-xs-1 addr-img"><img src="'+path+'Home/img/xianyu/taorecorder_savevideo.png" v-if="showImg(todo.d_status)"></div></div>',
      methods:{
            showImg:function (vue) {
                  if(vue==2){
                      return true;
                  }
                  else {
                      return false
                  }
            },
            isDefault:function (cla) {
                 if(cla==2){
                     return true;
                 }
                 else{
                     return false
                 }
            },
          // 存储点击地址的id
          open:function (id) {
             $.post(MVC("Home","Center","saveAddrId"),{id:id},function (data) {
                 if(data==1){
                     window.location.href=MVC("Home","Center","EditAddr");
                 }
             })
          }
      }
    })
    var app1=new Vue({
        el:'#addr',
        data:{
            //后台获取的数据需根据default（默认地址）做好倒序排序后传到前台
            List: [
                // {name:'刘梽',id:1,default:2,tel:18750590206,addr:"福建省厦门市湖里区湖里街道蔡塘社区453号"},
                // {name:'张三',id:2,default:0,tel:15375812236,addr:"福建省厦门市思明区软件园二期望海路56号传一科技"},
                // {name:'李四',id:3,default:0,tel:12345678900,addr:"福建省厦门市思明区软件园二期望海路56号传一科技"},
                // {name:'王五',id:4,default:0,tel:18750590200,addr:"福建省厦门市湖里区湖里街道蔡塘社区453号"}
            ]
        },
        mounted:function(){
            $.post(MVC("Home","Center","showAddr"),function (data) {
                app1.List = data;
            },'json')
        }
    })
     $("#back").click(function () {
         window.location.href=MVC("Home","Center","Center")
     })
})
