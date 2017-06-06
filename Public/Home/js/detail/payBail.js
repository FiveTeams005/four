window.onload = function(){
  var vm = new Vue({
    el: '.main',
    data:{
      bailMoney:0,
    },
    mounted:function(){
      $.post(MVC('Home','Detail','getBailMoney'),function(data){
        vm.bailMoney = data;
      })
    }
  });

  //出现浮动层
  $(".ljzf_but").click(function(){
    var price =  $('#price').children('span').text();
    $.post(MVC('Home','Detail','selectMoney'),{},function(data){

      if(parseFloat(data) < parseFloat(price)){
        layer.open({
          content:'余额('+data+')不足,请及时充值!',
        })
      }else{
        // alert(data);
        $('.wxzf_price').children('span').text(price);
          $(".ftc_wzsf").show();
      }
    })

  });
  //关闭浮动
  $(".close").click(function(){
      $(".ftc_wzsf").hide();
  });
  //数字显示隐藏
  $(".xiaq_tb").click(function(){
      $(".numb_box").slideUp(500);
  });
  $(".mm_box").click(function(){
      $(".numb_box").slideDown(500);
  });
  //----
  var i = 0;
  $(".nub_ggg li a").click(function(){
      i++
      if(i<6){
          $(".mm_box li").eq(i-1).addClass("mmdd");
      }else{
          $(".mm_box li").eq(i-1).addClass("mmdd");
          setTimeout(function(){
              var buy = MVC('Home','Detail','payBailMoney');
              $.post(buy,{},function (data) {
                if(data){
                  layer.open({
                    content:'支付成功，即将跳转回拍卖页面...',
                  });
                  setTimeout(function(){
                    window.location.href = MVC('Home','Detail','detail');
                  },1000);
                }else{
                  layer.open({
                    content:'支付失败',
                  })
                }
              })
          },200);
      }
  });

  $(".nub_ggg li .del").click(function(){

      if(i>0){
          i--
          $(".mm_box li").eq(i).removeClass("mmdd");
          i==0;
      }
      //alert(i);
  });
}
