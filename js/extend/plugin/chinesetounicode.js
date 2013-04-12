/*
 * JavaScript kanji conversion to Unicode encoded Unicode code converted to Chinese characters
 * @type object
 * @param ToUnicode  str Chinese
 * @param ToGB2312   str Unicode
 * @date 2012/12/24
 */
var GB2312UnicodeConverter={
		  ToUnicode:function(str){
				return escape(str).toLocaleLowerCase().replace(/%u/gi,'\\u');
		  },
		  ToGB2312:function(str){
				return unescape(str.replace(/\\u/gi,'%u'));
		  }
	};

/*
 * Used to determine whether all Chinese
 * @param str
 * @return true or false
 * @date 2012/12/24
*/
 function isAllChinese(str){ 
		var re = /^[\u4E00-\u9FA5]+$/;
		if(!re.test(str)){ 
			return false; //Not Only Chinese
		} 
		return true; //It All Chinese
 }