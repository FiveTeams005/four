<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Title</title>
    <link rel="stylesheet" href="/four/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/four/Public/static/bootstrap/css/bootstrap.min.css">
    <script src="/four/Public/static/jquery/jquery.min.js"></script>
    <script src="/four/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/four/Public/static/vue/vue.js"></script>
    <style>
        .content,header{
            background-color: #FFFFFF;
        }
        .logo1{
            width: 100%;
            height: 100%;
        }
        .logo2{
            margin: 7px;
            height: 16px;
            line-height: 30px;
        }
        .main{
            margin: 10px 0;
        }
        .main .text{
            border-bottom: 1px solid #ccc;
            padding: 0;
            padding-bottom: 5px;
        }
        .main .text1{
            padding: 0;
            line-height: 30px;
        }
        .main .text2{
            padding: 0;
            line-height: 30px;
        }
        .main .text3{
            padding: 0;
        }
        .main .text span{
            height: 100%;
            vertical-align: middle;
        }
        h4{
            font-family: "Microsoft YaHei";
        }

        .bg{
            background-color: #f7f7f7;
            padding: 0;
        }
        .background{
            background: url(/four/Public/home/img/images/bg1.png);
            background-size: 100% 100%;
        }
        .bg header{
            padding: 0;
        }
        .text div[class ^='col-xs']{
            padding: 0;
        }
        .text3 div[class ^='col-xs']{
            padding: 0;
        }
        .content{
            margin-top: 10px;
            padding-right:0;
        }
        .img-circle{
            width: 35px;
            height: 35px;
        }
        .detail{
            font-size: 10px;
            color: #9d9d9d;
        }
        .userMsg{
            border-bottom: 1px solid #ccc;
        }
        .num1{
            margin-top: 5px;
        }
        .num2{
            margin-bottom: 10px;
            font-size: 10px;
            color: #9d9d9d;
        }
        .camera{
            margin-top: 35px;
        }
        .publish img{
            width: 70px;
        }
        footer{
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body class="bg">
<div class="container background">
    <div class="row">
        <div class="col-xs-2"><img src="/four/Public/home/img/images/fh.png"></div>
        <div class="col-xs-1 col-xs-offset-7"><img src="/four/Public/home/img/images/zf.png"></div>
        <div class="col-xs-1"><img src="/four/Public/home/img/images/ewm.png"></div>
    </div>
    <div class="row camera">
        <div class="col-xs-6"><img src="/four/Public/home/img/images/camera.png"></div>
    </div>
</div>
<header>
    <div class="container userMsg">
        <div class="row text-left main">
            <div class="col-xs-8">
                <h5>我的昵称</h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center num1">
            <div class="col-xs-4">0</div>
            <div class="col-xs-4">0</div>
            <div class="col-xs-4">0</div>
        </div>
        <div class="row text-center num2">
            <div class="col-xs-4">被赞</div>
            <div class="col-xs-4">等级</div>
            <div class="col-xs-4">信誉</div>
        </div>
    </div>
</header>
<div class="container-fluid content">
    <div class="row text-left main">
        <div class="col-xs-1"></div>
        <div class="col-xs-11 text">
            <div class="col-xs-2 text1">头像</div>
            <div class="col-xs-3 text-center text2"><img src="/four/Public/home/img/xianyu/entry_icon_sold.png" class="img-circle"></div>
            <div class="col-xs-2 col-xs-offset-5"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-1"></div>
        <div class="col-xs-11 text">
            <div class="col-xs-2 text1">性别</div>
            <div class="col-xs-3 text-center text2">男</div>
            <div class="col-xs-2 col-xs-offset-5"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-1"></div>
        <div class="col-xs-11 text">
            <div class="col-xs-6 text1">登录密码</div>
            <div class="col-xs-4 text-right text2"></div>
            <div class="col-xs-2 "><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-1"></div>
        <div class="col-xs-11 text">
            <div class="col-xs-6 text1">支付密码</div>
            <div class="col-xs-4 text-right text2"></div>
            <div class="col-xs-2 "><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-1"></div>
        <div class="col-xs-11 text">
            <div class="col-xs-6 text1">收货地址</div>
            <div class="col-xs-4 text-right text2"></div>
            <div class="col-xs-2 "><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
</div>

<footer >
    <div class="container">
                <div class="row text-center publish ">
                    <div class="col-xs-4 col-xs-offset-4">
                    <img src="/four/Public/Home/img/xianyu/publish_in_pond.png" alt="">
                </div>
            </div>
        </div>
</footer>
</body>
</html>