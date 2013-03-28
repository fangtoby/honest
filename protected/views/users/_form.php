<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
	'enableAjaxValidation'=>false,
)); ?>
	<div class="row">
        <?php echo CHtml::activeLabel($model,'username') ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'minlength'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo CHtml::activeLabel($model,'rpassword'); ?>
		<?php echo $form->passwordField($model,'rpassword',array('size'=>60,'minlength'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rpassword'); ?>
	</div>
	<div class="row">
		<?php echo CHtml::activeLabel($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'buttom')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->