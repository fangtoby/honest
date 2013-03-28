<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Upload',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<div class="items-add-padding">
	<h1>Upload <?php echo $model->username;?> images</h1>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
	'enableAjaxValidation'=>false,
)); ?>
	<div class="row">
		<?php echo $form->label($model,'userimage'); ?>
		 <input type="file" name='userimage' size="55" >
		<?php echo $form->error($model,'userimage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'buttom')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->