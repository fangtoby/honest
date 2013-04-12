(function(){
	var EfffectPackup={
		defaultHtml:'<tr id="sign-loading"><td colspan="12"></td></tr>',
		defaultClass:'extendrow',
		bottomClass:'.first-level-tr',
		getDataUrl:'index.php?r=site/dataget',
		getElement:null,
		init:function(){
			this.addOpenEvent();
		},
		addOpenEvent:function(){
			var self = this;
			$(self.bottomClass).click(function(){
				var _self = $(this);
				var element = $(this);
				self.getElement = element;
				if(!$(this).hasClass('active') && element.next().attr('data-pid') != element.attr('data-sid') && !($(this).attr('data-remenber') == 'ture')){
					element.after($(self.defaultHtml));
					element.addClass('tb-bg-a');
					$(this).addClass('active');
					$(this).attr({'data-remenber':'ture'});
					$.ajax({
						type: "POST", 
						dataType:"text", 
						url: self.getDataUrl+"&sid="+element.attr('data-sid'),
						success: function(datas){ 
							if(datas){
								element.after(datas);
								$('#sign-loading').remove();
								
								self.addButHoverEvent();
							}else{
								element.next().find('td.innertr').html("Sorry! Can't get data from server .You can close this and open it again!");
							}
						}
					});
				}
				else if(!($(this).attr('data-remenber') == 'ture')){
					if($(this).hasClass('active')){
						element.removeClass('tb-bg-a');
						$(this).removeClass('active');
						element.next().hide();
						$('table.effect-table tr').each(function(){
							if($(this).attr('data-pid') == 	element.attr('data-sid')){
								$(this).hide();	
							}
						});
					}else{
						element.addClass('tb-bg-a');
						element.next().show();
						$(this).addClass('active');
						$('table.effect-table tr').each(function(){
							if($(this).attr('data-pid') == 	element.attr('data-sid')){
								$(this).show();	
							}
						});
					}
				}
			});
			
		},
		addButHoverEvent:function(){
				var self = this;
				$('.inner-sort-but a').click(function(e){
					e.preventDefault(); // remove default event
					$('tr.second-level-tr').remove();
					self.getElement.after($(self.defaultHtml));
					var _self = $(this);
						$.ajax({
							type: "POST", 
							dataType:"text", 
							url: self.getDataUrl+"&sid="+$(this).attr('data-sid')+"&sort="+$(this).attr('data-sort'),
							success: function(datas){ 
								if(datas){
									console.log(datas);
									$('table.effect-table tr').each(function(){
										if($(this).attr('data-pid') == 	_self.attr('data-sid')){
											$(this).remove();
										}
									});
									$('table.effect-table tr').each(function(){
										if($(this).attr('data-sid') == 	_self.attr('data-sid')){
											$(this).after(datas);
										}
									});
									self.addButHoverEvent();
									$('#sign-loading').remove();
								}else{
									element.next().find('td.innertr').html("Sorry! Can't get data from linux web server .You can close this and open it again!");
								}
							}
						});
					});
		},
		closeOther:function(){
			$('.effect-table tr').removeClass('tb-bg-a').removeClass('active');
			$('tr.second-level-tr').hide();
		
		},
		removeAlltr:function(){
			$('tr.second-level-tr').remove();	
			$('.effect-table tr').removeClass('tb-bg-a').attr({'data-remenber':'false'});
			$('.effect-table tr').removeClass('active');
			
		}
	};
	
	EfffectPackup.init();
	
	
	$('#clearalltr').click(function(){
				EfffectPackup.removeAlltr();
	});
})();