<?php
/* @var $this DefaultController */
$this->breadcrumbs=array(
	$this->module->id,
);


//Yii::app()->adminuser->loginRequired();
//echo Yii::app()->request->isAjaxRequest == true ? "Is Ajax Request":"It normal Request";
//var_dump(Yii::app()->homeUrl)."<br />";

?>
<div class="div-item">
    <h2 class="items-title">About CWebUser Class,Login Information</h2>
    <div class="item-block add-transition">
    	 <?php
		 	if(isset(Yii::app()->adminuser->id) && isset(Yii::app()->adminuser->userInfo)){
				var_dump(Yii::app()->adminuser->userInfo);
				echo "Hello :".Yii::app()->adminuser->id."<br />";
			}
		 ?>	
    </div>
</div>
<div class="div-item">
    <h2 class="items-title">Detemint Request</h2>
    <div class="item-block add-transition">
    	<?php 
			if(Yii::app()->request->isAjaxRequest) {
				echo "it is an AJAX Call"."<br />";
			}
			else {
				echo "it is not an AJAX Call"."<br />";
			}
		?>
    </div>
</div>

<div class="div-item">
    <h2 class="items-title">Ajax Request</h2>
    <div id="json" class="item-block add-transition">
    CLICK ME
    </div>
</div>