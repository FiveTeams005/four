$(function(){
	// 密码重置点击事件
	$(".reset").click(function(){
		var aid = $(this).attr("aid");
		layer.msg('确定重置？', {
		  	time: 0,
		  	btn: ['确定', '取消'],
		  	yes: function(index){
		    	layer.close(index);
		    	$.ajax({
		    		url:urlReset,
		    		type:'POST',
		    		data:{aid:aid},
		    		success:function(data){
		    			layer.alert(data);
		    		}
		    	})
		  	}
		});
	})
	// 修改按钮点击事件
	$(".update").click(function(){
		var aid = $(this).attr("aid");
		layer.msg('确定修改？', {
		  	time: 0,
		  	btn: ['确定', '取消'],
		  	yes: function(index){
		    	layer.close(index);
		    	$.ajax({
		    		url:urlUpdate,
		    		type:'POST',
		    		data:{aid:aid,nick:$("#nick").val(),rid:$("#rid option:selected").attr("value")},
		    		success:function(data){
		    			layer.alert(data,{
		    				time:0,
		    				btn: ['确定'],
		    				yes: function(index){
		    					layer.close(index);
		    					if(data == "修改成功！"){
		    						location.href = url;
		    					}
		    				}
		    			});
		    		}
		    	})
		  	}
		});
	})
})