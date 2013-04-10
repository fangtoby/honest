<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>


<?php
$ip2c=new ip2country();
$ipAddress = '202.102.81.241';
echo $ipAddress.' belongs to '. $ip2c->get_country_name($ipAddress) . '<br>';
echo $ip2c->get_country_name($ipAddress).' country code is ' . $ip2c->get_country_code($ipAddress);

?>