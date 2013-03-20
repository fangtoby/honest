$.fn.Honest = function(){};
$.Honest = $.fn.lottery.prototype;
$.Honest = {
		info:{
			projectName:'Honest',
			date:'2013/03/20',
			creater:'F.Honest',
			version:'1'
		},
		url:{
			//Url List
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
	});