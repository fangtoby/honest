<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);

if(isset(Yii::app()->session['userID'])){
	echo "Hello :".Yii::app()->session['userID']."<br />";
}
//Yii::app()->adminuser->loginRequired();
//echo Yii::app()->request->isAjaxRequest == true ? "Is Ajax Request":"It normal Request";

if(Yii::app()->adminuser->isGuest)
	echo "User Is Guest!"."<br />";
	
var_dump(Yii::app()->homeUrl)."<br />";

?>

<div id="json" style="color:#C00; padding:10px 20px; border:#900 1px solid; margin:10px 0;">CLICK ME</div>

<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<h1><?php echo Yii::app()->controller->module->id. '/' . $this->action->id; ?></h1>
<h1><?php echo Yii::app()->controller->id. '/' . $this->action->id; ?></h1>
<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>