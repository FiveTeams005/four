/**
 * Created by Administrator on 2017/5/24.
 */
$(function () {
    new Loading();
    $('#loading').remove();
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
    var List = [];
    $("#classify").click(function () {
        $("#showClass").html("");
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
        template:' <p class="col-xs-12" v-on:click="greet(todo)">{{todo.text}}</p>',
        methods:{
            greet:function(vue) {
                $("#sort").text(vue.text);
                $("#sort").siblings().text("");
                $("#app1").hide();
                var setClassId = MVC('Home','Publish','setClassId');
                $.post(setClassId,{setClassId:vue.id},function (data) {
                });
            }
        }

    })
    var app1=new Vue({
        el:'#app1',
        data:{
            List:List
        }
    })
})