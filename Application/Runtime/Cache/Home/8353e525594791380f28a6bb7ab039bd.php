<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>商品详情</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Public/static/resetcss/normalize.css">
    <link rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/detail/detailStyle.css">

    <script src="/Public/static/jquery/jquery.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/static/vue/vue.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
                <div class="col-sm-3 col-xs-3 text-center">
                    <img src="/Public/Home/img/xianyu/aliuser_place_holder.jpg" alt="头像" class="img-responsive img-circle img-head">
                </div>
                <div class="col-sm-6 col-xs-6 user-info">
                    <p>
                        <span class="nick">昵称</span>
                        <span class="icon">
                            <img src="/Public/Home/img/xianyu/person_confirmed.png" class="img-responsive">
                        </span>
                    </p>
                    <p>
                        <span class="icon">
                            <img src="/Public/Home/img/xianyu/items_exposure_care.png" class="img-responsive">
                        </span>
                        <span>已上架1小时</span>
                    </p>
                </div>
                <div class="col-sm-3 col-xs-3 text-right">
                    <p>
                    	<span>一口价</span>
                    	<span class="text-danger">￥<span class="price">1000.00</span></span>
                    </p>
                </div>
            </div>
		</div>
	</header>
	<!-- 中间 -->
	<div class="container" id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				
			</div>
		</div>
		
	</div>
	<!-- 底部 -->
	<footer class="navbar-fixed-bottom">
		<div class="container-fluit">
			<div class="row text-center">
				<div class="col-xs-2 col-sm-2 text-right l-btn">
					<img src="/Public/Home/img/xianyu/comment.png" class="img-responsive">
					<br>
					<span>留言&nbsp;</span>
				</div>
				<div class="col-xs-2 col-sm-2 text-center z-btn">
					<img src="/Public/Home/img/xianyu/love_gray.png" class="img-responsive">
					<br>
					<span>点赞</span>
				</div>
				<div class="col-xs-4 col-sm-4 auction-btn">
					
				</div>
				<div class="col-xs-4 col-sm-4 want-btn">
					我 想 要
				</div>
			</div>
		</div>
	</footer>
</body>
</html>