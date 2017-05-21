<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="um landscape min-width-240px min-width-320px min-width-480px min-width-768px min-width-1024px">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="/Public/Home/css/static/appcan/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="/Public/Home/css/static/appcan/ui-box.css">
        <link rel="stylesheet" href="/Public/Home/css/static/appcan/ui-base.css">
        <link rel="stylesheet" href="/Public/Home/css/static/appcan/ui-color.css">
        <link rel="stylesheet" href="/Public/Home/css/static/appcan/appcan.icon.css">
        <link rel="stylesheet" href="/Public/Home/css/static/appcan/appcan.control.css">
        <link rel="stylesheet" href="/Public/Home/css/login/login.css">
    </head>
    <body class="" ontouchstart>
        <div class="bc-bg" tabindex="0" data-control="PAGE" id="Page">
            <div class="uh bc-head  ubb" data-control="HEADER" id="Header">
                <div class="ub">
                   
                    <p class=" ub-f1 ulev-3 ut-s tx-c" tabindex="0">用户登录</p>
                    
                </div>
            </div>
            <div class="bc-bg ub ub-ver ub-ac ub-con" data-control="FLEXBOXVER" id="ContentFlexVer">
                <div class="ub ub-ver uinn-a3 ub-fv ub-fh">
                    <div class="ub ub-ver uinn-a4">
                        <form method="post" action=" ">
                            <div class="umar-a uba bc-border c-wh">
                                <div class="ub ub-ac ubb umh5 bc-border ">
                                    <div class=" uinput ub ub-f1">
                                        <div class="uinn fa fa-user sc-text"></div>
                                        <input placeholder="手机/邮箱/用户名" type="text" name="account" class="ub-f1">
                                    </div>
                                </div>
                                <div class="ub ub-ac umh5 bc-border ">
                                    <div class=" uinput ub ub-f1">
                                        <div class="uinn fa fa-lock sc-text"></div>
                                        <input placeholder="密码" type="password" name="pwd" class="umw4 ub-f1">
                                    </div>
                                </div>
                            </div>
                            <div class="ub ub-ver">
                                <a href="javascript:" class="ub ub-pe sc-text-active ulev-4">
                                    忘记密码
                                </a>
                                <div class="uinn-at1">
                                    <input type="submit" name="submit" value="登 录" id="submit" />
                                </div>
                                <div class="uinn-at2 ub sc-text-active ulev-4">
                                    <a href="<?php echo u('Home/Login/reg');?>" class="ub-f1">
                                        立即注册
                                    </a>
                                    <div class="ub-f1 tx-r">
                                        无账号快捷登录
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
        <!-- <script src="/Public/Home/js/login/login.js"></script> -->
    </body>
</html>