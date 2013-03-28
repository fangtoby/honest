<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<script src="<?=Yii::app()->request->baseUrl;?>/js/FusionCharts/FusionCharts.js" language="javascript" type="text/javascript"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id='loading'></div>
<div class="header-main">
	<div id="mainmenu" class="clearfix">
    	<?php $this->widget('application.extensions.cmenu.CMMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Users', 'url'=>array('/users'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'('.Yii::app()->user->name.')', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array(
					'label'=>'more', 
					'url'=>array('#'), 
					'linkOptions'=>array('class'=>'more more-down'),
					'visible'=>!Yii::app()->user->isGuest,
					),				
			),
		)); ?>
		<div class="title">
        	<a href="#">HL</a>
        </div>
	</div><!-- mainmenu -->
    <?php if(!Yii::app()->user->isGuest):?>
    <div class="second-menu">
    	<div class="s-m-main">
        	<ul class="s-m-m-u clearfix">
            	<li>
                	<a href="<?=$this->createUrl('/site/logout');?>">Logout</a>
                </li>
                <li>
                	<a href="#">Daily(<b>1000</b>)</a>
                </li>
                <li>
                	<a href="#">Friend(<b>990</b>)</a>
                </li>
                <li>
                	<a href="#">Message(<b>20</b>)</a>
                </li>
            </ul>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>'&nbsp;/&nbsp;',
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

</div><!-- page -->
</body>
</html>
