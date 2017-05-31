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
        if(flag==1){
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