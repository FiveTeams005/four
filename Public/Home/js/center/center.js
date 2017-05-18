(function($) {
    appcan.button("#nav-left", "btn-act",
    function() {});
    appcan.button("#nav-right", "btn-act",
    function() {});

    appcan.ready(function() {
        $.scrollbox($("body")).on("releaseToReload",
        function() { //After Release or call reload function,we reset the bounce
            $("#ScrollContent").trigger("reload", this);
        }).on("onReloading",
        function(a) { //if onreloading status, drag will trigger this event
        }).on("dragToReload",
        function() { //drag over 30% of bounce height,will trigger this event
        }).on("draging",
        function(status) { //on draging, this event will be triggered.
        }).on("release",
        function() { //on draging, this event will be triggered.
        }).on("scrollbottom",
        function() { //on scroll bottom,this event will be triggered.you should get data from server
            $("#ScrollContent").trigger("more", this);
        }).hide();
    })

	appcan.ready(function() {
        })
        var lv1 = appcan.listview({
            selector : "#listview1",
            type : "thickLine",
            hasIcon : true,
            hasAngle : true,
            hasSubTitle : false,
            multiLine : 1
        });
        lv1.set([{
            icon : 'aaa/css/myImg/myImg6.png',
            title : '<div class="ub"><div class="umar-ar3">用户名</div><div class="sc-bg-alert uc-a1 uinn3 ulev-2 bc-text-head">V<span class="ulev-2">2</span>会员</div></div>',
            describe : '帐号：admin'
        }]);
        var lv2 = appcan.listview({
            selector : "#listview2",
            type : "thinLine",
            hasIcon : true,
            hasAngle : true,
            hasSubTitle : true,
            multiLine : 1
        });
        lv2.set([{
            icon : 'aaa/css/myImg/myImg1.png',
            title : '我的相册',
            subTitle : '备注文字'
        }, {
            icon : 'aaa/css/myImg/myImg2.png',
            title : '我的收藏',
            subTitle : ''
        }, {
            icon : 'aaa/css/myImg/myImg3.png',
            title : '我的银行卡',
            subTitle : ''
        }]);
        var lv3 = appcan.listview({
            selector : "#listview3",
            type : "thinLine",
            hasIcon : true,
            hasAngle : true,
            multiLine : 1
        });
        lv3.set([{
            icon : 'aaa/css/myImg/myImg4.png',
            title : '<div class="ub">表情包<div class=" uwh-FP2 uc-a-FP1 sc-bg-alert bc-text-head ulev-4 ufm1 ub ub-ac ub-pc">NEW</div></div>'
        }]);
        var lv4 = appcan.listview({
            selector : "#listview4",
            type : "thinLine",
            hasIcon : true,
            hasAngle : true,
            multiLine : 1
        });
        lv4.set([{
            icon : 'aaa/css/myImg/myImg5.png',
            title : '设置'
        }]);
})($);