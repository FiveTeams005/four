/**聊天页面脚本；**/$(function(){	new Loading();	setTimeout(function(){        $('#loading').remove();    },600);	Vue.component("input-con",{			props:['msg'],			template:"<div>{{msg}}</div>",				});	var vm = new Vue({		el:"#app",		data:{			divFlag	:false,			btnFlag	:false,			conn 	:"",			msg		:[],		},		methods:{			//同步显示输入内容 及 显示发送按钮；			showBtn:function(){				if(vm.conn != ''){					vm.btnFlag = true;//显示按钮					vm.divFlag = true;//显示文本内容				}else{					vm.btnFlag = false;//隐藏按钮					vm.divFlag = false;//隐藏显示文本div；				}			},			//输入框失焦事件；			hideBtn:function(){				if(vm.conn == ''){					vm.btnFlag = false;//隐藏按钮					vm.divFlag = false;//隐藏显示文本div；				}			},			//头部更多按钮点击事件；			moreClick:function(){				layer.open({					type:1,					content:"<div class='pop-div'><p><a href='"+MVC('Home','Index','index')+"'>帮助</a></p><p><a href='"+MVC('Home','Index','index')+"'>查看对方个人主页</a></p></div>"					,anim: 'up'    				,style: 'position:fixed; bottom:46%; left:5%; width: 90%; height: auto; padding:10px 0; border:none;border-radius:8px;'				});			},			//商品图片点击 显示详情事件			goodsImgClick:function(){				window.location.href = MVC('Home','Detail','detail');			},			//立即购买 按钮点击事件；			buyClick:function(){				window.location.href = MVC('Home','Pay','pay');			},			//语音按钮点击事件；			voiceClick:function(){				alert("正在开发，敬请期待。。。");			},			//表情包点击事件；			emojiClick:function(){				alert('biaoqingbao');			},			//添加图pain按钮点击事件；			addPicClick:function(){				alert("正在开发，敬请期待。。。");			},			//发送消息按钮点击事件；			sendClick:function(){				alert('zhengzaifasong..')			},			//点击 商品信息跳转页面事件；			infoClick:function(){				alert(2);				window.location.href = MVC('Home','OrderDetail','orderDetail');				/*$.post(MVC('Home','Goods','getGoods'),{goodsId:goodsId},function(data){					if(true){						window.location.href = MVC('Home','Detail','detail');					}else{						window.location.href = MVC('Home','OrderDetail','orderDetail');					}				})*/			},			//					}	});		// $('#send-input').keyup(function(){	// 	if($('.input-con').length == 1){	// 		$('.input-con').html($('#send-input').val());				// 	}else{	// 		console.log($('.input-con').length);	// 	}	// });})