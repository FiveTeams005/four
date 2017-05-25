/**
 * Created by Administrator on 2017/5/20.
 */
function Package_Publish(img,title,price,zan,message,scan) {
  this.img=img;
  this.title=title;
  this.price=price;
  this.zan=zan;
  this.message=message;
  this.scan=scan;
  this.Ocontainer=$('<div class="container">' +
      '<div class="row">' +
      '<div class="col-xs-3 goods-img">' +
      '<img  src='+this.img+'></div> ' +
      '<div class="col-xs-9 goods-detail"> ' +
      '<p>'+this.title+'</p><p style="color:rgb(224, 18, 34);font-weight:800;">￥'+this.price+'</p><p><span>点赞'+this.zan+'</span><span>·留言'+this.message+'</span><span>·浏览'+this.scan+'</span></p> ' +
      '</div> </div> <div class="row edit-goods"> ' +
      '<div class="col-xs-12 text-right"> ' +
      '<button type="button" class="btn">编辑</button> <button type="button" class="btn">下架</button> ' +
      '</div> </div> </div>')
  this.Ocontainer.css({
    "background-color":"#fff","border-top":"1px solid #ccc"
  })
    this.setFather=function(id){
        this.Ocontainer.appendTo($("#"+id));
    }
}
function Package_MyBuy(img,title,price,status) {
    this.img=img;
    this.title=title;
    this.price=price;
    this.status=status;
    this.Ocontainer=$('<div class="container">' +
        '<div class="row">' +
        '<div class="col-xs-3" style="padding: 0">' +
        '<img  src='+this.img+' style="width: 100%"></div> ' +
        '<div class="col-xs-9" style="margin-top: 10px;"> ' +
        '<p>'+this.title+'</p><p style="color:rgb(224, 18, 34);font-weight:800;">￥'+this.price+'</p><p>'+this.status+'</p> ' +
        '</div> </div> <div class="row" style="border-top: 1px solid #ccc"><div class="col-xs-4 text-left" style="line-height: 30px"><img src="'+path+'home/img/xianyu/comment_small.png">联系卖家</div> ' +
        '<div class="col-xs-8 text-right"> ' +
        '<button type="button" class="btn" style="margin: 4px 0;background-color: #fff;border: 1px solid #0f0f0f;border-radius: 0;height:30px;">删除订单</button> ' +
        '</div> </div> </div>')
    this.Ocontainer.css({
        "background-color":"#fff","border":"1px solid #ccc","margin":"5px"
    })
    this.setFather=function(id){
        this.Ocontainer.appendTo($("#"+id));
    }
}