<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);

$this->menu=array(
		array('label'=>'Home', 'url'=>array('/site')),
		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>'Contact', 'url'=>array('/site/contact')),
);

?>

<div class="editer">
	<div class="e-title">
    	<input type="text" />
    </div>
	<div class="e-body">
    	<textarea></textarea>
    </div>
</div>