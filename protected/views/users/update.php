<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->uid=>array('view','id'=>$model->uid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->uid)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<div class="items-add-padding">
<h1>Update <?php echo $model->username; ?></h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>