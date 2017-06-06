$(function() {
    $('#loading').remove();

    $.post(MVC("Home","Center","showEdit"),function (data) {
        console.log(data);
       var str=data.d_address;
        var ary=str.split(",");
        $("#add-city").text(ary[0]);
        $("#add-detail").val(ary[1]);
        $("#add-name").val(data.d_name);
        $("#add-tel").val(data.d_tel);
        if(data.d_status==2){
            $("#add-default").prop("checked","checked")
        }
    },'json');

    /*打开省市区选项*/
    $("#expressArea").click(function() {
        $("#areaMask").fadeIn();
        $("#areaLayer").animate({"bottom": 0});
    });
    /*关闭省市区选项*/
    $("#areaMask, #closeArea").click(function() {
        clockArea();
    });
    //点击删除地址，layer弹出询问框，点击确定则删除
    $("#add-del").on("click",function () {
        layer.open({
            content: '确定该删除地址吗？'
            ,btn: ['删除', '取消']
            ,skin: 'footer'
            ,yes: function(index){
                $.post(MVC("Home","Center","delAddr"),function (data) {
                    if(data==1){
                        layer.open({
                            content: '删除成功'
                            ,btn: ['确定']
                            ,yes: function(index){
                                layer.close(index);
                                window.location.href=MVC("Home","Center","MyAddr");
                            }
                        });
                    }
                    else{
                        layer.open({
                            content: '删除失败'
                            ,skin: 'msg'
                            ,time: 2 //2秒后自动关闭
                        })
                    }
                })
                // window.location.href=MVC("Home","Center","MyAddr");
            }
        })
    })
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
            $("#content").html("");
            var d_status;
            if($("#add-default").is(':checked')){
                d_status=2;
            }
            else {
               d_status=1;
            }
            $.post(MVC("Home","Center","saveAddr"),{city:$.trim($("#add-city").text()),detail:$.trim($("#add-detail").val()),name:$.trim($("#add-name").val()),tel:$.trim($("#add-tel").val()),d_status:d_status},function (data) {
                if(data==1){
                    layer.open({
                        content: '保存成功'
                        ,btn: ['确定']
                        ,yes: function(index){
                            layer.close(index);
                            window.location.href=MVC("Home","Center","MyAddr");
                        }
                    });
                }
                else{
                    layer.open({
                        content: '添加新地址失败'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    })
                }
            })
        }
    })
    $('#loading').remove();
});
