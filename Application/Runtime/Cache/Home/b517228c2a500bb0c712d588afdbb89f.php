<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>我的拍卖</title>
    <link rel="stylesheet" href="/four/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/four/Public/static/bootstrap/css/bootstrap.min.css">
    <script src="/four/Public/static/jquery/jquery.min.js"></script>
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
        .baby-span{
            color: #ccc;
        }
        .logo1{
            height: 130px;
        }
        .my-publish-title{
            font-weight: 500;
            font-size: 18px;
        }
        footer{
            width: 100%;
            position: fixed;
            top:35%
        }
        .ban-my-publish{
            background-color: #fff;
        }
        nav ul li.active a{
            border-bottom: 3px solid #ffda45;
            background-color: #fff !important;
        }
        nav ul li a{
            color: #ccc;
        }
        .navbar-nav{
            margin: 0px -15px;
        }
    </style>
    <script>
        $(function () {
            $('#menu-wrap').on('click','nav ul li',function () {
                $(this).addClass('active').siblings().removeClass('active');
                if($(this).index() == 0){   //参拍的
                    alert(1);
                }else if($(this).index() == 1){     //已结束
                    alert(2);
                }
                else if($(this).index() == 2){     //订单
                    alert(2);
                }
            })
        })
    </script>
</head>
<body class="bg">
<header>
    <div class="container con-my-publish">
        <div class="row my-publish">
            <div class="col-xs-4 col-xs-offset-4 text-center my-publish-title">我的拍卖</div>
        </div>
    </div>

    <div class="container ban-my-publish">
        <div class="col-sm-12 col-xs-12" id="menu-wrap">
            <div class="menu">
                <nav class="navbar navbar-default" role="navigation">
                    <ul class="nav navbar-nav">
                        <li  role="presentation" class="col-xs-4  active text-center">
                            <a href="javascript:">参拍的</a>
                        </li>
                        <li  role="presentation" class="col-xs-4  text-center">
                            <a href="javascript:">已结束</a>
                        </li>
                        <li  role="presentation" class="col-xs-4 text-center">
                            <a href="javascript:">订单</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 text-center col-xs-offset-3"><img src="/four/Public/home/img/xianyu/page_empty.png" class="logo1"></div>
        </div>
        <div class="row">
            <div class="col-xs-6 text-center col-xs-offset-3"><span class="baby-span">您还未参与竞拍~</span></div>
        </div>

    </div>
</footer>
<div id="goods"></div>
</body>
</html>