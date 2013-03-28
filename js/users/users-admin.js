/*
* Script Create By Class AutoCScript
* Class File Name AutoCScript.php
* Data:2013/03/19 19:35:01
* Relation Controller [users]
* Relation Action [admin]
*/
function usersAdminAction(){
}
usersAdminAction.prototype = {
	delayed : false,//false/true
	inforUrl:{
		basicUrl:'http://localhost/DA/honest/',	
		returnDate:'users/getData'
	},
	init:function(){
		var _self = this;
		var _innerTimer = setTimeout(function(){
			_self.getDrewData(_self);
		},2000);
	},
	getDrewData:function(parent){
		$.ajax({
		   type: "POST",
		   url:parent.inforUrl.basicUrl+parent.inforUrl.returnDate,
		   data: {
			   //sid : sid,
		   },
		   success: function(msg){
				if(msg == 0){
					//Alert something
				}else{
					var myChart = new FusionCharts(parent.inforUrl.basicUrl+ "chart/Pie3D.swf", "myChartId1", "570", "350", "0", "0");
					myChart.setDataXML(msg);
					myChart.render("item-test-chart");
				}
		   }
		});	
	}
}
