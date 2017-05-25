/**
 * Created by Administrator on 2017/5/24.
 */
$(function () {
    //发布秘笈
    $(".publish-action").on("click",function () {
        $(".publish-img").show();
    })
    $(".close").on("click",function () {
        $(".publish-img").hide()
    })
    //城市定位
    $('body').on('click', '.city-list p', function () {
        $('.city-box').hide();
        var type = $('.city-box').data('type');
        $('#zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
        $('#gr_zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
    });
    $('body').on('click', '.letter li', function () {
        var s = $(this).find('a').html();
        $(window).scrollTop($('#' + s + '1').offset().top-56);
    });
    $('#gr_zone_ids').on("click",function () {
        $(".city-box").show();
    })
    //点击添加图片按钮
    $(".insert-img").on("click",function () {
        if($(".img-content img").length>9){
            $(".insert-img").hide();
        }
    })
    $("#classify").click(function () {
        $(".my-classify").show();
    })
    //开始时间判定是否小于当前时间
    $("#b-time").blur(function () {
        var now=new Date();
        var month=now.getMonth()+1;
        var day=now.getDate();
        var hour=now.getHours();
        var min=now.getMinutes();
        if(month<10){
            month="0"+month;
        }
        if(day<10){
            day="0"+day;
        }
        if(hour<10){
            hour="0"+hour;
        }
        if(min<10){
            min="0"+min;
        }
        var today=now.getFullYear()+"-"+month+"-"+day+"T"+hour+":"+min;
        if($("#b-time").val()<today){
            $("#b-time").val(today);
        }
    })
    //结束时间判定是否小于开始时间
      $("#e-time").blur(function () {
          if($("#e-time").val()<$("#b-time").val()){
              $("#e-time").val($("#b-time").val());
          }
      })
    //分类选择传值
    Vue.component('todo-item',{
        props:['todo'],
        template:' <p class="col-xs-12" v-on:click="greet(todo.text)">{{todo.text}}</p>',
        methods:{
            greet:function(vue) {
                $("#sort").text(vue);
                $("#sort").siblings().text("");
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
    //发布按钮点击判断内容值
    var flag=0
//            console.log($(".logo1").length);
    $("#sub").on("click",function () {
        if($.trim($("#publish-title").val())==""){
            var p1="<p>标题一定要填写</p>";
            $("#content").append(p1);
            flag=1;
        }
        if($(".logo1").length==0){
            var p2="<p>至少上传一张图片</p>";
            $("#content").append(p2);
            flag=1;
        }
        if($("#publish-price").val()==""||$("#publish-price").val()<0||$("#publish-price").val()>100000000){
            var p3="<p>宝贝价格必须在0元与1亿元之间</p>";
            $("#content").append(p3);
            flag=1;
        }
        if($("#sort").text()==""){
            var p4="<p>选择一个分类</p>";
            $("#content").append(p4);
            flag=1;
        }
        if(flag=1){
            layer.open({
                title: '完成发布需要以下几个条件'
                ,content: $("#content").html()
                ,type:2
            })
            $("#content").html("");
        }
//                满足发布条件后将数据传输到后台
        else{

        }
    })
})