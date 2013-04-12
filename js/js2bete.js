(function(Math){
	  //Javascript Binary Oporation
	  //15 Binary 1111
	  //9  Binary 1001
	  var i = 15,
		  j = 9;
	  //1111 & 1001 == 1001
	  var ia = (i & j);  //9
	  //1111 | 1001 == 1111
	  var ib = ( i | j); //15
	  //1111 ^ 1001 == 0110
	  var ic = ( i ^ j); //6
	  //~ (0)1111 == (1)1111 == (1)10000
	  var id = ( ~ i);   //-16
	  //~ (0)1001 == (1)1001 == (1)1010
	  var ie = ( ~ j);   //-10
	  
	  
	  //
	  (function(){
		  
			//(-10).toString(2)	 == (1)1010
			function StringToNumberArray(Bin) {
					var numberArray = [];
					for (var i = 0; i < Bin.length; i++) {
						numberArray.push(Bin.substring(i, i + 1));
					}
					return numberArray;
				}
			 
			function ConvertToDecimal(Bin)
			{
				 Bin = StringToNumberArray(Bin);
				  var dec = 0;
				  var MASK;
				  for(var i=0; i< Bin.length; i++)
				  {
					dec <<= 1;
					switch(Bin[i])
					{
						case '0' :
						MASK =0;
						break;
						case '1' :
						MASK =1;
						break;
						default:
						alert("not binary");
						break;
						 
					}
					dec |= MASK;
				  }
				  return dec;
			}
	  })();
			
})();