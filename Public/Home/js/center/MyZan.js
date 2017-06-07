$(function () {
    $('#menu-wrap').on('click','nav ul li',function () {
        $(this).addClass('active').siblings().removeClass('active');
        if($(this).index() == 0){   //宝贝
            $("#goods").html("");
            getZan();
        }else if($(this).index() == 1){     //问答
            $("#goods").html("");
            $(".showno").show();
            $(".baby-span").text("还没有问答哦~")
        }
    })
    //获取赞过的数据
    function getZan() {
        $.post(MVC("Home","Center","showZan"),function (data) {
            console.log(data);
            if(data[0].length==0&&data[1].length==0){
                $(".showno").show();
                $(".baby-span").text("还没有赞过宝贝哦~")
            }
            else{
                $(".showno").hide();
                for(var i=0;i<data[0].length;i++){
                    var ngoods=new Package_MyZan(data[0][i].n_img,data[0][i].n_name,data[0][i].n_price,data[0][i].z_id,data[0][i].n_id);
                    ngoods.setFather("goods");
                }
                for (var y=0;y<data[1].length;y++){
                    var status;
                    switch (data[1][y].p_status){
                        case "0":
                            status="即将开始";
                            break;
                        case "1":
                            status="拍卖中";
                            break;
                        case "2":
                            status="拍卖结束";
                            break;
                    }
                    var pgoods=new Package_MyZanP(data[1][y].n_img,data[1][y].p_name,status,data[1][y].z_id,data[1][y].p_id);
                    pgoods.setFather("goods");
                }
            }
        },'json')
    }
    getZan();
   $("#goods").on("click","button",function () {
       // alert($(this).attr("id"));
       $.post(MVC("Home","Center","cancleZan"),{id:$(this).attr("id")},function (data) {
          if(data==1){
              location.reload();
          }
          else{
              layer.open({
                  content: '取消失败'
                  ,skin: 'msg'
                  ,time: 2 //2秒后自动关闭
              })
          }
       })
   })
    $("#goods").on("click",".goodshref",function () {
        $.post(MVC("Home","Center","showGoods"),{goods_id:$(this).attr("id"),goods_flag:$(this).attr("rel")},function (data) {
            if(data){
                window.location.href=MVC("Home","Detail","detail");
            }
        })
    })
    $('.back').click(function () {
        window.location.href=MVC("Home","Center","Center");
    })
    
})
