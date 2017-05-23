/**
 * Created by Administrator on 2017/5/23.
 */
$(function() {
    //alert($(window).height());
    $('.about-us').click(function() {
        $('#code').center();
        $('#goodcover').show();
        $('#code').fadeIn();
    });
    $('#closebt').click(function() {
        $('#code').hide();
        $('#goodcover').hide();
    });
    $('#goodcover').click(function() {
        $('#code').hide();
        $('#goodcover').hide();
    });
    /*var val=$(window).height();
     var codeheight=$("#code").height();
     var topheight=(val-codeheight)/2;
     $('#code').css('top',topheight);*/
    jQuery.fn.center = function(loaded) {
        var obj = this;
        body_width = ($(window).width());
        body_height =($(window).height());
        block_width = (obj.width());
        block_height =(obj.height());

        left_position =((body_width / 2) - (block_width / 2) + $(window).scrollLeft()+'px');
        top_position =((body_height / 2) - (block_height / 2) + $(window).scrollTop()+'px');
        if (!loaded) {

            obj.css({
                'position': 'absolute'
            });
            obj.css({
                'top': (($(window).height()/2) - ($('#code').height()/2)+'px'),
                'left': (($(window).width()/2) - ($('#code').width()/2)+'px'),
            });
            $(window).bind('resize', function() {
                obj.center(!loaded);
            });
            $(window).bind('scroll', function() {
                obj.center(!loaded);
            });

        } else {
            obj.stop();
            obj.css({
                'position': 'absolute'
            });
            obj.animate({
                'top': top_position
            }, 200, 'linear');
        }
    }
})