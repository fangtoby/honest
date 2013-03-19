<?php
/* @var $this DefaultController */
$this->breadcrumbs=array(
	$this->module->id,
);


 if(!isset($_SESSION['user_agent'])){ 
           $_SESSION['user_agent'] = MD5($_SERVER['REMOTE_ADDR'] 
           .$_SERVER['HTTP_USER_AGENT']); 
       }

       /* 如果用户 session ID是伪造,则重新分配 session ID */ 
       elseif ($_SESSION['user_agent']!=MD5($_SERVER['REMOTE_ADDR'] 
       . $_SERVER['HTTP_USER_AGENT'])) { 
            session_regenerate_id(); 
       } 
echo $_SERVER['REMOTE_ADDR'].'<br />';
echo $_SERVER['HTTP_USER_AGENT'].'<br />';



?>
