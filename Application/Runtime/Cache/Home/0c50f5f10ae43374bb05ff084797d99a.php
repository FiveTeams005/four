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
        div{
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
        .btn-yel{
            background-color: #ffda45;
            border-radius: 0;
            width: 100px;
            height:25px;
            line-height: 0px;
            margin-top: 15px;
        }
        .moheader{
         padding-top: 15px;
        }
        .bg{
            background-color: #f7f7f7;
            padding: 0;
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
        }
        .bottom{
            margin-top: 10px;
            height: 45px;
        }
    </style>
</head>
<body class="bg">
<header>
<div class="container-fluid moheader">
    <div class="row text-center">
        <div class="col-xs-6">
            <div class="row text-center">
                <div class="col-xs-12">
                    <h4>欢迎来到二货</h4>
                </div>
            </div>
            <div class="row text-center">
                <button type="button" class="btn btn-yel">马上登录</button>
            </div>
        </div>
        <div class="col-xs-6">
            <img src="/four/Public/home/img/xianyu/empty_pond_for_admin.png" class="logo1">
        </div>
    </div>
</div>
</header>
<div class="container-fluid content">
    <div class="row text-left main">
        <div class="col-xs-2"><img src="/four/Public/home/img/xianyu/entry_icon_on_shelf.png" class="logo1"></div>
       <div class="col-xs-10 text">
        <div class="col-xs-8 text1">我发布的</div>
        <div class="col-xs-1 text-right text2">0</div>
        <div class="col-xs-2 text-right"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
       </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-2"><img src="/four/Public/home/img/xianyu/entry_icon_sold.png" class="logo1"></div>
        <div class="col-xs-10 text">
            <div class="col-xs-8 text1">我卖出的</div>
            <div class="col-xs-1 text-right text2">0</div>
            <div class="col-xs-2 text-right"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-2"><img src="/four/Public/home/img/xianyu/entry_icon_bought.png" class="logo1"></div>
        <div class="col-xs-10 text">
            <div class="col-xs-8 text1">我买到的</div>
            <div class="col-xs-1 text-right text2">0</div>
            <div class="col-xs-2 text-right"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-2"><img src="/four/Public/home/img/xianyu/entry_icon_favourite.png" class="logo1"></div>
        <div class="col-xs-10 text">
            <div class="col-xs-8 text1">我赞过的</div>
            <div class="col-xs-1 text-right text2">0</div>
            <div class="col-xs-2 text-right"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-2"><img src="/four/Public/home/img/xianyu/entry_icon_paimai.png" class="logo1"></div>
        <div class="col-xs-10 text">
            <div class="col-xs-8 text1">我的拍卖</div>
            <div class="col-xs-1 text-right text2">0</div>
            <div class="col-xs-2 text-right"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
    <div class="row text-left main">
        <div class="col-xs-2"><img src="/four/Public/home/img/xianyu/icon_signin_small.png" class="logo1"></div>
        <div class="col-xs-10 text3">
            <div class="col-xs-8 text1">我的余额</div>
            <div class="col-xs-1 text-right text2">0</div>
            <div class="col-xs-2 text-right"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>
</div>

<div class="container bottom">
    <div class="row text-left main">
        <div class="col-xs-2"><img src="/four/Public/home/img/xianyu/entry_icon_settings.png" class="logo1"></div>
        <div class="col-xs-10 text3">
            <div class="col-xs-8 text1">设置</div>
            <div class="col-xs-1 text-right text2"></div>
            <div class="col-xs-2  text-right"><img src="/four/Public/home/img/xianyu/entry_arrow.png" class="logo2"></div>
        </div>
    </div>

</div>
</body>
</html>