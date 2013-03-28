<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

?>
<?php
	
?>
<?php $this->renderPartial('_loginchar'); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'htmlOptions'=>array(
			'class'=>'hl-table'
	),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'uid',
		'username',
		array(
			'name'=>'email',
			'type'=>'email',
			'value'=>'$data->email',
		),
		array(
			 'name'=>'userimage', 
			 'type'=>'html',
			 'value'=>'CHtml::image(Yii::app()->request->baseUrl."/images/".$data->userimage.".jpg","",array("style"=>"width:25px;height:25px;"))',
			'htmlOptions' => array('style'=>'text-align:center;'),
			 //'value'=>'CHtml::image(Yii::app()->request-baseUrl."/images/"'.$model["userimage"].'".jpg",array("height"=>30))'
		),
		'userpower',
		'loginfrequency',
		'createtime',
		'updatetime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
