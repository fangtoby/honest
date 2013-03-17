<?php
/* @var $this TempController */
/* @var $model Temp */

$this->breadcrumbs=array(
	'Temps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Temp', 'url'=>array('index')),
	array('label'=>'Manage Temp', 'url'=>array('admin')),
);
?>

<h1>Create Temp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>