<?php

class Util {
    static function postRequest($url,$data){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_COOKIEJAR,null);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $content = curl_exec($ch);
        return $content;
    }

    public static function getRequest($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		$errorMsg = curl_error($ch);

		if(!empty($errorMsg)) {
			return false;
		}
		if(is_resource($ch)) {
			curl_close($ch);
		}

		return $result;
    }    

    //获取客户端的真实IP
    static function getRealIp(){
        if(getenv('HTTP_X_REAL_IP')) {
            $ip = getenv('HTTP_X_REAL_IP');
        }
        elseif(getenv('HTTP_X_FORWARDED_FOR')){
            $remote_addr = getenv("HTTP_X_FORWARDED_FOR");
            $tmp_ip = explode( ",", $remote_addr );
            $ip = $tmp_ip[0]; 
        }elseif(getenv('HTTP_CLIENT_IP')){
            $ip = getenv('HTTP_CLIENT_IP');
        }elseif(getenv('REMOTE_ADDR')){
            $ip = getenv('REMOTE_ADDR');
        }elseif(isset($_SERVER['REMOTE_ADDR'])){
            $ip = $_SERVER['REMOTE_ADDR'];
        }else{
            $ip = "";
        }
        return $ip;
    } 
    
    //允许的ip返回为true，不允许的ip返回为false
    public static function checkIp(){
        $list = Util::loadconfig('ipCheckList');
        $realIp = Util::getRealIp();
        foreach ($list as $item) {
            if (preg_match($item, $realIp)) {
                return true;
            }
        }
        return false;
    }
    
    public static function isLastDay($lastTimestamp, $timestamp){
    	return (strcmp(
	    	Util::getDayTime(mktime(0, 0, 0, date("m", $lastTimestamp), date("d", $lastTimestamp)+1, date("Y", $lastTimestamp))), Util::getDayTime($timestamp)) == 0
    	);
    }
    
    public static function getHourTime($timestamp) {
        return mktime(date("H", $timestamp), 0, 0, date("m", $timestamp), date("d", $timestamp), date("Y", $timestamp));
    }
    
    public static function getTime($timestamp){
    	return date("YmdHis", $timestamp);
    }
    public static function getYearAndMouth($timestamp){
		return date("Ym", $timestamp);
	}
    public static function getDayTime($timestamp) {
        return date("Ymd000000", mktime(0, 0, 0, date("m", $timestamp), date("d", $timestamp), date("Y", $timestamp)));
    }
    
    
    public static function getMonthTime($timestamp) {
        return mktime(0, 0, 0, date("m", $timestamp), 1, date("Y", $timestamp));
    }
    
    public static function changeArrayToHashByKey($data, $hashKey) {
        $result = array();
        foreach ($data as $item) {
            $result[$item[$hashKey]] = $item;
        }
        return $result;
    }
    
	public static function getEarlyMorningTime($timestamp){
			$dayStart = date('Y-m-d',$timestamp);
			$dayStartTamp = strtotime($dayStart);
			return $dayStartTamp;
	}
    public static function getSig($uid) {
        return hash('sha256', $uid . SECRETKEY);
    }
    
    public static function isDate($str){
        $flag = 1;
        if(strlen($str)==10){
            preg_match( "/(\d{4})-(\d{2})-(\d{2})/", $str, $result);
            if(isset($result[0])){
                $flag = checkDate($result[2], $result[3], $result[1]); 
            }else{
                $flag = 0;
            }
           
        }elseif(strlen($str)==19){
            preg_match( "/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/", $str, $result);
            if(isset($result[0])){
                $flag = checkDate($result[2], $result[3], $result[1]); 
                if($result[4] >= 24 || $result[5]>=60 || $result[6]>=60){
                    $flag = 0;
                }
            }else{
                $flag = 0;
            }
        }else{
            $flag = 0;
        }
        return $flag;
    }
    
    public static function isPositiveInteger($num){
        preg_match("/^\d+$/", $num, $result);
        if(isset($result[0])){
            return 1;
        }else{
            return 0;
        }
    }
    
    public static function getSubStr($str, $len) {
        if (mb_strlen($str) < $len) {
            return $str;
        }
        $utf8Len = mb_strlen($str, 'utf-8');
        $end = intval($len / 2);
        while (mb_strlen(mb_substr($str, 0, $end, 'utf-8')) < $len && $end < $utf8Len) {
            $end ++;
        }
        if ($end < $utf8Len) {
            return mb_substr($str, 0, $end - 1, 'utf-8') . '...';
        }
        else {
            return $str;
        }
    }
	public static function multi_array_sort($multi_array,$sort_key,$sort=SORT_DESC){
		if(is_array($multi_array)){
			foreach ($multi_array as $row_array){
				if(is_array($row_array)){
					$key_array[] = $row_array[$sort_key];
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
		array_multisort($key_array,$sort,$multi_array);
		return $multi_array;
	}
	public static function array_unique_fb($array2D){
		 foreach ($array2D as $v){
			 $v = join(",",$v);  //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
			 $temp[] = $v;
		 }
		 $temp = array_unique($temp);    //去掉重复的字符串,也就是重复的一维数组
		foreach ($temp as $k => $v){
			$temp[$k] = explode(",",$v);   //再将拆开的数组重新组装
		}
		return $temp;
	}
}
?>
