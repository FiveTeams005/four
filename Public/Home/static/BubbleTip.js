//气泡提示；
/*
*	@param num 消息的数量
*	@param top,left,bottom,right 提示气泡的位置（绝对定位）；
*	@param appendID		要添加到的父元素；
**/
function BubbleTip(num,appendID,top,left){
	this.num = num;//信息数量
	this.top = top;//气泡位置；
	this.left = left;
	this.appendID = appendID;//要添加到的父元素；

	this.span = '<span class="bubble-tip" style="display:inline-block;padding:0 4px; background-color: #E20000;color:#fff;border-radius:14px;font-size:9px;position:absolute;top:'+this.top+';left:'+this.left+'">'+this.num+'</span>';
	
	if($(this.appendID).css('position') == 'static' || 
		$(this.appendID).css('position') == '' || 
		$(this.appendID).css('position') == null || 
		$(this.appendID).css('position') == undefined)
	{	
		$(this.appendID).css('position','relative');
	}
	$(this.appendID).append(this.span);
}

