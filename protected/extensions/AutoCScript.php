<?php

class AutoCScript{//Auto Create Script Or Css File 	
	
	private static $_instance;
	
	private function __construct(){
		echo 'This is a Contructed method;';
	}
	
	public function __clone(){
		trigger_error('Clone is not allow!',E_USER_ERROR);	
	}
	
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self;
		}	
		return self::$_instance;
	}
	
	public function test(){
		echo '调用test方法!';	
	}
}
