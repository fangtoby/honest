// JavaScript Document
var handerKey = {
	nowItem:-1,
	nowScroll:0,
	itemLength:0,
	timer:null,
	elementItems:'.inner-dec-item',
	itemsParent:'#for-scroll',
	sign:'#dalis',
	timeTamp:2000,
	keyItem:[37,38,39,40],
	init:function(){
		var self = this;
		self.itemLength = $(self.elementItems).length;
		this.setScrilcle(self).evenKey().forScroll().addLeaveEvent();
	},
	addLeaveEvent:function(){
		var self = this;
		$(self.itemsParent).hover(function(){
				clearInterval(self.timer);
			},function(){
				self.setScrilcle(self);
		});	
		return this;
	},
	evenKey:function(){
		var self = this;
		$(document).keydown(function(event){
			if(event.which == self.keyItem[0] || event.which == self.keyItem[1] || event.which == self.keyItem[2] || event.which == self.keyItem[3]){
				self.clearActive(self.elementItems);
				event.preventDefault();
				if(event.which == self.keyItem[0] || event.which == self.keyItem[1]){
						self.operateNowItem(1);
				}
				if(event.which == self.keyItem[2] || event.which == self.keyItem[3]){
						self.operateNowItem(-1);
				}
				self.addActiveAndInnerhtml(self.nowItem);
			}
		});
		return self;
	},
	forScroll:function(){
		var elem = document.getElementById("for-scroll");
		if (elem.addEventListener) {    
			elem.addEventListener ("mousewheel", this.MouseScroll, false);
			elem.addEventListener ("DOMMouseScroll", this.MouseScroll, false);
		}
		else {
			if (elem.attachEvent) { 
				elem.attachEvent ("onmousewheel", this.MouseScroll);
			}
		}
		return this;
	},
	MouseScroll:function(){
		var rolled = 0;
		event.preventDefault();
		if ('wheelDelta' in event) {
			rolled = event.wheelDelta;
		}else{  
			rolled = event.detail;
		}
		handerKey.clearActive(handerKey.elementItems);
		if(rolled == 120){
			handerKey.operateNowItem(1);
		}
		if(rolled == -120){
			handerKey.operateNowItem(-1);
		}
		handerKey.addActiveAndInnerhtml(handerKey.nowItem);
	},
	operateNowItem:function(opo){
		if(opo == 1){
			--handerKey.nowItem;
			if(handerKey.nowItem <= -1){
				handerKey.nowItem = handerKey.itemLength -1;
			}
		}
		if(opo == -1){
			++handerKey.nowItem;
			if(handerKey.nowItem >= handerKey.itemLength){
				handerKey.nowItem = 0;
			}
		}
	},
	setScrilcle:function(parent){
		parent.timer = setInterval(function(){
				handerKey.clearActive(handerKey.elementItems);
				handerKey.operateNowItem(-1);
				handerKey.addActiveAndInnerhtml(handerKey.nowItem);
		},parent.timeTamp);
		return parent;
	},
	addActiveAndInnerhtml:function(itemNum){
		$(handerKey.elementItems+':eq('+(itemNum)+')').addClass('active');
		$(handerKey.sign).html($(handerKey.elementItems+':eq('+(itemNum)+') p').html());
	},
	clearActive:function(param_class){
		$(param_class).removeClass('active');
	}
};
handerKey.init();