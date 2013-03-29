<?php
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
	<h1>Upload <?php echo '';?> images</h1>
</div>

<div class="form">
	<div class="row">
        <span><?=$model->username?></span>
	</div>
	<div class="row">
		<img src="<?php echo Yii::app()->request->baseUrl."/".$model->getIcon().'?t='.time(); ?>"  style="height:120px"/>
        <img src="<?php echo Yii::app()->request->baseUrl."/".$model->getIcon().'?t='.time(); ?>"  style="height:90px"/>
        <img src="<?php echo Yii::app()->request->baseUrl."/".$model->getIcon().'?t='.time(); ?>"  style="height:60px"/>
        <img src="<?php echo Yii::app()->request->baseUrl."/".$model->getIcon().'?t='.time(); ?>"  style="height:30px"/>
	</div>
	<div class="row buttons">
		 <a href="<?php echo Yii::app()->createUrl('users/confirm') ?>" class="button">Save</a>
	</div>
</div><!-- form -->