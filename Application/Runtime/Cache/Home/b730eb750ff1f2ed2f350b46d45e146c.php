<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>我买到的</title>
    <link rel="stylesheet" href="/four/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/four/Public/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/four/Public/home/css/center/MyBuyStyle.css">
    <script src="/four/Public/static/jquery/jquery.min.js"></script>
    <script src="/four/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/four/Public/static/vue/vue.js"></script>
    <script src="/four/Public/home/static/Package.js"></script>
    <script>
        $(function () {
            var goods=new  Package_MyBuy('/four/Public/home/img/xianyu/page_empty.png',"汉服","200","交易关闭")
            goods.setFather("goods");
        })
    </script>
</head>
<body class="bg">
<header>
    <div class="container con-my-publish">
        <div class="row my-publish">
            <div class="col-xs-4 col-xs-offset-4 text-center my-publish-title">我买到的</div>
        </div>
    </div>
</header>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 text-center col-xs-offset-3"><img src="/four/Public/home/img/xianyu/page_empty.png" class="logo1"></div>
        </div>
        <div class="row">
            <div class="col-xs-6 text-center col-xs-offset-3"><span class="baby-span">您还没有购买宝贝~</span></div>
        </div>

    </div>
</footer>
<div id="goods"></div>
</body>
</html>