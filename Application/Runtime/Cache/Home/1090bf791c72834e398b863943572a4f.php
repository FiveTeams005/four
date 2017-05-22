<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>我的发布</title>
    <link rel="stylesheet" href="/four/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/four/Public/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/four/Public/home/css/center/MyPublishStyle.css">
    <script src="/four/Public/static/jquery/jquery.min.js"></script>
    <script src="/four/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/four/Public/static/vue/vue.js"></script>
    <script src="/four/Public/home/static/Package.js"></script>
    <script>
        $(function () {
            $('#menu-wrap').on('click','nav ul li',function () {
                $(this).addClass('active').siblings().removeClass('active');
                if($(this).index() == 0){   //宝贝
                    alert(1);
                }else if($(this).index() == 1){     //问答
                    alert(2);
                }
            })
            //测试封装商品
            var mygoods=new Package_Publish('/four/Public/home/img/xianyu/page_empty.png','汉服','300','20','20','0');
            mygoods.setFather('goods');
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
        <div class="col-sm-12 col-xs-12" id="menu-wrap">
            <div class="menu">
                <nav class="navbar navbar-default" role="navigation">
                    <ul class="nav navbar-nav">
                        <li  role="presentation" class="col-sm-4 col-xs-4 col-sm-offset-1 col-xs-offset-1 active text-center">
                            <a href="javascript:">宝贝</a>
                        </li>

                        <li  role="presentation" class="col-sm-4 col-xs-4 col-sm-offset-2 col-xs-offset-2 text-center">
                            <a href="javascript:">问答</a>
                        </li>
                    </ul>
                </nav>
            </div>
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
<div id="goods">

</div>
</body>
</html>