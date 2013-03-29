$.fn.Honest = function(){};
$.Honest = $.fn.Honest.prototype;
$.Honest = {
		info:{
			projectName:'Honest',
			date:'2013/03/20',
			creater:'F.Honest',
			version:'1'
		},
		url:{
			webroot:$('#basicroute').attr('location-data')
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
		
		$('.second-menu-hidden').click(function(){
			$('.second-menu').animate({'height':0,'opacity':0},1000);	
		});
		var secondMenuFadeIn = setTimeout(function(){
				if($('.second-menu').length){
					$('.second-menu').animate({'height':35,'opacity':1},1000);
				}
			},2000);
		
		$('.more').click(function(e){
				if($(this).hasClass('more-down')){
					$(this).removeClass('more-down');
					$('.second-menu').animate({'height':0,'opacity':0},1000);	
				}else{
					$(this).addClass('more-down');
					$('.second-menu').animate({'height':35,'opacity':1},1000);
				}
				
				
				 e.preventDefault();
		});
	});
/*
	window.onload = function (){ 
		$('#page').fadeIn(1000);
		$('#loading').fadeOut(2000).remove();
	};
*/