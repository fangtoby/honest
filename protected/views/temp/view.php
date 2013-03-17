<?php
/* @var $this TempController */
/* @var $model Temp */

$this->breadcrumbs=array(
	'Temps'=>array('index'),
	$model->uid,
);

$this->menu=array(
	array('label'=>'List Temp', 'url'=>array('index')),
	array('label'=>'Create Temp', 'url'=>array('create')),
	array('label'=>'Update Temp', 'url'=>array('update', 'id'=>$model->uid)),
	array('label'=>'Delete Temp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->uid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Temp', 'url'=>array('admin')),
);
?>

<h1>View Temp #<?php echo $model->uid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'uid',
		'uname',
		'uemail',
	),
)); ?>
