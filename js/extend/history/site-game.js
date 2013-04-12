(function(){
	var bigWheel = {
		historyID:0,       
		sendListLength:0,
		interimBet:0,
		globalCount:100000, 
		globalCount_backup:null,
		arr_single:{
				type_1:[0],
				type_2:[1],
				type_3:[2],
				type_4:[3],
				type_5:[4],
				type_6:[5],
				type_7:[6],
				type_8:[7],
				type_9:[8],
				type_10:[9],
				type_11:[10],
				type_12:[11],
				type_13:[12],
				type_14:[13],
				type_15:[14],
				type_16:[15],
				type_17:[16],
				type_18:[17],
				type_19:[18],
				type_20:[19],
				type_21:[20],
				type_22:[21],
				type_23:[22],
				type_24:[23],
				type_25:[24],
				type_26:[25],
				type_27:[26],
				type_28:[27],
				type_29:[28],
				type_30:[29],
				type_31:[30],
				type_32:[31],
				type_33:[32],
				type_34:[33],
				type_35:[34],
				type_36:[35],
				type_37:[36]
			},
		arr_half:{
				type_1:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,40],
				type_2:[19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,45]
			},
		arr_color:{
				type_1:[1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36,42],
				type_2:[2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35,43]
			},
		arr_column:{
				type_1:[3,6,9,12,15,18,21,24,27,30,33,36,48],
				type_2:[2,5,8,11,14,17,20,23,26,29,32,35,47],
				type_3:[1,4,7,10,13,16,19,22,25,28,31,34,46]
			},
		arr_dozen:{
				type_1:[1,2,3,4,5,6,7,8,9,10,11,12,37],
				type_2:[13,14,15,16,17,18,19,20,21,22,23,24,38],
				type_3:[25,26,27,28,29,30,31,32,33,34,35,36,39]
			},
		arr_oddeven:{
				type_1:[2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,41],
			 	type_2:[1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,44]
			},
		arr_three:{
				type_1:[0,1,2],
				type_2:[0,2,3],
				type_3:[1,2,3],
				type_4:[4,5,6],
				type_5:[7,8,9],
				type_6:[10,11,12],
				type_7:[13,14,15],
				type_8:[16,17,18],
				type_9:[19,20,21],
				type_10:[22,23,24],
				type_11:[25,26,27],
				type_12:[28,29,30],
				type_13:[31,32,33],
				type_14:[34,35,36]
			},
		arr_four:{
				type_1:[1,2,4,5],
				type_2:[2,3,5,6],
				type_3:[4,5,7,8],
				type_4:[5,6,8,9],
				type_5:[7,8,10,11],
				type_6:[8,9,11,12],
				type_7:[10,11,13,14],
				type_8:[11,12,14,15],
				type_9:[13,14,16,17],
				type_10:[14,15,17,18],
				type_11:[16,17,19,20],
				type_12:[17,18,20,21],
				type_13:[19,20,22,23],
				type_14:[20,21,23,24],
				type_15:[22,23,25,26],
				type_16:[23,24,26,27],
				type_17:[25,26,28,29],
				type_18:[26,27,29,30],
				type_19:[28,29,31,32],
				type_20:[29,30,32,33],
				type_21:[31,32,34,35],
				type_22:[32,33,35,36]
			},
		arr_two:{
				type_1:[1,2],
				type_2:[2,3],
				type_3:[4,5],
				type_4:[5,6],
				type_5:[7,8],
				type_6:[8,9],
				type_7:[10,11],
				type_8:[11,12],
				type_9:[13,14],
				type_10:[14,15],
				type_11:[16,17],
				type_12:[17,18],
				type_13:[19,20],
				type_14:[20,21],
				type_15:[22,23],
				type_16:[23,24],
				type_17:[25,26],
				type_18:[26,27],
				type_19:[28,29],
				type_20:[29,30],
				type_21:[31,32],
				type_22:[32,33],
				type_23:[34,35],
				type_24:[35,36],
				type_25:[0,1],
				type_26:[0,2],
				type_27:[0,3],
				type_28:[1,4],
				type_29:[2,5],
				type_30:[3,6],
				type_31:[4,7],
				type_32:[5,8],
				type_33:[6,9],
				type_34:[7,10],
				type_35:[8,11],
				type_36:[9,12],
				type_37:[10,13],
				type_38:[11,14],
				type_39:[12,15],
				type_40:[13,16],
				type_41:[14,17],
				type_42:[15,18],
				type_43:[16,19],
				type_44:[17,20],
				type_45:[18,21],
				type_47:[19,22],
				type_48:[20,23],
				type_49:[21,24],
				type_50:[22,25],
				type_51:[23,26],
				type_52:[24,27],
				type_53:[25,28],
				type_54:[26,29],
				type_55:[27,30],
				type_56:[28,31],
				type_57:[29,32],
				type_58:[30,33],
				type_59:[31,34],
				type_60:[32,35],
				type_61:[33,36]
		},
		helpClass:['mask-s-bg','mask-s-bg-special','mask-bg','mask-bg-special','lt-bet-sign'],
		helpAttribute:['data-tp','data-tpc'],
		betValue:["bet-10","bet-50","bet-100","bet-500","bet-1000","bet-5000"],
		normalWord:["Sorry! Your account balance is less than ","Error! Can't go back!"],
		historyList:{},
		sendList:{},
		init:function(){
			this.backupBet().initFeedback().addEvent();
		},
		backupBet:function(){
			this.globalCount_backup = this.globalCount;
			return this;
		},
		addToHistoryList:function(var_type,var_typechild,var_bet){
			if(this.betOperation('reduce',var_bet)){
				var listID ="type-"+ this.historyID;
				this.historyList[listID] = [var_type,var_typechild,var_bet];
				this.historyID++;
			}else{
				alert(this.normalWord[0]+var_bet+"!");
			}
			return this;
		},
		addUniqueData:function(var_type,var_typechild,var_bet){
				var listID ="type-"+ this.sendListLength,
					dataSize = 0,
					canPush = false;
				for(var i in this.sendList){
					dataSize++;
				}
				if(dataSize == 0){
					this.sendList[listID] = [var_type,var_typechild,var_bet];
					this.sendListLength++;
				}else{
					for(var j in this.sendList){
						if((this.sendList[j][0] == var_type ) && (this.sendList[j][1] == var_typechild)){
							this.sendList[j][2] = this.sendList[j][2] + var_bet;
							canPush = true;
						}
					}
					if(canPush != true){ 
						this.sendList[listID] = [var_type,var_typechild,var_bet];
						this.sendListLength++;
					}
				}
		},
		clearSendList:function(){
			this.sendListLength = 0;
			this.sendList = {};
		},
		getUniqueList:function(){
			this.clearSendList();
			for(var k=0;k<this.historyID;k++){
					this.addUniqueData(this.historyList['type-'+k][0],this.historyList['type-'+k][1],this.historyList['type-'+k][2]);
			}
			return this;
		},
		backToHistory:function(var_unique){
			if(typeof(var_unique) === 'undefined'){
				this.historyList = {};
				this.historyID = 0;
				this.globalCount = this.globalCount_backup;
			}else{								
				if(this.betOperation('increase',this.historyList["type-"+var_unique][2])){
					delete this.historyList["type-"+var_unique];
					this.historyID--;
				}
			}
			return this;
		},
		sendToServer:function(){
		},
		betOperation:function(var_operation,var_number){
			switch(var_operation){
				case 'reduce':
					if(var_number<=this.globalCount){
						this.globalCount -= var_number;
						return true;		
					}else{
						return false;	
					}
					break;
				case 'increase':
					this.globalCount += var_number;
					return true;
					break;
			}
		},
		addMask:function(var_array,var_class,var_s_class){
			if(this.clearMask(var_s_class,var_class)){
				var arrLength = var_array.length;
				for(var i=0;i<=arrLength;i++){
					if(0 == var_array[i]){
						$('#mask-'+var_array[i]).addClass(var_s_class);
					}else{
						$('#mask-'+var_array[i]).addClass(var_class);
					}
				}
			}
			return this;
		},
		addHistoryMask:function(){
				this.addMask(this[this.historyList["type-"+(this.historyID-2)][0]][this.historyList["type-"+(this.historyID-2)][1]],this.helpClass[2],this.helpClass[3]);
				return this;
		},
		clearMask:function(var_s_class,var_class){
			for(var i=0;i<=48;i++){
				if(i==0){
					$('#mask-'+i).removeClass(var_s_class);
				}else{
					$('#mask-'+i).removeClass(var_class);
				}
			}
			return true;
		},
		addBetToInterface:function(){
			this.clearClassForadd();
			var pureData = this.sendList,
				self = this;
			for(var d in pureData){
				var pd = pureData[d][2];
				$("#"+pureData[d][0]+""+pureData[d][1]).attr({'class':self.helpClass[4]});
				switch(true){
					case (pd < 50):
						$("#"+pureData[d][0]+""+pureData[d][1]).addClass(self.betValue[0]);
					break;
					case (pd >= 50) && (pd < 100):
						$("#"+pureData[d][0]+""+pureData[d][1]).addClass(self.betValue[1]);
					break;
					case (pd >= 100 && pd < 500):
						$("#"+pureData[d][0]+""+pureData[d][1]).addClass(self.betValue[2]);
					break;
					case (pd >= 500 && pd < 1000):
						$("#"+pureData[d][0]+""+pureData[d][1]).addClass(self.betValue[3]);
					break;
					case (pd >= 1000 && pd < 5000):
						$("#"+pureData[d][0]+""+pureData[d][1]).addClass(self.betValue[4]);
					break;
					case (pd >= 5000):
						$("#"+pureData[d][0]+""+pureData[d][1]).addClass(self.betValue[5]);
					break;
				}
			}
			return this;
		},
		clearClassForadd:function(){
			var self = this;
			$('#betinthere').find('div').attr({'class':''}).addClass(self.helpClass[4]);
		},
		removeEnptyElement:function(){
			var self = this;
			$('#betinthere').find('div').each(function(){
				if($(this).attr('class') === self.helpClass[4]){
					$(this).remove();
				}	
			});
		},
		setTitleSign:function(){
			var _pureList = this.sendList,
				_self = this;
				_element = $('ul li');
			_element.attr({'title':''});
			for(var d in _pureList){
				_element.each(function(){
					if(($(this).attr(_self.helpAttribute[0])==_pureList[d][0])&&($(this).attr(_self.helpAttribute[1])==_pureList[d][1])){
						$(this).attr({'title':_pureList[d][2]});
					}	
				});
			}	
			return this;
		},
		setinterimBet:function(){
			var self = this,
				element = $('ul.bet-but-b li');
				element.click(function(){
					element.removeClass('active');
					self.interimBet = parseInt($(this).find('.betvalue').html());
					$(this).addClass('active');
				});
		},
		initFeedback:function(){
			var self = this;
			$('#interim-bet').html(self.globalCount_backup-self.globalCount);
			$('#user-count').html(self.globalCount);
			return this;
		},
		addEvent:function(){
			var self = this;
			self.setinterimBet();
			$('ul li').click(function(e){
					e = e || window.event;
					var ll = e.pageX-6,
						lt = e.pageY-6,
						tp = $(this).attr(self.helpAttribute[0]),
						tpc= $(this).attr(self.helpAttribute[1]),
						arr=[];
					self.interimBet = self.interimBet == 0 ? 10 : self.interimBet;
					if(tp != null && tpc != null){
						if(self.interimBet <= self.globalCount){
							arr = bigWheel[tp][tpc];	
							if($('#'+tp+""+tpc).length == 0){
								$('<div/>').css({'left':ll,'top':lt}).attr({'id':tp+""+tpc,'class':self.helpClass[4]}).prependTo("#betinthere");
							}
							self.addMask(arr,self.helpClass[2],self.helpClass[3]).addToHistoryList(tp,tpc,self.interimBet).getUniqueList().addBetToInterface().setTitleSign().getInformation();
						}else{
							alert(self.normalWord[0]+self.interimBet+"!");
						}
					}
					self.initFeedback();
			});
			$('ul li').mouseover(function(){
					var tp = $(this).attr(self.helpAttribute[0]),
						tpc= $(this).attr(self.helpAttribute[1]),
						arr=[];
					if(tp != null && tpc != null){
						arr = bigWheel[tp][tpc];	
						self.addMask(arr,self.helpClass[0],self.helpClass[1]);
					}
				});
			$('ul li').mouseleave(function(){
					self.clearMask(self.helpClass[1],self.helpClass[0]);
			});
			$('#getunique').click(function(){
					self.getUniqueList().getInformation().initFeedback();
			});
			$('#backto').click(function(){
					if(self.historyID-1 > 0){
						self.addHistoryMask().backToHistory(self.historyID-1).getUniqueList();
					}
					else if((bigWheel.historyID-1) == 0){
						self.backToHistory().getUniqueList().clearMask(self.helpClass[3],self.helpClass[2]);
					}else{
						alert(self.normalWord[1]);	
					}
					self.initFeedback().addBetToInterface().getInformation().setTitleSign().removeEnptyElement();
			});
		},
		getInformation:function(){//For Programm Test
			  console.log(this.historyList);
			  console.log(this.historyID);
			  console.log(this.sendList);
			  console.log(this.sendListLength);
			  console.log(this.globalCount);
			  console.log(this.globalCount_backup);
			  return this;
		}
	};	
	bigWheel.init();

})();