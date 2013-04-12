// JavaScript Document
/**
	* style programm 01
			
		var Financial = function(){};
		Financial.prototype = {
				start:function(){
					console.log("Financial Start!");
					},
				stop :function(){
					console.log("Financial Stop!");
					}
			};
		var myFinancial = new Financial();
		myFinancial.start();
		myFinancial.stop();

*/

//style programm 02

/*
		Function.prototype.method = function(name,fn){
				this.prototype[name] = fn;
				return this;
			};
			
		var Financial = function(){};
		
		Financial.method('start',function(){
				console.log('financial start');
			});
		
		Financial.method('stop',function(){
				console.log('financial stop');
			});
		var myFinancial = new Financial();
		console.log(myFinancial);
*/

// Create Interface 


// Class attribute
/*
function Person(name){
	this.name = name;
	this.nnd  = function(){};
	}
Person.prototype = {
		getName:function(){
			return this.name;	
		}
	};
var reader = new Person('John Smith');
console.log(reader.getName());

function Author(name,books){
	this.books = books;
	Person.call(this,name);
	}

Author.prototype = new Person();
Author.prototype.constructor = Author;
Author.prototype.getBooks = function(){
		return this.books;
	};

var d = new Author('fang.yanliang','Just Do it');

console.log(d.getBooks()+"--"+d.getName());
console.log(d);
console.log(reader);
*/


	
	var jsonOpo = {
			color:'#0CD1FC',
			content:null,
			content_a:null,
			timer:null,
			jsonData:{
				a:1	,
				b:3 ,
				c:12,
				d:23,
				e:24,
				f:34,
				g:32
			},
			/**
			*	@type Function
			*	@param Object
			*	@return String
			*/
			objTtransferToStr:function(o){
				var r = [];
				if(typeof o =="string") return "\""+o.replace(/([\'\"\\])/g,"\\$1").replace(/(\n)/g,"\\n").replace(/(\r)/g,"\\r").replace(/(\t)/g,"\\t")+"\"";
				if(typeof o == "object"){
						if(!o.sort){
							for(var i in o)
								r.push('"'+i+'":'+this.objTtransferToStr(o[i]));
							if(!!document.all && !/^\n?function\s*toString\(\)\s*\{\n?\s*\[native code\]\n?\s*\}\n?\s*$/.test(o.toString)){
								r.push("toString:"+o.toString.toString());
							}
							r="{"+r.join()+"}"
						}else{
							for(var i =0;i<o.length;i++)
								r.push(this.objTtransferToStr(o[i]))
							r="["+r.join()+"]"
						}
						return r;
					}
				return o.toString();
			},
			/**
			*	Get Json Data From Server
			*	Transfer To Object
			*/
			getJsonData:function(){
				var self = this;
					$.ajax({
						type: "POST", 
						dataType:"text", 
						url: 'index.php?r=site/returndata',
						success: function(datas){ 
							if(datas){
								console.log(self.jsonData);//
								self.jsonData = eval("(" + datas + ")");
								console.log(self.jsonData);//
								self.readerJson('v').renderToweb('.fp-chart-a .body-chart-bottom',1).addEffect();
								
								self.sendJsonData(self.objTtransferToStr(self.jsonData));
							}else{
								console.log("Error");
							}
						}
					});
				return self;
			},
			/**
			* Send Json Data To Server
			*/
			sendJsonData:function(var_jsons){
				var self = this;
					$.ajax({
						type: "GET", 
						dataType:"text", 
						url: 'index.php?r=site/senddata&jsondata='+var_jsons,
						success: function(datas){ 
							if(datas){
								console.log(eval("(" + datas + ")"));//
							}else{
								console.log("Error");
							}
						}
					});
				return self;
			},
			readerJson:function(type){
					var self  = this,
						datas = self.jsonData,
						str   = '';
					str+='<div class="items clearfix">';
					for(data in datas){
						str+= "<div class='item'>";
						str+= "<span>" + data +'<b>'+ datas[data] + "%</b></span>";
						if(type == 'v'){
							str+= "<div class='static-draw' data-height='"+datas[data]+"%' style='height:"+0+"%;'></div>";
						}else{
							str+= "<div class='static-draw' data-width='"+datas[data]+"%' style='width:"+0+"%;'></div>";
						}
						
						str+= "</div>";
					}
					str+="</div>";
					if(self.content == null && type == 'v'){
						self.content = str;
					}
					if(self.content_a == null && type == 'h'){
						self.content_a = str;
					}
					return self;		
			},
			renderToweb:function(cistern,type){
					if(type == 1){
						$(cistern).html(this.content);	
					}
					if(type == 2){
						$(cistern).html(this.content_a);
					}
					return this;
			},
			addEffect:function(type){
					if(this.content != null ){
						$('.item').each(function(){
							var box = $(this).find('.static-draw'),
								box_height = box.attr('data-height'),
								box_width  = box.attr('data-width');
							if(box.attr('data-height')){
								box.animate({'height':box_height},1200);
							}
							if(box.attr('data-width')){
								box.animate({'width':box_width},1200);
							}
						});
					}
			},
			forNormalUse:function(){
				console.log('ing');	
			}
		};
	jsonOpo.getJsonData();//readerJson('v').renderToweb('.fp-chart-a .body-chart-bottom',1).addEffect();
	
	

//window.location.href = "http://www.news.baidu.com";  // Jiso
//window.document.getElementById();
//window.XMLHttpRequest
//window.clearInterval();window.clearTimeout();
//window.setInterval();window.setTimeout();
//window.history;
//window.navigator

var functionGroup = new function myGroup(){
		this.name = 'Darren';
		this.getName= function(){
			return this.name;	
		};
		this.setName = function(var_name){
				this.name = var_name;
		};
	};





















































