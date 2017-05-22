<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>发布</title>
    <link rel="stylesheet" href="/four/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/four/Public/static/bootstrap/css/bootstrap.min.css">
    <script src="/four/Public/static/jquery/jquery.min.js"></script>
    <script src="/four/Public/static/jquery/distpicker.data.js"></script>
    <script src="/four/Public/static/jquery/distpicker.js"></script>
    <!--<script src="/four/Public/static/jquery/main.js"></script>-->
    <script src="/four/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/four/Public/static/vue/vue.js"></script>

    <style>
        .bg{
            background-color: #f7f7f7;
        }
        .my-publish{
            margin-top: 15px;
            margin-bottom: 10px;
            line-height: 20px;
        }
        .my-publish-title{
            font-weight: 500;
            font-size: 18px;
        }
        .publish-action{
            font-size: 11px;
        }
        .publish-img{
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 3;
            display: none;
        }
        .publish-img img{
            width: 100%;
            height:100%;
        }
        .close{
            position: fixed;
            z-index: 4;
            width: 10%;
            height: 6%;
            bottom: 5%;
            left: 45%;
        }
        .close img{
            width: 100%;
        }
        .con-form{
            background-color: #fff;
        }
        .logo1{
           width:100%;
        }
        .describe-img{
          padding: 0 15px 10px 15px;
        }
        .position-img{
            padding-left: 0;
        }
        .position-img img{
            width:10px;
        }
        .middle-bg{
            width: 100%;
            height:10px;
            background-color: #f7f7f7;
        }
    </style>
    <script>
        $(function () {
            $(".publish-action").on("click",function () {
                $(".publish-img").show();
            })
            $(".close").on("click",function () {
                $(".publish-img").hide()
            })
            $('#target').distpicker();

        })
    </script>
</head>
<body class="bg">

    <div class="publish-img"><img src="/four/Public/home/img/images/public_secret.png">
        <div class="close"><img src="/four/Public/home/img/xianyu/welcome_ponds_close.png"></div>
    </div>

    <div class="container con-my-publish">
        <div class="row my-publish">
            <div class="col-xs-4 col-xs-offset-4 text-center my-publish-title">发布</div>
            <div class="col-xs-4 text-right"><span class="publish-action">发布秘笈</span></div>
        </div>
    </div>
   <div class="container-fluid con-form">
       <form>
           <div class="form-group">
               <input type="text" class="form-control"  placeholder="标题&nbsp;品类品牌型号都是买家喜欢搜索的">
           </div>
           <div class="form-group">
               <textarea class="form-control" rows="3" placeholder="描述一下你的宝贝"></textarea>
           </div>
           <div class="form-group">
               <div class="row">
               <div class="col-xs-3 text-center describe-img"><img src="/four/Public/home/img/images/a.jpg" class="logo1"></div>
               <div class="col-xs-3 text-center describe-img"><img src="/four/Public/home/img/images/b.jpg" class="logo1"></div>
               <div class="col-xs-3 text-center describe-img"><img src="/four/Public/home/img/images/b.jpg" class="logo1"></div>
               <div class="col-xs-3 text-center describe-img"><img src="/four/Public/home/img/images/b.jpg" class="logo1"></div>
               <div class="col-xs-3 text-center describe-img"><img src="/four/Public/home/img/images/b.jpg" class="logo1"></div>
           </div>
           </div>
           <div class="form-group">
           <div class="row position-img">
                   <div class="col-xs-1 text-left ">
                       <img src="/four/Public/home/img/xianyu/post_location_icon_black.png">
                   </div>
                   <div class="col-xs-11 text-left">
                       <div data-toggle="distpicker">
                           <select data-province="福建省"></select>
                           <select data-city="厦门市"></select>
                           <select data-district="思明区"></select>
                       </div>
                   </div>
               </div>
           </div>
           <div class="middle-bg"></div>
       </form>
   </div>
</body>
</html>