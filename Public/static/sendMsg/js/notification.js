/**
 * Created by Let Aurn IV on 22/09/2015.
 */

/*global  $*/

Notification = window.Notification || {};

Notification = function () {

    'use strict';

    var number = 0;
    var incPosition = 78;

    var template = function ( text, image, position,rel) {
        // incPosition = number * 120;
        number = number + 1;
        var textHtml = '<div style="fontSize:12px!important;" class="text push" rel='+rel+'>' + text + '</div>';
        // var titleHtml = (!title ? '' : '<div class="title">' + title + '</div>');
        var imageHtml = (!image ? '' : '<div class="illustration"><img src="' + image + '" width="30" height="30" /></div>');
        var style;
        switch (parseInt(position, 10)) {
            case 1:
                style = "top:" + incPosition + "px; left:20px;";
                break;
            case 2:
                style = "top:" + incPosition + "px; right:20px;";
                break;
            case 3:
                style = "bottom:" + incPosition + "px; right:5%;";
                break;
            case 4:
                style = "bottom:" + incPosition + "px; left:20px;";
                break;
            default:
                ;
        }
        return {
            id: number,
            content: '<div class="notification notification-' + number + ' " style="' + style + '">' +
                '<div class="dismiss" >&#10006;</div>' +
                imageHtml +
                '<div class="text">'  + textHtml + '</div>' +
                '</div>'
        };
    };

    var hide = function (id) {
        $(document).find('.notification-' + id).remove();
        number = number - 1;
    };

    var create = function (text, image, animation, position,rel,delay) {
        var notification = template( text, image, position,rel);
        $(notification.content).addClass('animated ' + animation).appendTo('body');
        if (!delay) {
            delay = 50;
        }
        setTimeout(function () {
            hide(notification.id);
        }, 1000 * delay);
    };

    return {
        create: create
    };

}();
