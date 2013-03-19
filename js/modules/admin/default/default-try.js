/*
* Script Create By Class RelationScript
* Class File Name relationScript.php
* Data:2013/03/19 08:58:52
* Relation Modules [admin]
* Relation Controller [default]
* Relation Action [try]
*/
function defaultTryAction(){
}
defaultTryAction.prototype = {
	delayed : false,//false/true
	init:function(){
		var self =this;
		var obj ={
				username:'honest_lies',
				datetime:'2013/03/16',
				age:24,
				likeSport:'baskball',
				likeColor:'red',
				times:0
			};
		$('#json').click(function(){
			$.ajax({
				type: "GET", 
				dataType:"json", 
				data:{
					isAjax:'true',
					json:obj
				},
				//url: 'http://localhost:8000/honest/admin/default/forajax',
				url: 'http://localhost/DA/honest/index.php/admin/default/forajax',
				success: function(datas){ 
					obj = datas;
					$('#json').html("<div>"+self.Obj2str(datas)+"</div>");
				}
			});
		});
	},
	 Obj2str:function(o) {
                if (o == undefined) {
                    return "";
                }
                var r = [];
                if (typeof o == "string") return "\"" + o.replace(/([\"\\])/g, "\\$1").replace(/(\n)/g, "\\n").replace(/(\r)/g, "\\r").replace(/(\t)/g, "\\t") + "\"";
                if (typeof o == "object") {
                    if (!o.sort) {
                        for (var i in o)
                            r.push("\"" + i + "\":" + this.Obj2str(o[i]));
                        if (!!document.all && !/^\n?function\s*toString\(\)\s*\{\n?\s*\[native code\]\n?\s*\}\n?\s*$/.test(o.toString)) {
                            r.push("toString:" + o.toString.toString());
                        }
                        r = "{" + r.join() + "}"
                    } else {
                        for (var i = 0; i < o.length; i++)
                            r.push(this.Obj2str(o[i]))
                        r = "[" + r.join() + "]";
                    }
                    return r;
                }
                return o.toString().replace(/\"\:/g, '":""');
     }
}
