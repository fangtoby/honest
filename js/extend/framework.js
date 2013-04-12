(function(window,undefined){
  
  var ai = function(selector){
		  return new ai.fn.init(selector);
  };
  
  ai.fn = ai.prototype = {
		  version:'1.0',
		  author:'honest_lies',
		  element:[],
		  init:function(selector){
			  if(!selector){
				  return this;
			  }else{
				  this.element = document.getElementById(selector);
				  return this;
			  }
		  },
		  getElementType:function(){
			  return typeof(this.element);
		  },
		  getHtml:function(){
			  return this.element.innerHTML;	
		  }
  };
  
  ai.fn.init.prototype = ai.fn;
  
  window.ai = ai;
  
})(window);

//console.log(ai('ai-test').getHtml());