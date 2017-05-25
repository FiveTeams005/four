
$(function(){
	// 全选复选框点击事件
	$("#chooseAll").click(function(){
		if($(this).prop("checked")){
			$("tbody input[type='checkbox']").prop("checked",true);
		}
		else{
			$("tbody input[type='checkbox']").prop("checked",false);
		}
	})
	// 单行复选框点击事件
	$("tbody").on('click',"input[type='checkbox']",function(){
		for(var i = 0;i < $("tbody input[type='checkbox']").length;i++){
			if($("tbody input[type='checkbox']:eq("+i+")").prop('checked') == false){
				$("#chooseAll").prop("checked",false);
				break;
			}
			else if(i == $("tbody input[type='checkbox']").length-1){
				$("#chooseAll").prop("checked",true);
			}
		}
	})
	// 删除按钮点击事件
	$("#del").click(function(){
		var ary = [];
		for(var i = 0;i < $("tbody input[type='checkbox']").length;i++){
			if($("tbody input[type='checkbox']:eq("+i+")").prop("checked")){
				ary.push($("tbody input[type='checkbox']:eq("+i+")").attr("rid"));
			}
		}
		if(ary.length != 0){
			var str = ary.join(",");
			$.ajax({
				url:urlDel,
				type:'POST',
				data:{a_id:str},
				success:function(data){
					layer.alert(data,{
	    				time:0,
	    				btn: ['确定'],
	    				yes:function(index){
	    					layer.close(index);
	    					if(data == '删除用户成功！'){
	    						location.href = url;
	    					}
	    				}
		    		})
				}
			})
		}
	})
	// 单行删除点击事件
	$("tbody").on('click','.del',function(){
		$.ajax({
			url:urlDel,
			type:'POST',
			data:{a_id:$(this).attr("rId")},
			success:function(data){
				layer.alert(data,{
    				time:0,
    				btn: ['确定'],
    				yes:function(index){
    					layer.close(index);
    					if(data == '删除用户成功！'){
    						location.href = url;
    					}
    				}
	    		})
			}
		})
	})
	// 锁定/解锁单击事件
	$("tbody").on('click','.lock',function(){
		var status;
		if($(this).attr("status") == 1){
			status = 0;
		}
		else{
			status = 1;
		}
		$.ajax({
			url:urlLock,
			type:'POST',
			data:{a_id:$(this).attr("rId"),a_stutas:status},
			success:function(data){
				layer.alert(data,{
    				time:0,
    				btn: ['确定'],
    				yes:function(index){
    					layer.close(index);
    					if(data == '锁定用户成功！' || data == '解锁用户成功！'){
    						location.href = url;
    					}
    				}
	    		})
			}
		})
	})

	// 分页居中样式
	$("#pageBox>div").css("margin-left",(parseFloat($("#pageBox>div").css("width"))/-2)+"px");
})
