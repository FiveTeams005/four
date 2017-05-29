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
				ary.push($("tbody input[type='checkbox']:eq("+i+")").attr("oid"));
			}
		}
		if(ary.length != 0){
			var str = ary.join(",");
			$.ajax({
				url:urlDel,
				type:'POST',
				data:{o_id:str},
				success:function(data){
					layer.alert(data,{
	    				time:0,
	    				btn: ['确定'],
	    				yes:function(index){
	    					layer.close(index);
	    					if(data == '删除订单成功！'){
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
			data:{o_id:$(this).attr("oId")},
			success:function(data){
				layer.alert(data,{
    				time:0,
    				btn: ['确定'],
    				yes:function(index){
    					layer.close(index);
    					if(data == '删除订单成功！'){
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