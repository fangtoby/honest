$.fn.lottery = function(){};
$.lottery = $.fn.lottery.prototype;
$.lottery = {
		info:{
			projectName:'Lottery',
			date:'2012/12/27',
			creater:'F.Honest',
			version:'0.1'
		},
		url:{
			basic:$('#basicroute').attr('location-data'),
			longbasic:$('#basicroute').attr('location-data')+'/index.php'
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
	});