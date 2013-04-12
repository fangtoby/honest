$(function(){
		/**
		* Left Sider Accordion Menu
		*/
		var accordionMenu = {
			init:function(){
				$("#main-nav li").find("a:eq(0)").addClass("nav-top-item");
				$("#main-nav li ul").find("a").removeClass("nav-top-item");
				$("#main-nav li.addname ul").hide(); 
				$("#main-nav li.active").find("ul").slideToggle("slow");
				return this;
			},	
			addEvent:function(){
				$("#main-nav li a.nav-top-item").click( 
					function () {
						$(this).next("ul").slideToggle("normal"); 
						if($(this).parent().hasClass('active')){
							$(this).parent().removeClass('active');
						}else{
							$(this).parent().addClass('active');	
						}
						return false;
					}
				); 	
				return this;
			},
			run:function(){
				this.init().addEvent();
			}
		};
		accordionMenu.run();
		/**
		* All Bottom Mouseover Event
		*/
		var BottomMouseOver = {
			addEvent:function(){
				$('.gbqfu').mouseover(function(){
						$(this).addClass('gbqfu-hvr');
					}).mouseleave(function(){
						$(this).removeClass('gbqfu-hvr');
				});
			},
			run:function(){
				this.addEvent();
			}	
		};
		BottomMouseOver.run();
		/**
		* Tables [tr]:hover Event
		*/
		var TableEvent = {
			addEvent:function(){
				$('table.addeffect tr').hover(function(){
					$(this).addClass('addfocus');
				  },function(){
					$(this).removeClass('addfocus');
				});
			},
			run:function(){
				this.addEvent();
			}
		};
		TableEvent.run();
		/**
		* Add Target Radio Buttom List
		*/
		var addTarget = {
			addEvent:function(){
				$('#add-target').click(function(){
					var _status = $(this).next('div').css('display');
					if(_status == 'none'){
						$(this).next('div').show();
					}else{
						$(this).next('div').hide();
					}
				});			
			},
			run:function(){
				this.addEvent();
			}	
		};
		 addTarget.run();
		/**
		* Complex Table Script
			*Set Table Width
			*Listen The Event Of Windows Size Change
			*Listen The Event Of Control Buttom Click
			*Init Default Status
		* @date: 2012/10/18
		* @author: fang.yanliang
		* @version: 2.0 
		* @copyright: fangtoby@live.cn
		* @type: Object
		*/
		var complexTable = {
			init:function(){
				this.setColWidth();
				this.whenResize();
				//this.whenClick();
				//this.isChecked();
				//this.hasChecked();
			},
			hasChecked:function(){
				$('#radio-control .checkbox-list').click(function(){
					if($(this).hasClass('hold')){
						$(this).next('input').attr("checked","");
					}else{
						$(this).next('input').removeAttr("checked");
					}

				});
			},
			setColWidth:function(){
					var countwidth = 0,
						_width = $(".complex-table").width()-385;
					$('.inner-count-th .last').each(function(){
						if($(this).css("display") == "block"){
							countwidth+=$(this).width();
						}
					});
					if(countwidth>_width){
						if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) {
							$('.inner-count-th').width(countwidth+3);
						}else{
							$('.inner-count-th').width(countwidth);
						}
						$('.count-th').width(_width);
					}else{
						if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) {
							$('.inner-count-th').width(countwidth+3);
						}else{
							$('.inner-count-th').width(countwidth);
						}
							$('.count-th').width(countwidth);
					}
			},
			whenResize:function(){
					var self = this;
					$(window).resize(function() {
						 self.setColWidth();
					});
			},
			whenClick:function(){
					var self = this;
					$('#radio-control .checkbox-list').click(function(){
						var str;
						if($(this).hasClass('hold')){
							$(this).removeClass('hold');	
							str = "#"+ $(this).next('input').attr('value').toString();
							$(str).css({'display':'none'});
						}else{
							$(this).addClass('hold');	
							str = "#"+ $(this).next('input').attr('value').toString();
							$(str).css({'display':'block'});
						}

			//alert($(this).hasClass('hold'));



						self.setColWidth();
				});

			},
			isChecked:function(){
					var ches = document.getElementsByName("checkbox[]");
					var str;
					for(var i = 0;i < ches.length;i++){
						if(ches[i].checked){
								var str ="#"+ches[i].value.toString();
								str = str.toString();
								$(str).show();
								this.setColWidth();   
							}
					}
			}
		};
		complexTable.init();
		/**
		* Change Radio Buttom Default Style
		*/
		var RadioStyle = {
				initRadioSeleted:function(){
					var radiolist = $('.radio-change-style').find('input[type="radio"]');
					var in_length = radiolist.length;
					var gettitle;
					$('.radio-change-style a').removeClass('form-a-black form-a-nblack').addClass('form-a-nblack');	
					for(var i =0 ;i< in_length;i++){
							if(radiolist[i].checked == true ){
								$('.radio-change-style a:eq('+i+')').removeClass('form-a-nblack').addClass('form-a-black');	
							}
					}
				},
				initCheckSeleted:function(){
					var radiolist = $('.check-change-style').find('input');
					var in_length = radiolist.length;
					var gettitle;
					$('.check-change-style a').removeClass('form-a-black form-a-nblack').addClass('form-a-nblack');	
					for(var i =0 ;i< in_length;i++){
							if(radiolist[i].checked == true ){
								$('.check-change-style a:eq('+i+')').removeClass('form-a-nblack').addClass('form-a-black');	
							}
					}
				},
				addRadioClickEve:function(){
					var self = this;
					$('.radio-change-style a').click(function(){
							var radiolist = $(this).parent().find('input[type="radio"]');
							var in_length = radiolist.length;
							var gettitle  = $(this).attr('data-title');
							if($(this).hasClass('form-a-black')){
									return;
							}else{
								for(var i =0 ;i< in_length;i++){
									radiolist[i].checked = false;
								}
								$(this).parent().find('a').removeClass('form-a-black form-a-nblack').addClass('form-a-nblack');	
								$(this).removeClass('form-a-nblack').addClass('form-a-black');	
								radiolist[gettitle].checked = true;
								if($(this).hasClass("xx")){
									self.change_ctype(gettitle+1);
								}
							}
							
					});
				},
				addCheckClickEve:function(){
					$('.check-change-style a').click(function(){
							var radiolist = $(this).parent().find('input');
							var in_length = radiolist.length;
							var gettitle  = $(this).attr('data-title');
							if($(this).hasClass('form-a-black')){
									radiolist[gettitle].checked = false;
									$(this).removeClass('form-a-black').addClass('form-a-nblack');
							}else{
									$(this).removeClass('form-a-nblack').addClass('form-a-black');	
									radiolist[gettitle].checked = true;
									if($(this).hasClass("xx")){
										self.change_ctype(gettitle+1);
								}
							}
					});
				},
				change_ctype:function(){
					var compare_type = arguments[0];
					if( compare_type == 1 ){
							$('#day').hide();
							$('#month').show();
					}else{
							$('#month').hide();
							$('#day').show();
					}
				},
				run:function(){
					this.initRadioSeleted();
					this.initCheckSeleted();
					this.addRadioClickEve();
					this.addCheckClickEve();
				}
		};
		RadioStyle.run();
		/**
		* Analysis Buttoms Script
		* @date: 2012/10/18
		* @author: fang.yanliang
		* @version: 3.0 
		* @copyright: fangtoby@live.cn
		* @type: Object
		*/
		var analysis = {
			timer:null,
			init:function(){
				this.init_analysis_bottoms();
				this.BackToDefault();
			},
			init_analysis_bottoms:function(){
				var self = this,
					length  = $('#analysis-buttoms .buttom-analysis').length,
					str		= '.buttom-analysis:eq';
					for(var i=0;i<length;i++){
						(function(i){
							$(str+'('+i+')').hover(function() {
									var $this = $(this);
									if(self.timer != null ){
										clearTimeout(self.timer);
										}
									function run(){
											self.setButtomsPosition(str,i,$(str+'('+i+')'))
										}
									self.timer = setTimeout(run,500);
									return $this;
								
							}, function() {
									clearTimeout(self.timer);
								
							});
							if( $(str+'('+i+')').hasClass('analysic-active') ){
								 self.setButtomsPosition(str,i,$(str+'('+i+')'));
							}
						})(i);
				  }
			},
			BackToDefault:function(){
				var self = this;
				$('#analysis-buttoms').mouseleave(function(){
					clearTimeout(self.timer);
					var length  = $('#analysis-buttoms .buttom-analysis').length,
						str		= '.buttom-analysis:eq';
					for(var i=0;i<length;i++){
						(function(i){
							if( $(str+'('+i+')').hasClass('init') ){
								 self.setButtomsPosition(str,i,$(str+'('+i+')'));
							}
						})(i);
					}
				});
			},
			close_move:function(){
					var self = this;
					clearTimeout(self.timer);
			},
			setButtomsPosition:function(str,i,self){
				 $('.buttom-analysis').removeClass('analysic-alone analysic-active')
				 switch(i){
					 case 0:
						$(self).animate({
										'width':'228px',
										'height':'120px'
										}).addClass('analysic-active');
						$(str+'(1)').animate({
										'width':'120px',
										'height':'90px',
										'top':'0',
										'left':'250px'
										});
						$(str+'(2)').animate({
										'width':'228px',
										'height':'60px',
										'top':'130px'
										}).addClass('analysic-alone');
						$(str+'(3)').animate({
										'width':'120px',
										'height':'90px',
										'top':'100px',
										'left':'250px'
										});
						 break;
					 case 1:
						$(self).animate({
										'width':'228px',
										'height':'120px',
										'left':'140px'
										}).addClass('analysic-active');
						$(str+'(0)').animate({
										'width':'120px',
										'height':'90px',
										'top':'0'
										});
						$(str+'(2)').animate({
										'width':'120px',
										'height':'90px',
										'top':'100px'
										});
						$(str+'(3)').animate({
										'left':'140px',
										'top':'130px',
										'width':'228px',
										'height':'60px'
										}).addClass('analysic-alone');
						break;
					 case 2:
						$(self).animate({
										'width':'228px',
										'height':'120px',
										'top':'70px'
										}).addClass('analysic-active');
						$(str+'(0)').animate({
										'width':'228px',
										'height':'60px',
										'top':'0'
										}).addClass('analysic-alone');
						$(str+'(1)').animate({
										'width':'120px',
										'height':'90px',
										'top':'0',
										'left':'250px'
										});
						$(str+'(3)').animate({
										'width':'120px',
										'height':'90px',
										'top':'100px',
										'left':'250px'
										});
						break;
					case 3:
						$(self).animate({
										'width':'228px',
										'height':'120px',
										'top':'70px',
										'left':'140px'
										}).addClass('analysic-active');
						$(str+'(1)').animate({
										'width':'228px',
										'height':'60px',
										'left':'140px'
										}).addClass('analysic-alone');
						$(str+'(0)').animate({
										'width':'120px',
										'height':'90px',
										'top':'0'
										});
						$(str+'(2)').animate({
										'width':'120px',
										'height':'90px',
										'top':'100px'
										});
					break;
					default:
						return;
				  }
			}
		};
	analysis.init();
	/**
	* Message Bottom Bar
	*/
	var messageBar ={
		init:function(){
			$("#ggt-quick-tips").animate({
								"bottom":"0"
								},2000);
			return this;
		},
		addEvent:function(){
			$(document).bind('scroll',function(){
				$("#ggt-quick-tips").css({
								"bottom":"0",
								"position":"fixed"
								});
			});
			return this;
		},
		run:function(){
			this.init().addEvent();
		}
	};
	messageBar.run();
	/**
	*	tables action
	*/
	var EffectPackup={
		defaultHtml:'<tr class="sign-loading"><td colspan="10"></td></tr>',
		bottomClass:'.bottom-effect-parent',
		getDataUrl:'getChildrenList',
		totalItemNum:parseInt($(".totalItemNum").text()),
		totalItemSales:parseInt($(".totalItemSales").text()),
		lowPrice:parseFloat($("input[name='lowPrice']").val()),
		highPrice:parseFloat($("input[name='highPrice']").val()),
		forRemenberId:'',
		init:function(){
			this.addOpenEvent();
		},
		addOpenEvent:function(){
			var self = this;
			$('tr.bottom-effect-parent').attr({'data-remenber':'ture'});
			self.addButHoverEvent();
			$(self.bottomClass).click(function(){
				var element = $(this);
				if($(this).attr('data-remenber') == 'ture' || $(this).attr('data-remenber') == 'false'){
						self.forRemenberId = element.attr("id");
						if(!$(this).hasClass('active') && !($(this).next().hasClass('second-level-tr')) ){
							var forInsertId = element.attr("id");
							$('tr.bottom-effect-parent').removeAttr('data-remenber');
							//self.closeOther();
							$(this).addClass('active');
							element.addClass('tb-bg-a');
							element.after($(self.defaultHtml));
							$.ajax({
								type: "POST", 
								dataType:"text", 
								url: self.getDataUrl,
								data:{discount:forInsertId,totalItemNum:self.totalItemNum,totalItemSales:self.totalItemSales,lowPrice:self.lowPrice,highPrice:self.highPrice},
								success: function(datas){ 
									if(datas){
										$('#'+forInsertId).after(datas);
										$('tr.second-level-tr').each(function(){
											if($(this).attr("data-pid") != forInsertId){
												$(this).hide();
											}else{
												$('.effect-table tr').removeClass('tb-bg-a');
												$('#'+forInsertId).addClass('tb-bg-a');
											}
										});
										$('tr.bottom-effect-parent').attr({'data-remenber':'ture'});
										$('tr.sign-loading').remove();
									}else{
										element.next().find('td.innertr').html("Sorry! Can't get data from server .You can close this and open it again!");
									}
								}
							});
						}
						else{
							if($(this).hasClass('active')){
								self.closeOther();
								element.removeClass('tb-bg-a');
								$(this).removeClass('active');
								self.acceptOpration('hide',element);
							}else{
								self.closeOther();
								element.addClass('tb-bg-a');
								$(this).addClass('active');
								self.acceptOpration('show',element);
							}
						}
				}
				
			});
				
			
		},
		acceptOpration:function(var_opration,var_element){
			var tableBody = 'table.effect-table tr',
				bodyAttribute = 'data-pid',
				bodyParentAttr = 'id';
			$(tableBody).each(function(){
				if($(this).attr(bodyAttribute) == var_element.attr(bodyParentAttr)){
					if(var_opration == 'hide'){
						$(this).hide();	
					}else{
						$(this).show();	
					}
				}
			});
		},
		addButHoverEvent:function(){
			var self = this,
				forUniqueRespones = 0;
			$('.inner-sort-but div').live("click",function(){
				if($(this).hasClass("imgbtnunalble")){
					return false;
				}
				forUniqueRespones++;
				$('tr.bottom-effect-parent').removeAttr('data-remenber');
				var _self = $(this);
				var discount = $(this).parent().find(".curdiscount").text();
				$('table.effect-table tr').each(function(){
							if($(this).attr('data-pid') == discount){
								$(this).remove();
							}
				});
				$('tr.sign-loading').remove();
				$('#'+discount).after($(self.defaultHtml));
				var isNum = 0;
				if($(this).hasClass("top-product-xl")){
					isNum = 1;
				}
				if(forUniqueRespones == 1){
						$.ajax({
							type: "POST", 
							dataType:"text", 
							url: self.getDataUrl,
							data:{discount:discount,totalItemNum:self.totalItemNum,totalItemSales:self.totalItemSales,lowPrice:self.lowPrice,highPrice:self.highPrice,isNum:isNum},
							success: function(datas){ 
								if(datas){
									$('table.effect-table tr').each(function(){
												if($(this).attr('data-pid') == 	discount){
													$(this).remove();
												}
									});
									self.closeOther();
									$("#"+discount).addClass('tb-bg-a');
									$("#"+discount).addClass('active');
									$("#"+discount).after(datas);
									$('tr.bottom-effect-parent').attr({'data-remenber':'ture'});
									forUniqueRespones = 0;
									$('tr.sign-loading').remove();
								}else{
									element.next().find('td.innertr').html("Sorry! Can't get data from server .You can close this and open it again!");
								}
							}
						});
				}
				
			});
		},
		closeOther:function(){
			$('.effect-table tr').removeClass('tb-bg-a');
			$('tr.second-level-tr').hide();
			$('tr').removeClass('active');
			
		},
		removeAlltr:function(){
			$('tr.second-level-tr').remove();	
			$('.effect-table tr').removeClass('tb-bg-a');
			$('tr').removeClass('active');
		}
	};
	
	EffectPackup.init();
	
	//EffectPackup.removeAlltr();
	/**
	* Ye.fie Script
	*/
	function change_ctype(){
			var compare_type = arguments[0];
			if( compare_type == 1 ){
				document.getElementById("day").style.display = 'none';
				document.getElementById("month").style.display = '';
			}else{
				document.getElementById("month").style.display = 'none';
				document.getElementById("day").style.display = '';
			}
		}
	$(".e-error").click(function(){
			$(".e-error").css({'display':'none'});
	});
});