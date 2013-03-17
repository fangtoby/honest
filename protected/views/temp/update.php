<?php
/* @var $this TempController */
/* @var $model Temp */

$this->breadcrumbs=array(
	'Temps'=>array('index'),
	$model->uid=>array('view','id'=>$model->uid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Temp', 'url'=>array('index')),
	array('label'=>'Create Temp', 'url'=>array('create')),
	array('label'=>'View Temp', 'url'=>array('view', 'id'=>$model->uid)),
	array('label'=>'Manage Temp', 'url'=>array('admin')),
);
?>

<h1>Update Temp <?php echo $model->uid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>