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
	// 单行锁定/解锁事件
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
			data:{h_id:$(this).attr("hId"),h_stutas:status},
			success:function(data){
				layer.alert(data,{
    				time:0,
    				btn: ['确定'],
    				yes:function(index){
    					layer.close(index);
    					if(data == '操作成功！'){
    						location.href = url;
    					}
    				}
	    		})
			}
		})
	})
	// 解锁按钮点击事件
	$("#unLock").click(function(){
		huserLock(1);
	})
	// 锁定按钮点击事件
	$("#Lock").click(function(){
		huserLock(0);
	})
	// 锁定/解锁 函数
	function huserLock(h_stutas){
		var ary = [];
		for(var i = 0;i < $("tbody input[type='checkbox']").length;i++){
			if($("tbody input[type='checkbox']:eq("+i+")").prop("checked")){
				ary.push($("tbody input[type='checkbox']:eq("+i+")").attr("rid"));
			}
		}
		if(ary.length != 0){
			var str = ary.join(",");
			$.ajax({
				url:urlLock,
				type:'POST',
				data:{h_id:str,h_stutas:h_stutas},
				success:function(data){
					layer.alert(data,{
	    				time:0,
	    				btn: ['确定'],
	    				yes:function(index){
	    					layer.close(index);
	    					if(data == '操作成功！'){
	    						location.href = url;
	    					}
	    				}
		    		})
				}
			})
		}
	}

	// 分页居中样式
	$("#pageBox>div").css("margin-left",(parseFloat($("#pageBox>div").css("width"))/-2)+"px");
})