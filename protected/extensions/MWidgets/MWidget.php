<?php
class MWidget extends CWidget
{
	public $widgetName = "Login Drewing";
	public $param = array();
	public $delimiter = ' / ';
	
	protected function registerClientScript()
	{
		/*
		$cs = Yii::app()->clientScript;
		$cs->registerCssFile();
		$cs->registerScriptFile();	
		*/
	}
	
	public function init()
	{
		$this->registerClientScript();
		$this->render('MWidget');
		parent::init();	
	}
}
?>
<?php
	//public $param = array(); //Add this to CMycontroller , The basic controller class
?>
<?php
	 //if(isset($this->param)): //Add in Layout view
?>
<?php 
	/*
	$this->widget('application.extensions.MWidgets.MWidget',array(
				'param'=>$this->param,
	));
	
	 */
	 ?>
<?php //endif; ?>

<?php
	/*
	*Add in you want render views file
	*
	$this->param = array(
				array('name'=>'Hello','url'=>'site/index'),
				array('name'=>'World','url'=>'site/index'),
				array('name'=>'Fuck','url'=>'site/index'),
				array('name'=>'Hello','url'=>'site/index'),
				array('name'=>'Ciao','url'=>'site/index'),
			);
	*/
?>