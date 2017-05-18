/**
 * Created by Administrator on 2017/4/9.
 */
// $("#button").on("click",function(){//点击登录，验证账号密码和验证码
//     $.ajax({
//         url:'index.php?p=admin&c=login&a=codename',
//         type:'POST',
//         success:function(data){
//             var str = $("#codeIpt").val();
//             if(str==""){
//                 alert("请输入验证码！")
//             }else if(data==str.toLowerCase()){
//                 $.ajax({
//                     url:'index.php?p=admin&c=login&a=chartUser',
//                     type:'POST',
//                     data:{use:$("#username").val(),pwd:$("#userpwd").val()},
//                     success:function(data){
//                         if(data==1){
//                             sessionStorage.setItem("flag2","1");
//                             window.location.href='index.php?p=admin&a=show&c=main';
//                         }else if(data==3){
//                             alert('账号已被锁定，请联系超级管理员！')
//                         }
//                         else{
//                             alert('账号或密码错误！')
//                         }
//                     }
//                 })
//             }
//             else {
//                 alert('验证码错误！')
//             }
//         }
//     });
// });
//
// function fun1(){//验证码生成图片更新图片
//     $.ajax({
//         url:'index.php?p=admin&c=login&a=code',
//         type:'POST',
//         success:function(){
//             $("#img").attr("src","public/admin/images/login/yzm.png?a="+Math.random());//
//         }
//     });
// }
// fun1();
// $("#img").click(function(){
//     fun1();
// });