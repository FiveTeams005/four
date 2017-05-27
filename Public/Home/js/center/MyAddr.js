/**
 * Created by Administrator on 2017/5/26.
 */
$(function () {
    Vue.component('todo-item',{
        props:['todo'],
        template:'  <div class="row" v-bind:class="{active:isDefault(todo.default)}">' +
        '<div class="col-xs-11 addr-detail">' +
        '<div class="col-xs-6 text-left addr-name">收货人：{{todo.name}}</div>' +
        '<div class="col-xs-6  text-right addr-tel">{{todo.tel}}</div>' +
        '<div class="col-xs-12 addr-addr">收货地址：{{todo.addr}}</div>' +
        '</div>' +
        '<div class="col-xs-1 addr-img"><img src="'+path+'Home/img/xianyu/taorecorder_savevideo.png" v-if="showImg(todo.default)"></div></div>',
      methods:{
            showImg:function (vue) {
                  if(vue==1){
                      return true;
                  }
                  else {
                      return false
                  }
            },
            isDefault:function (cla) {
                 if(cla==1){
                     return true;
                 }
                 else{
                     return false
                 }
            }
      }
    })
    var app1=new Vue({
        el:'#addr',
        data:{
            //后台获取的数据需根据default（默认地址）做好倒序排序后传到前台
            List:[
                {name:'刘梽',id:1,default:1,tel:18750590206,addr:"福建省厦门市湖里区湖里街道蔡塘社区453号"},
                {name:'张三',id:2,default:0,tel:15375812236,addr:"福建省厦门市思明区软件园二期望海路56号传一科技"},
                {name:'李四',id:3,default:0,tel:12345678900,addr:"福建省厦门市思明区软件园二期望海路56号传一科技"},
                {name:'王五',id:4,default:0,tel:18750590200,addr:"福建省厦门市湖里区湖里街道蔡塘社区453号"}
            ]
        }
    })

})
