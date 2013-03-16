$.fn.lottery = function(){};
$.lottery = $.fn.lottery.prototype;
$.lottery = {
		info:{
			projectName:'Lottery',
			date:'2012/12/27',
			creater:'fang.yanliang',
			version:'0.1'
		},
		url:{
						
		},
		option:{
			reoption:null,
			backoption:function(){
				if(this.reoption == null){
						
				}
			}
		},
		operation:{
			clearJson:function(){},
			clearHtml:function(){},
			clearDate:function(){},
			renderList:function(){}	
		},
		app:{
			page:undefined,
			init:function(){
					if ($.lottery.app.page !== undefined) {
						if (!$.lottery.app.page.delayed) {
								$.lottery.app.page.init.call($.lottery.app.page);
						}
					}
			}
		}
};


$(document).ready(function() {
	
		$.lottery.app.init();
		
		var addLoading={
				bodySign:'#loading',
				removeTime:500,
				init:function(){
					this.fadeOut();
				},
				fadeOut:function(){
					var self = this;
					$(self.bodySign).fadeOut(self.removeTime).remove();
					return self;
				}
			};
			
		addLoading.init();
	});