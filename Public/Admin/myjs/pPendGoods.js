$(function(){
	// 通过按钮点击事件
	$(".pass").click(function(){
		$.ajax({
			url:urlPass,
			type:'POST',
			data:{pid:$(".num").attr("pid")},
			success:function(data){
				layer.alert(data,{
    				time:0,
    				btn: ['确定'],
    				yes:function(index){
    					layer.close(index);
    					if(data == '审核通过！'){
    						location.href = url;
    					}
    				}
	    		})
			}
		})
	})
	// 驳回按钮点击事件
	$(".reject").click(function(){
		$.ajax({
			url:urlReject,
			type:'POST',
			data:{pid:$(".num").attr("pid")},
			success:function(data){
				layer.alert(data,{
    				time:0,
    				btn: ['确定'],
    				yes:function(index){
    					layer.close(index);
    					if(data == '已驳回！'){
    						location.href = url;
    					}
    				}
	    		})
			}
		})
	})
})