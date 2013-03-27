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

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'uid',
		'username',
		'password',
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
