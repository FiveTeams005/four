<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/static/goods/GoodsStyle.css">
    <link rel="stylesheet" href="/Public/Home/css/index/indexStyle.css">
    <link rel="stylesheet" href="/Public/Home/css/static/footer/footerStyle.css">

    <script src="/Public/static/jquery/jquery.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/static/vue/vue.js"></script>
    <script src="/Public/Home/js/index/index.js"></script>
    <script src="/Public/Home/js/index/hammer.js"></script>
</head>
<body>
    <!--头部-->
    <header>
        <div class="container-fluid theme-style" style="background-color: #ffda45;padding-top: 5px;padding-bottom: 3px;">
            <div class="row address">
                <div class="col-sm-1 col-xs-1 text-center">
                    <img src="/Public/Home/img/xianyu/nearby.png">
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
                <div class="col-sm-2 col-xs-2 text-center " style="color:">
                    <span class="glyphicon glyphicon-th-list"></span>
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
        <div class="row text-center classify-bar">
            <div class="col-sm-3 col-xs-3">
                <a href="" class="indexcase text-center">
                    <img src="/Public/Home/img/images/bar_icon_2.png" class="img-responsive" />
                    <span>数码</span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >
                    <img src="/Public/Home/img/images/bar_icon_1.png" class="img-responsive" />
                    <span>户外</span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >
                    <img src="/Public/Home/img/images/bar_icon_3.png" class="img-responsive" />
                    <span>服饰</span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >
                    <img src="/Public/Home/img/images/bar_icon_4.png" class="img-responsive" />
                    <span>家具</span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >
                    <img src="/Public/Home/img/images/bar_icon_5.png" class="img-responsive" />
                    <span>手表</span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >
                    <img src="/Public/Home/img/images/bar_icon_6.png" class="img-responsive" />
                    <span>箱包</span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >
                    <img src="/Public/Home/img/images/bar_icon_7.png" class="img-responsive" />
                    <span>家电</span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-3">
                <a href="" >
                    <img src="/Public/Home/img/images/bar_icon_1.png" class="img-responsive" />
                    <span>玩具</span>
                </a>
            </div>
        </div>
        <!-- 拍卖品 -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 auction">
                <h3 class='text-center'>
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span>拍卖品</span>
                    <span class="circle3"></span>
                    <span class="circle2"></span>
                    <span class="circle1"></span>  
                </h3>
                <div class='row auction'>
                    <div class="col-xs-6 col-sm-6 auction-goods">
                        <a href="">
                            <img src="/Public/Home/img/images/e.jpg" class='img-responsive' >
                            <h5 class="text-right text-danger">正在拍卖...</h5>
                            <p class="text-left">
                                    info开机连接上了飞机啊林凤娇
                                </p>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 auction-goods">
                        <a href="" >
                            <img src="/Public/Home/img/images/f.jpg" class='img-responsive'>
                            <h5 class="text-right text-danger">正在拍卖...</h5>
                             <p class="text-left">
                                    info
                                </p>
                            
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 text-right more">
                    <a href="">more >>></a>
                </div>
            </div> 
        </div>
        <!--广告-->
        <div class="row">
            <img src="/Public/Home/img/xianyu/ad.jpg" class="img-responsive" style="width:100%">
        </div>
        <!--新鲜的、附近的-->
        <div class="row">
            <!-- 标题 -->
            <div class="col-sm-12 col-xs-12" id="menu-wrap">
                <div class="menu">
                    <nav class="navbar navbar-default" role="navigation">
                        <ul class="nav navbar-nav">
                            <li  role="presentation" class="col-sm-4 col-xs-4 col-sm-offset-1 col-xs-offset-1 active text-center">
                                <a href="javascript:">新鲜的</a>
                            </li>

                            <li  role="presentation" class="col-sm-4 col-xs-4 col-sm-offset-2 col-xs-offset-2 text-center">
                                <a href="javascript:">附近的</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- 商品 -->
            <div class="col-sm-12 col-xs-12 show-goods">
                <div class="row signal-goods">
                    <div class="col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-sm-3 col-xs-3 text-center">
                                <img src="/Public/Home/img/xianyu/aliuser_place_holder.jpg" alt="头像" class="img-responsive img-circle img-head">
                            </div>
                            <div class="col-sm-6 col-xs-6 user-info ">
                                <p>
                                    <span class="nick">昵称</span>
                                    <span class="icon">
                                        <img src="/Public/Home/img/xianyu/person_confirmed.png" class="img-responsive">
                                    </span>
                                </p>
                                <p>
                                    <span class="icon">
                                        <img src="/Public/Home/img/xianyu/items_exposure_care.png">
                                    </span>
                                    <span>已上架1小时</span>
                                </p>
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <p style="color: red">￥<span>1000.00</span></p>
                            </div>
                        </div>
                        <div class="row goods-img">
                            <div class="col-sm-4 col-xs-4">
                                <img src="/Public/Home/img/images/a.jpg" alt="showImg1"  class="img-responsive">
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <img src="/Public/Home/img/images/b.jpg" alt="showImg2"  class="img-responsive">
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <img src="/Public/Home/img/images/c.jpg" alt="showImg3"  class="img-responsive">
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-sm-12 col-xs-12">
                                描述；
                            </div>
                        </div>
                    </div>
                </div>
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