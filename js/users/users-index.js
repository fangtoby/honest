/*
* Script Create By Class AutoCScript
* Class File Name AutoCScript.php
* Data:2013/03/19 19:31:48
* Relation Controller [users]
* Relation Action [index]
*/
function usersIndexAction(){
}
usersIndexAction.prototype = {
	delayed : false,//false/true
	url:{
			valiable:'/index.php/site/valiable'
	},
	init:function(){
		var _self = this;
		var starTime = Math.round(new Date().getTime());
		//console.log(Math.round(new Date().getTime()));
		if($('hl-detail-view').hasClass('test')){
		//	console.log('e');	
		}else{
		//	console.log('r');	
		}
		//console.log(Math.round(new Date().getTime()) - starTime);
		var hash = CryptoJS.SHA256("root");
		var addMask = hash.toString(CryptoJS.enc.Hex);
		//console.log(addMask);
		
		$('.valiable').click(function(){
			_self.valiablePassword(_self,addMask);
		});
		(function(){
			
			//console.log(0x10);
			
		})();
	},
	valiablePassword:function(parent,password){
		var self = parent;
		$.ajax({
				type: "GET", 
				dataType:"json", 
				data:{
					isAjax:'true',
					password:password
				},
				url: $.Honest.url.webroot+self.url.valiable,
				success: function(datas){ 
					console.log(datas);
				}
			});
	}
}
