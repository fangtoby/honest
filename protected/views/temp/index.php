<?php
/* @var $this TempController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Temps',
);

$this->menu=array(
	array('label'=>'Create Temp', 'url'=>array('create')),
	array('label'=>'Manage Temp', 'url'=>array('admin')),
);
?>

<h1>Temps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
