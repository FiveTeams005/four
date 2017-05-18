<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<<<<<<< HEAD
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
=======
<html class="um landscape min-width-240px min-width-320px min-width-480px min-width-768px min-width-1024px">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="/four/Public/Home/css/static/appcan/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="/four/Public/Home/css/static/appcan/ui-box.css">
        <link rel="stylesheet" href="/four/Public/Home/css/static/appcan/ui-base.css">
        <link rel="stylesheet" href="/four/Public/Home/css/static/appcan/ui-color.css">
        <link rel="stylesheet" href="/four/Public/Home/css/static/appcan/appcan.icon.css">
        <link rel="stylesheet" href="/four/Public/Home/css/static/appcan/appcan.control.css">
        <link rel="stylesheet" href="/four/Public/Home/css/center/center.css">
    </head>
    <body class="" ontouchstart>
        <div class="bc-bg" tabindex="0" data-control="PAGE" id="Page">
            <div class="uh bc-head  ubb bc-border" data-control="HEADER" id="Header">
                <div class="ub">
                    <div class="nav-btn" id="nav-left">
                        <div class="fa fa-1g ub-img1"></div>
                    </div>
                    <h1 class="ut ub-f1 ulev-3 ut-s tx-c" tabindex="0">登录</h1>
                    <div class="nav-btn" id="nav-right">
                        <div class="fa  fa-1g  ub-img1"></div>
                    </div>
                </div>
            </div>
            <div class="" data-control="CONTENT" id="ScrollContent">
  <div class="scrollbox">
    <div class="box_bounce ub ub-ver ub-pc">
      <div class="ub-f1">
      </div>
      <div class="bounce_status">下拉更新......</div>
      <div class="bounce_status">松手更新......</div>
      <div class="bounce_status">更新中......</div>
    </div>
    <div class="ub ub-ver">
      <div class=" umar-at1">
        <div id="listview1" class="ubt bc-border c-wh">
        </div>
        <div id="listview2" class="ubt bc-border c-wh umar-at1">
        </div>
      </div>
      <div id="listview3" class="ubt bc-border c-wh umar-at1">
      </div>
      <div id="listview4" class="ubt bc-border c-wh umar-at1">
      </div>
    </div>
  </div>
</div>

        </div>
        <script src="/four/Public/Home/js/static/appcan/appcan.js"></script>
        <script src="/four/Public/Home/js/static/appcan/appcan.control.js"></script>
        <script src="/four/Public/Home/js/static/appcan/appcan.scrollbox.js"></script>
        <script src="/four/Public/Home/js/static/appcan/template.import.js"></script>
        <script src="/four/Public/Home/js/static/appcan/appcan.listview.js"></script>
        <script src="/four/Public/Home/js/static/appcan/appcan.optionList.js"></script>
        <script src="/four/Public/Home/js/static/appcan/appcan.slider.js"></script>
        <script src="/four/Public/Home/js/static/appcan/appcan.tab.js"></script>
        <script src="/four/Public/Home/js/static/appcan/appcan.treeview.js"></script>
        <script src="/four/Public/Home/js/center/center.js"></script>
    </body>
>>>>>>> origin/master
</html>