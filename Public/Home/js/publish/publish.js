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
        var type = $('.city-box').data('type');
        $('#zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
        $('#gr_zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
        $('.city-box').hide();
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

    
    
    //分类选择传值
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