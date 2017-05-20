/*
*	首页商品显示插件；基于bootstrap 样式；基于jquery 插件；
*/
/*
* @param nick 					用户昵称；
* @param headImg 				用户头像；
* @param goodsPrice 			商品价格；
* @param goodsImg（array）  	商品图片；
* @param goodsInfo				商品描述；
* @param time					商品上架时间；
* @param pId					要显示的父元素；
* 样式路径‘ __PUBLIC__/Home/css/static/goods/GoodsStyle.css ’;
**/
function Goods(nick,headImg,goodsPrice,goodsImg,goodsInfo,time,pId){
	this.nick 		= nick;
	this.headImg 	= headImg;
	this.goodsPrice = goodsPrice;
	this.goodsImg 	= goodsImg;
	this.goodsInfo	= goodsInfo;
	this.time 		= time;
	this.pId		= pId;
	this.oDiv = '<div class="row signal-goods"></div>';
	this.oDiv.html('\
                    <div class="col-sm-12 col-xs-12">\
                        <div class="row">\
                            <div class="col-sm-3 col-xs-3 text-center">\
                                <img src="'+this.headImg+'" alt="头像" class="img-responsive img-circle img-head">\
                            </div>\
                            <div class="col-sm-6 col-xs-6 user-info ">\
                                <p>\
                                    <span class="nick">'+this.nick+'</span>\
                                    <span class="icon">\
                                        <img src="__PUBLIC__/Home/img/xianyu/person_confirmed.png" class="img-responsive">\
                                    </span>\
                                </p>\
                                <p>\
                                    <span class="icon">\
                                        <img src="__PUBLIC__/Home/img/xianyu/items_exposure_care.png">\
                                    </span>\
                                    <span>已发布'+this.time+'</span>\
                                </p>\
                            </div>\
                            <div class="col-sm-3 col-xs-3">\
                                <p style="color: red">￥<span>'+this.goodsPrice+'</span></p>\
                            </div>\
                        </div>\
                        <div class="row goods-img">\
                            \
                        </div>\
                        <div clas="row">\
                            <div class="col-sm-12 col-xs-12">\
                                '+this.goodsInfo+'\
                            </div>\
                        </div>\
                    </div>\
		');
	$(this.pId).append(this.oDiv);
	var len = this.goodsImg.lenght >= 3? 3 : this.goodsImg.lenght;
	for(var i = 0; i < len; i++ ){
		$('.goods-img').append('\
							<div class="col-sm-4 col-xs-4">\
                                <img src="'+this.goodsImg[i]+'" alt="showImg1"  class="img-responsive">\
                            </div>'
                            );
	}
}