<?php

$this->pageTitle=Yii::app()->name . ' - Login';
?>
<?php
	if(Yii::app()->user->hasFlash('message')){
?>
	<div class="ms-success"> <?php echo Yii::t('message',Yii::app()->user->getFlash('message')); ?></div>
<?php
	}
?>
<div class="login-frame clearfix">
<div class="left-side-targer">
	<div class="side-img-main">
    	<img src="<?=Yii::app()->request->baseUrl;?>/images/4178-sephiroth-1920x1200-game-wallpaper.jpg"  />
    </div>
</div>
<div class="login-form form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="row">
		<?php echo CHtml::activeLabel($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			<a href="#">Forgot your password!.</a>
		</p>
	</div>
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo CHtml::activeLabel($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		</div>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo CHtml::activeLabel($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login',array('class'=>'buttom')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>