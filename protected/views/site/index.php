<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


$this->menu=array(
		 array('label'=>'Home', 'url'=>array('/site')),
		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>'Contact', 'url'=>array('/site/contact')),
);

?>
<h2>Mooning <i>Honest.lies</i></h2>