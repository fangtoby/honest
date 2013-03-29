<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->uid,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->uid)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->uid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<div class="items-add-padding">
<h1><?php echo $model->username; ?></h1>
</div>
<div class="detail-view-block">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
			'class'=>'hl-detail-view'
	),
	'attributes'=>array(
		array(
			 'name'=>'userimage', 
			 'type'=>'html',
			 'value'=>CHtml::image(Yii::app()->request->baseUrl."/".$model->userimage,"",array("style"=>"height:100px;")),
		),
		'uid',
		'username',
		'password',
		array(
			'name'=>'email',
			'type'=>'email',
			'value'=>$model->email,
		),
		'userpower',
		'loginfrequency',
		'createtime',
		'updatetime',
	),
)); ?>
</div>