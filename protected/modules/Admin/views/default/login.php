<?php
if(Yii::app()->adminuser->isGuest){
	echo "User Is Guest!"."<br />";
}else{
	echo "User Is Past Access Control!"."<br />";
}
//echo Yii::app()->adminuser->state."<br />";time
echo Yii::app()->adminuser->id."<br />";
var_dump(Yii::app()->adminuser->userInfo)."<br />";
$userInfoArray = Yii::app()->adminuser->userInfo;
echo $userInfoArray['name']."<br />";
echo date('Y-m-d h:m:s',Yii::app()->adminuser->time)."<br />";
?>