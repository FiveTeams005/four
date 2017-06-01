<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
        <link rel="stylesheet" href="/four/Public/Home/css/login/login.css">
        <script src="/four/Public/static/jquery/jquery.min.js"></script>
    </head>
    <body>
        <div class="bc-bg" tabindex="0" data-control="PAGE" id="Page">
            <div class="uh bc-head  ubb" data-control="HEADER" id="Header">
                <div class="ub">
                    <p class=" ub-f1 ulev-3 ut-s tx-c" tabindex="0">用户登录
                    </p>
                </div>
            </div>
            <div class="bc-bg ub ub-ver ub-ac ub-con" data-control="FLEXBOXVER" id="ContentFlexVer">
                <div class="ub ub-ver uinn-a3 ub-fv ub-fh">
                    <div class="ub ub-ver uinn-a4">
                        <form method="post" action=" ">
                            <div class="umar-a uba bc-border c-wh">
                                <div class="ub ub-ac ubb umh5 bc-border ">
                                    <div class="uinput ub ub-f1">
                                        <div class="uinn fa fa-user sc-text"></div>
                                        <input id="user" placeholder="手机/邮箱/用户名" type="text" name="account" class="ub-f1">
                                    </div>
                                </div>
                                <div class="ub ub-ac ubb umh5 bc-border ">
                                    <div class="uinput ub ub-f1">
                                        <div class="uinn fa fa-lock sc-text"></div>
                                        <input id="pwd" placeholder="密码" type="password" name="pwd" class="umw4 ub-f1">
                                    </div>
                                </div>
                                <div class="ub ub-ac umh5 bc-border">
                                    <div class="uinput ub ub-f1">
                                        <div class="uinn sc-text">
                                            <img src="/four/Public/Home/img/images/login_code_1.png" style="max-height: 17px;">
                                        </div>
                                        <input id="code2" placeholder="验证码" type="text" name="code" class="ub-f1">
                                        <div class="code-box">
                                            <img src="<?php echo U('Home/Login/code');?>" alt='验证码' id="code" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ub ub-ver">
                                <a href="javascript:" class="ub ub-pe sc-text-active ulev-4">
                                    忘记密码
                                </a>
                                <div class="uinn-at1">
                                    <input type="button" name="submit" value="登 录" id="submit" />
                                </div>
                                <div class="uinn-at2 ub sc-text-active ulev-4">
                                    <a href="<?php echo u('Home/Login/regGetCode');?>" class="ub-f1">
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
        <script>
            function  MVC(a,b,c) {
                var a1 = "<?php echo U('"+a+"/"+b+"/"+c+"');?>"
                return a1;
            }
        </script>
        <script src="/four/Public/Home/js/login/login.js"></script>
        <script src="/four/Public/static/layer/layer.js"></script>
    </body>
</html>