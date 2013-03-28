
	$.ajax({
	   type: "POST",
	   url: AJM.url.ctrl + "monthinfo",
	   data: {
		   sid : sid,
		   tbid : tbid,
		   ismall: ismall,
		   no : num
	   },
	   success: function(msg){
			if(msg == 0){
				AJMPopup.alert({
					content : '只能查看一年内数据!'
				});
			}else{
				var myChart = new FusionCharts(AJM.url.base + "chart/MSCombiDY2D.swf", "myChartId1", "800", "228", "0", "0");
				myChart.setDataXML(msg);
				myChart.render("item-sales-chart");
			}
			page_eff = true;
	   }
	});