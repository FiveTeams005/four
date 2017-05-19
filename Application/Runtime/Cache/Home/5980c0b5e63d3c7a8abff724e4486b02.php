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
        .bg{
            background: url(/four/Public/home/img/images/match_no_more.png);
            background-size: 100% 100%;
        }
        .h_camera{
            margin-top: 30px;
        }
        .text div[class ^='col-xs']{
            padding: 0;
        }
        .background{
            /*background-color: #f7f7f7;*/
            /*!*padding: 0;*!*/
        }
        .main{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .logo2{
            margin: 7px;
            height: 16px;
            line-height: 30px;
        }
        .num2{
            font-size: 10px;
            color: #9d9d9d;
        }
       .msg{
           border-bottom:  1px solid #ccc;
           margin-left: 10px;
       }
    </style>
</head>
<body class="background">
<div class="container bg">
    <div class="row text">
        <div class="col-xs-1 col-xs-offset-10"><img src="/four/Public/home/img/images/zf.png"></div>
        <div class="col-xs-1"><img src="/four/Public/home/img/images/ewm.png"></div>
    </div>
    <div class="row h_camera">
        <div class="col-xs-2"><img src="/four/Public/home/img/images/camera.png"></div>
    </div>
</div>
<div class="container">
    <div class="row main">
        <div class="col-xs-6">
            <h4>我的昵称</h4>
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
<div class="container ">
    <div class="row msg">
        <div class="col-xs-3">头像</div>
        <div class="col-xs-3"></div>
        <div class="col-xs-3 col-xs-offset-3"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
    </div>
    <div class="row msg">
        <div class="col-xs-3">性别</div>
        <div class="col-xs-3">男</div>
        <div class="col-xs-3 col-xs-offset-3"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
    </div>
    <div class="row msg">
        <div class="col-xs-3">登录密码</div>
        <div class="col-xs-3 col-xs-offset-6"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
    </div>
    <div class="row msg">
        <div class="col-xs-3">支付密码</div>
        <div class="col-xs-3 col-xs-offset-6"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
    </div>
    <div class="row msg">
        <div class="col-xs-3">收货地址</div>
        <div class="col-xs-3 col-xs-offset-6"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
    </div>
</div>
</body>
</html>