/**
*	The number of seconds in each of the given units.
*	@type {Object.<number>}
*	@const
*/
adways.example.SECONDS_TABLE = {
	minute:60,
	hour:60*60,
	day:60*60*24	
};

(function(){
	var isTure = Boolean(0);
	if(isTure){
		var foo = function(){};	
	}	
	//typeof Boolean(0) == 'boolean';
	//typeof new Boolean(0) == 'object';
	
	var aArray = [];//var aArray = new Array();
	var aObject= {};//var aObject= new Object();
	
	var initBigWheel = function(){};
	
	initBigWheel.prototype={
		
	};
	
})();
/**
*	@private,@public
*	@constructor
*/
AA_PrivateClass_ = function(){
	};
/**	@private */
function AA_init_(){
		return new AA_PrivateClass_();
	}
	
AA_init_();



//	File 1.

/**	@constructor	 */
	AA_PublicClass = function(){
		};

/**	@private	*/
	AA_PublicClass.staticPrivateProp_ = 1;
	
/**	@private	*/
	AA_PublicClass.prototype.privateProp_ = 2;
	
/**	@protected	*/
	AA_PublicClass.staticProtectedProp = 31;
	
/**	@protected	*/
	AA_PublicClass.prototype.protectedProp = 4;
	
/**
*	@return {number} The number of ducks we've arranged in a row.
*/
AA_PublicClass.prototype.method = function(){
	//Legal accesses of these two properties.
	return this.privateProp_ + AA_PublicClass.staticPrivateProp_;
	};


//File 3

/**
*	@constructor
*	@entends{AA_PublicClass}
*/
AA_SubClass = function(){
	//Legal access of a protected static property.
	AA_PublicClass.staticProtectedProp = this.method();
	};
goog.inherits(AA_SubClass,AA_PublicClass);

/**
*	Some class, initialized with a value.
*	@param {Object} value Some value.
*	@constructor
*/
function MyClass(value){
		/**
		*	Some Value
		*	@type {Object}
		*	@private
		*/
		this.myValue_ = value;
		
	}
	
//	Copyright 2009 Google Inc. All Rights Reserved.
/**
 *	@fileoverview Description of file. its uses and information
 *	about its dependencies
 *	@author user@google.com	{Firstname Lastname}
*/

/**
*	Class making something fun and easy
*	@param {string} arg1 An argument that makes this more interesting
*	@param {Array.<number>} arg2 List of numbers to be processed.
*	@constructor
*	@extends	{goog.Disposable}
*/

project.MyClass = function(arg1,arg2){
		//..
	};
goog.inherits(project.MyClass,goog.Disposable);


/**
 *	Operates on an instance of MyClass and returns something.
 *	@param {project.MyClass} obj Instance of MyClass which leads to a long
 *		comment that needs to be wrapped to two lines
 *	@return {boolean} Whether something occured
 */
 function PR_someMethod(obj){
	 	//..
	 }
/**
 *	Maximum number of things per pane
 *	@type {number}
 *	project.MyClass.prototype.someProperty = 4;
 */

function listHtml(items){
		var html=[];
		for(var i=0;i<items.length;++i){
			html[i] = itemHtml(items[i]);
		}
		return '<div class="foo">'+html.join(',')+'</div>';;
	}
	
var paragraphs = document.getElementsByTagName('p');
for(var i=0,paragraph;paragraph=paragraphs[i];i++){
	doSomething(paragraph[i]);
}

var parentNode = document.getElementById('foo');
for(var child = parentNode.firstChild; child;child = child.nextSibling){
	doSomething(child);
}


/*
	*Callback function
*/
var func1 = function(callback){
		//do something.
		(callback && typeof(callback) === 'function') && callback();
	};

var func2 = function(){};

	func1(func2);



/**
	* For Test Of Javascript
*/
var Lottery  = {
		projectName:'Lottery',
		version:1.0,
		startDate:'2012-12-4',
		endDate:'2013-1-1',
		userInformation:{
			username:'fang.yanliang',
			userid:'340827198908302315',
			userLoginTime:''	
		},
		Url:{
			base:'http://localhost/financial/index.php?r=',	
			jsonGet:{
				getCousetontList:'controller/actionName',	
				getSuperList:'',
				getNotesList:'',
				getSlideUpList:'',
				getLeaveMessageList:'',
				getModelBaseList:''
			}
		},
		commonWord:{
			
		},
		idInformation:{
			uid:'',
			sid:'',
			aid:''
		},
		idInputString:['#user-uid','#share-id','#album-uid'],
		setClientId:function(){
			var self =this;
			self.idInformation['uid'] = $(self.idInputString[0]).val();	
			self.idInformation['sid'] = $(self.idInputString[1]).val();	
			self.idInformation['aid'] = $(self.idInputString[2]).val();	
		},
		setUserInformation:function(){
				
		}
};

var OLM = {//objectListModel
		clientInformation:{//
		},
		getDataUrl:{//URL String Of Get Data Like Json
			base:'',
			jsonGet:{
			},
			getWord:{
			},
			getInformation:{
			}	
		},
		setClicentInformatin:function(){//set Client Information
			
		},
		eventControl:{//Event Control
			
		},
		commonFunction:{//common Function
			
		},
		commonWord:{//common word
			
		}
};



















