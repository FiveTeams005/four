$(function () {
	new Loading();
    var Obottom=new showBtm(3);
    Obottom.setFather("footer");

    $('#loading').remove();

    var user = MVC('Home','Center','info');
    $.post(user,{},function (data) {
        $("#nickName").text(data[0][0]['h_nick']);
        $("#head_por").attr("src",data[0][0]['h_head']);
        $("#b_praised").text(data[5].length);
        if(data[0][0]['h_grade']==1){var grade = '白银I'}
        if(data[0][0]['h_grade']==2){var grade = '白银II'}
        if(data[0][0]['h_grade']==3){var grade = '白银III'}
        if(data[0][0]['h_grade']==4){var grade = '黄金I'}
        if(data[0][0]['h_grade']==5){var grade = '黄金II'}
        if(data[0][0]['h_grade']==6){var grade = '黄金III'}
        if(data[0][0]['h_grade']==7){var grade = '砖石I'}
        if(data[0][0]['h_grade']==8){var grade = '砖石II'}
        if(data[0][0]['h_grade']==9){var grade = '砖石III'}
        if(data[0][0]['h_grade']==10){var grade = '金砖'}
        $("#grade").text(grade);
        $("#reputation").text(data[0][0]['h_honor']);
        $("#release").text(data[1].length)
        $("#sellOut").text(data[3].length)
        $("#buyOne").text(data[2].length)
        $("#zan").text(data[4].length)
    },'json');

})