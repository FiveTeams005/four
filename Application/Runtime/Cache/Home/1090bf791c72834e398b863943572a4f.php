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
            background-color: #f7f7f7;
        }
        .con-my-publish{
            border-bottom: 1px solid #ccc;
        }
        .my-publish{
            margin-top: 15px;
            margin-bottom: 10px;
            line-height: 30px;
        }
        .logo1{
            height: 130px;
        }
        .my-publish-title{
            font-weight: 500;
            font-size: 20px;
        }
        .baby,.que{
            padding: 13px 0;
            color:#ccc;
        }
       .ban-my-publish{
            background-color: #fff;
        }
        .baby-underline{
            border-bottom: 3px solid #ffda44;
        }
        .btn-yel{
            background-color: #ffda45;
            border-radius: 0;
            width: 100px;
            height:25px;
            line-height: 0px;
            margin-top: 15px;
        }
        .baby-span{
            color: #ccc;
        }
        footer{
            width: 100%;
            position: fixed;
            top:35%
        }
    </style>
    <script>
        $(function () {
            $(".baby").on("click",function () {

            })
        })
    </script>
</head>
<body class="bg">
<header>
    <div class="container con-my-publish">
        <div class="row my-publish">
            <div class="col-xs-4 col-xs-offset-4 text-center my-publish-title">我发布的</div>
            <div class="col-xs-4 text-right">下架宝贝</div>
        </div>
    </div>
</header>
    <div class="container ban-my-publish">
        <div class="row banner">
            <div class="col-xs-6 text-center baby">宝贝</div>
            <div class="col-xs-6 text-center que">问答</div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-xs-offset-2 text-center baby-underline"></div>
            <div class="col-xs-2 col-xs-offset-4  text-center que-underline"></div>
        </div>
    </div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 text-center col-xs-offset-3"><img src="/four/Public/home/img/xianyu/page_empty.png" class="logo1"></div>
        </div>
        <div class="row">
            <div class="col-xs-6 text-center col-xs-offset-3"><span class="baby-span">还没有发布宝贝哦~</span></div>
        </div>
        <div class="row">
            <div class="col-xs-6 text-center col-xs-offset-3">
                <button type="button" class="btn btn-yel">发布宝贝</button>
            </div>
        </div>
    </div>
</footer>
</body>
</html>