jQuery.extend(
{
   /**
   * @see   将json字符串转换为对象
   * @param   json字符串
   * @return 返回object,array,string等对象
   */
   evalJSON : function (strJson)
   {
    return eval( "(" + strJson + ")");
   }
});
jQuery.extend(
{
   /**
   * @see   将javascript数据类型转换为json字符串
   * @param 待转换对象,支持object,array,string,function,number,boolean,regexp
   * @return 返回json字符串
   */
   toJSON : function (object)
   {
    var type = typeof object;
    if ('object' == type)
    {
     if (Array == object.constructor)
      type = 'array';
     else if (RegExp == object.constructor)
      type = 'regexp';
     else
      type = 'object';
    }
      switch(type)
    {
        case 'undefined':
       case 'unknown': 
      return;
      break;
     case 'function':
       case 'boolean':
     case 'regexp':
      return object.toString();
      break;
     case 'number':
      return isFinite(object) ? object.toString() : 'null';
        break;
     case 'string':
      return "'" + object.replace(/(//|/")/g,"//$1").replace(//n|/r|/t/g,
        function(){   
                var a = arguments[0];                   
         return (a == '/n') ? '//n':   
                       (a == '/r') ? '//r':   
                       (a == '/t') ? '//t': "" 
            }) + "'";
      break;
     case 'object':
      if (object === null) return 'null';
        var results = [];
        for (var property in object) {
          var value = jQuery.toJSON(object[property]);
          if (value !== undefined)
            results.push(jQuery.toJSON(property) + ':' + value);
        }
        return '{' + results.join(',') + '}';
      break;
     case 'array':
      var results = [];
        for(var i = 0; i < object.length; i++)
      {
       var value = jQuery.toJSON(object[i]);
          if (value !== undefined) results.push(value);
      }
        return '[' + results.join(',') + ']';
      break;
      }
   },
   Obj2str: function(o) {
                if (o == undefined) {
                    return "";
                }
                var r = [];
                if (typeof o == "string") return "\"" + o.replace(/([\"\\])/g, "\\$1").replace(/(\n)/g, "\\n").replace(/(\r)/g, "\\r").replace(/(\t)/g, "\\t") + "\"";
                if (typeof o == "object") {
                    if (!o.sort) {
                        for (var i in o)
                            r.push("\"" + i + "\":" + fn.Obj2str(o[i]));
                        if (!!document.all && !/^\n?function\s*toString\(\)\s*\{\n?\s*\[native code\]\n?\s*\}\n?\s*$/.test(o.toString)) {
                            r.push("toString:" + o.toString.toString());
                        }
                        r = "{" + r.join() + "}"
                    } else {
                        for (var i = 0; i < o.length; i++)
                            r.push(fn.Obj2str(o[i]))
                        r = "[" + r.join() + "]";
                    }
                    return r;
                }
                return o.toString().replace(/\"\:/g, '":""');
            }
});

