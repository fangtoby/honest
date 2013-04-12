/*
 * jQuery extend function
 * @type function(){};
 * @param object object:{}
 * @example $.clone(object);
 * @name $.clone
 * @cat Plugins/Clone
 * @return Object : {};
 * @date 07-Dec-2012  11:05
 */
$.clone = function(obj){
	var o, obj;
	//
    if (obj.constructor == Object){
        o = new obj.constructor(); 
    }else{
        o = new obj.constructor(obj.valueOf()); 
    }
    for(var key in obj){
        if ( o[key] != obj[key] ){ 
            if ( typeof(obj[key]) == 'object' ){ 
                o[key] = $.clone(obj[key]);
            }else{
                o[key] = obj[key];
            }
        }
    }
	//add object default basic function to new clone object
    o.toString = obj.toString;
    o.valueOf = obj.valueOf;
    return o;
};
/*
// prototype Extend
Object.prototype.clone = function(){
		var objClone;
		if(this.constructor == Object){
			objClone = new this.constructor;
		}else{
			objClone = new this.constructor(this.valueOf());
		}
		for(var key in this){
        if ( objClone[key] != this[key] ){ 
				if ( typeof(this[key]) == 'object' ){ 
					objClone[key] = clone(this[key]);
				}else{
					objClone[key] = this[key];
				}
			}
		}
		objClone.toString = this.toString;
		objClone.valueOf = this.valueOf;
		return o;
	};
*/