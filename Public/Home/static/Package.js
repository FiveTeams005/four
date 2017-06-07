/**
 * Created by Administrator on 2017/5/20.
 */
function Package_Publish(img,title,price,zan,message,scan,h_id) {
  this.img=img;
  this.title=title;
  this.price=price;
  this.zan=zan;
  this.message=message;
  this.scan=scan;
  this.h_id=h_id;
  this.Ocontainer=$('<div class="container">' +
      '<div class="row">' +
      '<div class="col-xs-3 goods-img">' +
      '<img  src='+this.img+'></div> ' +
      '<div class="col-xs-9 goods-detail"> ' +
      '<p>'+this.title+'</p><p style="color:rgb(224, 18, 34);font-weight:800;">￥'+this.price+'</p><p><span>点赞'+this.zan+'</span><span>·留言'+this.message+'</span><span>·状态:'+this.scan+'</span></p> ' +
      '</div> </div> <div class="row edit-goods"> ' +
      '<div class="col-xs-12 text-right"> ' +
      '<button type="button" class="btn">编辑</button> <button sign='+this.h_id+' type="button" class="btn shelves">下架</button> ' +
      '</div> </div> </div>')
  this.Ocontainer.css({
    "background-color":"#fff","border-top":"1px solid #eee"
  })
    this.setFather=function(id){
        this.Ocontainer.appendTo($("#"+id));
    }
}
function Package_MyBuy(img,title,price,status,id) {
    this.img=img;
    this.title=title;
    this.price=price;
    this.status=status;
    this.id = id;
    this.Ocontainer=$('<div class="container">' +
        '<div class="row">' +
        '<div class="col-xs-3" style="padding: 0">' +
        '<img  src='+this.img+' style="width: 100%"></div> ' +
        '<div class="col-xs-9" style="margin-top: 10px;"> ' +
        '<p>'+this.title+'</p><p style="color:rgb(224, 18, 34);font-weight:800;">￥'+this.price+'</p><p>'+this.status+'</p> ' +
        '</div> </div> <div class="row" style="border-top: 1px solid #eee"><div class="col-xs-4 text-left" style="line-height: 30px"><img src="'+path+'Home/img/xianyu/comment_small.png">联系卖家</div> ' +
        '<div class="col-xs-8 text-right"> ' +
        '<button onclick="fun1('+this.id+')" type="button" class="btn" style="margin: 4px 0;background-color: #fff;border: 1px solid #eee;border-radius: 0;height:30px;">删除订单</button> ' +
        '</div> </div> </div>')
    this.Ocontainer.css({
        "background-color":"#fff","border":"1px solid #eee","margin":"5px"
    })
    this.setFather=function(id){
        this.Ocontainer.appendTo($("#"+id));
    }
}

function Package_Publish2(img,title,price,zan,message,scan,h_id) {
    this.img=img;
    this.title=title;
    this.price=price;
    this.zan=zan;
    this.message=message;
    this.scan=scan;
    this.h_id=h_id;
    this.Ocontainer=$('<div class="container">' +
        '<div class="row">' +
        '<div class="col-xs-3 goods-img">' +
        '<img  src='+this.img+'></div> ' +
        '<div class="col-xs-9 goods-detail"> ' +
        '<p>'+this.title+'</p><p style="color:rgb(224, 18, 34);font-weight:800;">￥'+this.price+'</p><p><span>点赞'+this.zan+'</span><span>·留言'+this.message+'</span><span>·浏览'+this.scan+'</span></p> ' +
        '</div> </div> <div class="row edit-goods"> ' +
        '<div class="col-xs-12 text-right"> ' +
        '<button type="button" class="btn shelves" onclick="fun1('+this.h_id+')">上架</button> ' +
        '</div> </div> </div>')
    this.Ocontainer.css({
        "background-color":"#fff","border-top":"1px solid #eee"
    })
    this.setFather=function(id){
        this.Ocontainer.appendTo($("#"+id));
    }
}

function Package_MyZan(img,title,price,zid,nid) {
    this.img=img;
    this.title=title;
    this.price=price;
    this.zid=zid;
    this.Ocontainer=$('<div class="container">' +
        '<div class="row goodshref" id='+nid+' rel="n">' +
        '<div class="col-xs-3">' +
        '<img width="95" height="95" src='+this.img+' style="padding:10px 10px 10px 0"></div> ' +
        '<div class="col-xs-9" style="margin-top: 10px;"> ' +
        '<p>'+this.title+'</p><p style="color:rgb(224, 18, 34);font-weight:800;">￥'+this.price+'</p>' +
        '</div> </div> <div class="row" style="border-top: 1px solid #eee"><div class="col-xs-4 text-left" style="line-height: 30px"></div> ' +
        '<div class="col-xs-8 text-right"> ' +
        '<button id='+this.zid+' type="button" class="btn" style="margin: 4px 0;background-color: #fff;border: 1px solid #eee;border-radius: 0;height:30px;"><img width="10" height="10" src="'+path+'Home/img/xianyu/favor_love.png" style="vertical-align: middle">取消赞</button> ' +
        '</div> </div> </div>')
    this.Ocontainer.css({
        "background-color":"#fff","border":"1px solid #eee","margin":"5px"
    })
    this.setFather=function(id){
        this.Ocontainer.appendTo($("#"+id));
    }
}
function Package_MyZanP(img,title,status,zid,nid) {
    this.img=img;
    this.title=title;
    this.status=status;
    this.zid=zid;
    this.Ocontainer=$('<div class="container">' +
        '<div class="row goodshref" id='+nid+' rel="p">' +
        '<div class="col-xs-3">' +
        '<img width="95" height="95" src='+this.img+' style="padding:10px 10px 10px 0"></div> ' +
        '<div class="col-xs-9" style="margin-top: 10px;"> ' +
        '<p>'+this.title+'</p><p>'+this.status+'</p> ' +
        '</div> </div> <div class="row" style="border-top: 1px solid #eee"><div class="col-xs-4 text-left" style="line-height: 30px"></div> ' +
        '<div class="col-xs-8 text-right"> ' +
        '<button id='+this.zid+' type="button" class="btn" style="margin: 4px 0;background-color: #fff;border: 1px solid #eee;border-radius: 0;height:30px;"><img width="10" height="10" src="'+path+'Home/img/xianyu/favor_love.png" style="vertical-align: middle">取消赞</button> ' +
        '</div> </div> </div>')
    this.Ocontainer.css({
        "background-color":"#fff","border":"1px solid #eee","margin":"5px"
    })
    this.setFather=function(id){
        this.Ocontainer.appendTo($("#"+id));
    }
}