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

?>

<div class="detail-view-block">
<table class="hl-detail-view" id="yw0"><tbody>
<tr class="odd"><th>IP:</th><td><?=$ipAddress ?></td></tr>
<tr class="even"><th>Country:</th><td><?=$ip2c->get_country_name($ipAddress) ?></td></tr>
<tr class="odd"><th>Country Code:</th><td><?=$ip2c->get_country_code($ipAddress) ?></td></tr>
</tbody></table></div>

<span class="buttom valiable" >Click</span>