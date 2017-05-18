<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/static/css/footerStyle.css">
    <link rel="stylesheet" href="/Public/Home/css/indexStyle.css">

    <script src="/Public/static/jquery/jquery.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/static/vue/vue.js"></script>
</head>
<body>
    <!--头部-->
    <header>
        <div class="container-fluid theme-style" style="background-color: #ffda45;padding-top: 5px;padding-bottom: 3px;">
            <div class="row">
                <div class="col-sm-1 col-xs-1 text-center">
                     <img src="/Public/Home/img/xianyu/city_for_search.png" alt="">
                </div>
                <div class="col-sm-2 col-xs-2  text-left" id="location">
                    <nobr>乌鲁木齐市</nobr>
                </div>
                <div class="col-sm-7 col-xs-7">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" placeholder="输入要搜索的商品或用户">
                            <button id="sec-btn"><img src="/Public/Home/img/xianyu/choose_city_search.png" ></button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 col-xs-2 text-center ">
                    <span class="glyphicon glyphicon-th-list"></span>
                </div>
            </div>
        </div>
    </header>
    <!--body部-->
    <div class="container-fluid" id="content">
        <div class="row">
            <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/wp-content/uploads/2014/07/slide1.png" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="/wp-content/uploads/2014/07/slide2.png" alt="Second slide">
                    </div>
                    <div class="item">
                        <img src="/wp-content/uploads/2014/07/slide3.png" alt="Third slide">
                    </div>
                </div>
                <!-- 轮播（Carousel）导航 -->
                <a class="carousel-control left" href="#myCarousel"
                   data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel"
                   data-slide="next">&rsaquo;</a>
            </div>
        </div>
    </div>
    <!--尾部，（底部固定导航）-->
    <footer >
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-2 col-xs-2">
                    <div class="row">
                        <img src="/Public/Home/img/xianyu/comui_tab_home.png" alt="" />
                    </div>
                    <div class="row">
                        首页
                    </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="row">
                        <img src="/Public/Home/img/xianyu/comui_tab_custom_head.png" alt="">
                    </div>
                    <div class="row">
                        客服
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4 publish">
                    <div class="row">
                        <img src="/Public/Home/img/xianyu/comui_tab_post.png" alt="">
                    </div>
                    <div class="row publish-txt">
                        发布
                    </div>
                </div>
                <div class="col-sm-2 col-xs-2 ">
                    <div class="row">
                        <img src="/Public/Home/img/xianyu/comui_tab_message.png" alt="">
                    </div>
                    <div class="row">
                        信息
                    </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="row">
                        <img src="/Public/Home/img/xianyu/comui_tab_person.png" alt="">
                    </div>
                    <div class="row">
                        我的
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>