<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/css/static/footer/footerStyle.css">
    <link rel="stylesheet" href="/Public/Home/css/index/indexStyle.css">

    <script src="/Public/static/jquery/jquery.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/static/vue/vue.js"></script>
    <script src="/Public/Home/js/index/hammer.js"></script>
    <script src="/Public/Home/js/index/index.js"></script>
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
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </div>
            </div>
        </div>
    </header>
    <!--body部-->
    <div class="container-fluid" id="content">
        <!--轮播-->
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
                        <a href="">
                            <img src="/Public/Home/img/xianyu/banner1.jpg" class="img-responsive" style="width:100%" alt="First slide">
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="/Public/Home/img/xianyu/banner2.jpg" class="img-responsive" style="width:100%" alt="Second slide">
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="/Public/Home/img/xianyu/banner3.jpg" class="img-responsive" style="width:100%" alt="Third slide">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--分类导航-->
        <div class="row text-center">
            <div class="col-sm-3 col-xs-3">
                <a href="" class="indexcase">数码</a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >家电</a>
            </div>
            <div class="col-sm-3 col-xs-3">
                家具
            </div>
            <div class="col-sm-3 col-xs-3">
                玩具乐器
            </div>
            <div class="col-sm-3 col-xs-3">
                美妆
            </div>
            <div class="col-sm-3 col-xs-3">
                手表
            </div>
            <div class="col-sm-3 col-xs-3">
                箱包
            </div>
            <div class="col-sm-3 col-xs-3">
                户外
            </div>
        </div>
        <!--广告-->
        <div class="row">
            <img src="/Public/Home/img/xianyu/ad.jpg" class="img-responsive" style="width:100%">
        </div>
        <!--新鲜的、附近的-->
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <nav>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="">新鲜的</a>
                        </li>
                        <li>
                            <a href="">附近的</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-12 col-xs-12">

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