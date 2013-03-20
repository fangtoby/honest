<h2>Yii Session & Cookie & js</h2>
<?php
	if(!isset($_SESSION['user_agent'])){ 
		  $_SESSION['user_agent'] = MD5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']); 
	}elseif($_SESSION['user_agent'] != MD5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'])) { 
		  session_regenerate_id(); 
	} 
	echo $_SERVER['REMOTE_ADDR'].'<br />';
	echo $_SERVER['HTTP_USER_AGENT'].'<br />';
	var_dump($_COOKIE);
	
	@session_set_save_handler();
?>
