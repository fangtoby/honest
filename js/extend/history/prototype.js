// JavaScript Document
(function(){
	function _$(els){
		this.elements = [];
		for(var i=0,len=els.length;i<len;++i){
			var element = els[i];
			if(typeof element === 'string'){
				element = document.getElementById(element);
			}	
			this.elements.push(element);
		}
	}
	_$.prototype={
		each:function(fn){
			for(var i=0,len=this.elements.length ; i<len ; ++i){
				fn.call(this,this.elements[i]);
			}	
			return this;
		},
		setStyle:function(prop,val){
			this.each(function(el){
				el.style[prop] = val;
			});	
			return this;
		},
		show:function(){
			var self = this;
			this.each(function(el){
				self.setStyle('display','block');	
			});	
			return this;
		},
		addEvent:function(type,fn){
			var add = function(el){
				if(window.addEventListener){
					el.addEventListener(type,fn);
				}
				else if(window.attachEvent){
					el.attachEvent('on'+type,fn);
				}
			};
			this.each(function(el){
				add(el);
			});
			return this;
		}
	};
	window.$=function(){
		return new _$(arguments);	
	}
	/**
	* Web Event Interface 
	*/
	var DED = window.DED || {};
	DED.util.Event={
		getEvent:function(e){
			return e || window.event;	
		},
		getTarget:function(e){
			return e.target || e.srcElement;
		},
		stopPropagation:function(e){
			if(e.stopPropagation){
				e.stopPropagation();
			}else{
				e.cancelBubble = true;
			}
		},
		preventDefault:function(e){
			if(e.preventDefault){
				e.proventDefalut();
			}else{
				e.returnValue = false;
			}
		},
		stopEvent:function(e){
			this.stopPropagation(e);
			this.preventDefault(e);
		}	
	};
	/**
	* Read Json Style Data
	* {color:'white',background:'black',fontSize:'16px'}
	*/
	function setCSS(el,styles){
		for(var prop in styles){
			if(styles.hasOwnProperty(prop)){
				setStyle(el,prop,styles[prop]);
			}
		}
	}
	/**
	* How To Create a Calendar
	*/
	var CalendarYear = function(year,parent){
		this.year = year;
		this.element = document.createElement('div');
		this.element.style.display = 'none';
		parent.appendChild(this.element);
		function isLeapYear(y){
			return (y>0) && !(y%4) && ((y%100)||(y%400));	
		}
		this.months = [];
		this.numDays =[31,isLeapYear(this.year)?29:30,31,30,31,30,31,31,30,31,30,31];
		for(var i=0,len=12;i<len;i++){
			this.months[i] = new CalendarMonth(i,this.numDays[i],this.element); 
		}
	};
	CalendarYear.prototype = {
		display:function(){
			for(var i=0,len = this.months.length;i<len;i++){
				this.months[i].display();
			}	
			this.element.style.display = 'block';
		}	
	};
	var CalendarMonth = function(monthNum,numDays,parent){
		this.monthNum = monthNum;
		this.element = document.createElement('div');
		this.element.style.display = 'none';
		parent.appendChild(this.element);
		
		this.days=[];
		
		for(var i=0,len = numDays;i<len;i++){
			this.days[i] = new CalendarDay(i,this.element);
		}	
	};
	CalendarMonth.prototype = {
		display:function(){
			for(var i=0,len = this.days.length;i<len;i++){
				this.days[i].display();
			}	
			this.element.style.display = 'block';
		}	
	};
	var CalendarDay = function(date,parent){
		this.date = date;
		this.element = document.createElement('div');
		this.element.style.display = 'none';
		parent.appendChild(this.element);
	}
	CalendarDay.prototype = {
		display:function(){
			this.element.style.display = 'block';
			this.element.innerHTML = this.date;	
		}	
	};
})();
































