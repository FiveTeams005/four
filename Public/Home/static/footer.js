/**
 * Created by Administrator on 2017/5/24.
 */
function showBtm(aflag) {
    var mysrc=0;
    //判定传的参数的值，对应相应img路径
    switch (aflag){
        case 0:
            mysrc=path+"Home/img/xianyu/comui_tab_home_selected.png";
            break;
        case 1:
            mysrc=path+"Home/img/xianyu/comui_tab_custom_head_selected.png";
            break;
        case 2:
            mysrc=path+"Home/img/xianyu/comui_tab_message_selected.png";
            break;
        case 3:
            mysrc=path+"Home/img/xianyu/comui_tab_person_selected.png";
            break;
    }
    this.Ocontainer1=$('<div class="container" id="Ocontainer1">' +
        '<div class="row text-center"></div></div>');

    this.odiv1=$('<div class="col-sm-2 col-xs-2 text-center">' +
    '<a href="'+MVC("Home","Index","index")+'" style="display: block"><div class="row">' +
    '<img src="'+path+'Home/img/xianyu/comui_tab_home.png"  alt="" /></div>' +
    '<div class="row"><span class="myspan">首页</span></div></a></div>');

    this.odiv2=$('<div class="col-sm-2 col-xs-2 text-center">' +
    '<a href="'+MVC("Home","Server","server")+'" style="display: block"><div class="row">' +
    '<img src="'+path+'Home/img/xianyu/comui_tab_custom_head.png"  alt=""></div>' +
    '<div class="row"><span class="myspan">客服</span></div></a></div>');

    this.odiv3=$('<div class="col-sm-4 col-xs-4 publish text-center cd-bouncy-nav-trigger">' +
    '<div class="row"><img src="'+path+'Home/img/xianyu/comui_tab_post.png" alt=""></div>' +
    '<div class="row publish-txt">' +
    '<span class="myspan">发布</span></div></div>');

    this.odiv4=$('<div class="col-sm-2 col-xs-2 text-center">' +
        '<a href="'+MVC("Home","Message","message")+'" style="display: block"><div class="row">' +
    '<img src="'+path+'Home/img/xianyu/comui_tab_message.png" alt=""></div>' +
    '<div class="row"><span class="myspan">消息</span></div></a></div>');

    this.odiv5=$('<div class="col-sm-2 col-xs-2 text-center">' +
        '<a href="'+MVC("Home","Center","Center")+'" style="display: block"><div class="row">' +
    '<img src="'+path+'Home/img/xianyu/comui_tab_person.png" alt=""></div>' +
    '<div class="row"><span class="myspan">我的</span></div></a></div>');

    this.Ocontainer1.append(this.odiv1).append(this.odiv2).append(this.odiv3).append(this.odiv4).append(this.odiv5);
  //点击发布按钮弹出发布选择框
    $(this.odiv3).click(function () {
        triggerBouncyNav(true);
    });
    this.Ocontainer2=$('<div class="sucaihuo-container"></div>');
    this.ofb1=$('<div class="cd-bouncy-nav-modal"></div>');
    this.ofb2=$('<nav><ul class="cd-bouncy-nav">' +
        '<li><a href="'+MVC("Home","Publish","Publish")+'">卖二手</a></li>' +
        '<li><a href="'+MVC("Home","Publish","PublishAuction")+'">拍卖</a></li>' +
        '<li class="publishMd"><a href="#">发布流程</a></li>' +
        '</ul></nav>');
    this.ofb3=$('<a href="#0" class="cd-close">Close modal</a>');
    this.ofb1.append(this.ofb2).append(this.ofb3);
    this.Ocontainer2.append(this.ofb1);
    //点击关闭显示
    $(this.ofb3).click(function () {
        triggerBouncyNav(false);
    })
    $(this.ofb1).click(function (event) {
        if ($(event.target).is('.cd-bouncy-nav-modal')) {
            triggerBouncyNav(false);
        }
    })
    $(this.ofb2).on("click","ul .publishMd",function () {
        $(".publish-img").show();
    })
    $(".close").click(function () {
        $(".publish-img").hide();
    })
    //拼接给父元素
    this.setFather=function(id){
        this.Ocontainer1.appendTo($("#"+id));
        this.Ocontainer2.appendTo($("body"));
    }
    // alert($(this.Ocontainer1).find("a").length);
    for(var i=0;i<$(this.Ocontainer1).find("a").length;i++){
        if(i==aflag){
            $(this.Ocontainer1).find("a").eq(i).attr("href","javascript:0");
            $(this.Ocontainer1).find("a").eq(i).find('img').attr("src",mysrc);
        }
    }
    var is_bouncy_nav_animating = false;
    function triggerBouncyNav($bool) {
        //点击若没有动画
        if (!is_bouncy_nav_animating) {
            is_bouncy_nav_animating = true;
            //切换菜单动画
            $('.cd-bouncy-nav-modal').toggleClass('fade-in', $bool).toggleClass('fade-out', !$bool).find('li:last-child').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function() {
                $('.cd-bouncy-nav-modal').toggleClass('is-visible', $bool);
                if (!$bool)
                    $('.cd-bouncy-nav-modal').removeClass('fade-out');
                is_bouncy_nav_animating = false;
            });
            //判断css 动画是否开启..
            if ($('.cd-bouncy-nav-trigger').parents('.no-csstransitions').length > 0) {
                $('.cd-bouncy-nav-modal').toggleClass('is-visible', $bool);
                is_bouncy_nav_animating = false;
            }
        }
    }
}