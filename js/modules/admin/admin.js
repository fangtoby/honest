$.fn.Honest = function(){};
$.Honest = $.fn.Honest.prototype;
$.Honest = {
		info:{
			projectName:'Honest',
			date:'2012/12/27',
			creater:'Honest_lies',
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
					if ($.Honest.app.page !== undefined) {
						if (!$.Honest.app.page.delayed) {
								$.Honest.app.page.init.call($.Honest.app.page);
						}
					}
			}
		}
};


$(document).ready(function() {
	
		$.Honest.app.init();
		
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