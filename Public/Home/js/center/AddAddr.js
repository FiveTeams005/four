$(function() {
    new Loading();//加载等待
    /*打开省市区选项*/
    $("#expressArea").click(function() {
        $("#areaMask").fadeIn();
        $("#areaLayer").animate({"bottom": 0});
    });
    /*关闭省市区选项*/
    $("#areaMask, #closeArea").click(function() {
        clockArea();
    });
    //点击保存地址，判断输入的地址是否符合要求
    $(".btn-add").on("click",function () {
        var flag=0;
        var p="<span>请填写</span>"
        $("#content").append(p);
        if($("#add-city").text()==""){
            var p1="<span>地区、</span>";
            $("#content").append(p1);
            flag=1;
        }
        if($("#add-detail").val()==""){
            var p2="<span>详细地址、</span>";
            $("#content").append(p2);
            flag=1;
        }
        if($("#add-name").val()==""){
            var p3="<span>姓名、</span>";
            $("#content").append(p3);
            flag=1;
        }
        if($("#add-tel").val()==""){
            var p4="<span>电话</span>";
            $("#content").append(p4);
            flag=1;
        }
        if(flag==1){
            layer.open({
                title: '信息不符合要求'
                ,content: $("#content").html()
                ,type:2
            })
            $("#content").html("");
        }
        else{
            //将表单数据发送给后台
            window.location.href=MVC("Home","Center","MyAddr");
        }
    })
    $('#loading').remove();
});
