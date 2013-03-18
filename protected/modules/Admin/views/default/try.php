<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
if(Yii::app()->request->isAjaxRequest) {
			echo "it is an AJAX Call"."<br />";
		}
		else {
			echo "it is not an AJAX Call"."<br />";
		}
if(isset(Yii::app()->adminuser->id)){
	echo "Hello :".Yii::app()->adminuser->id."<br />";
}
//Yii::app()->adminuser->loginRequired();
//echo Yii::app()->request->isAjaxRequest == true ? "Is Ajax Request":"It normal Request";



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
