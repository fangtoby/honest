<?php
/*
	*Auto Create Script Ac
	*Basic On Yii Framework
	*@Author Honest_lies[fangtoby6@gmail.com]
	*@Modules Singleton classes
	*@Date	2013-03-19  8:44
	*
	*[example]
	*$autoCScript = AutoCScript::getInstance();
	*$autoCScript->init();
	*[/example]
*/

class AutoCScript{//Auto Create Script Or Css File 	
	
	private $scriptPath;
	private $ds = '/';
	private $actionId;
	private $dot = '.';
	private $lin = '-';
	private $moduleId='';
	private $controllerId;
	private $suffix = 'js';
	private $modulesField = 'modules';
	
	private static $_instance;
	
	private function __construct()
	{
		
	}
	public function __tostring()
	{
		return "This class will auto create Javscript file according to this moment controller and action";
	}
	public function __clone()
	{
		trigger_error('Clone is not allow!',E_USER_ERROR);	
	}
	/*
	*Create Singleton classes function
	*/
	public static function getInstance()
	{
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self;
		}	
		return self::$_instance;
	}
	/*
	*Main login function
	*/
	public function init($enviroment=true)
	{
		if($enviroment === true){
			$this->setScriptPath();
			$this->setAllNeedId();
			$this->mkdirIfNotExist(array($this->scriptPath));
			if($this->moduleId != null){
				$modulesPath = $this->scriptPath.$this->modulesField;
				$modulesItem = $modulesPath.$this->ds.$this->moduleId;
				$modulesControllerPath = $modulesItem.$this->ds.$this->controllerId;
				$this->mkdirIfNotExist(array($modulesPath,$modulesItem,$modulesControllerPath));
				$this->createScript($modulesControllerPath,true);
			}else{
				$controllerPath = $this->scriptPath.$this->controllerId;
				$this->mkdirIfNotExist(array($controllerPath));
				$this->createScript($controllerPath);
			}
		}
	}
	/*
	* Set scirpt file live path 
	* Use Yii::getPathOfAlias('webroot') fucntion
	* 
	*/
	public function setScriptPath()
	{
		$this->scriptPath = Yii::getPathOfAlias('webroot').$this->ds.$this->suffix.$this->ds;
	}
	
	public function setAllNeedId()
	{
		$this->moduleId     = Yii::app()->controller->module ? strtolower(Yii::app()->controller->module->id) : null;
		$this->controllerId = strtolower(Yii::app()->controller->id);
		$this->actionId     = strtolower(Yii::app()->controller->action->id);
	}
	/*
	*Make direction if it not exist
	*/
	public function mkdirIfNotExist($path=array())
	{
		foreach($path as $key=>$value)
		{
			if(file_exists($value) && is_dir($value)){
			}else{
				mkdir($value,0777);	
			}
			
		}
		return true;
	}
	/*
	 *Create Script if it not exist
	 *It will input default Script
	 */
	public function createScript($path,$modules = false)
	{

		$funcName = $this->controllerId.ucfirst($this->actionId);
		$fileName = $this->controllerId.$this->lin.$this->actionId;
		
		if(!file_exists($path.$this->ds.$fileName.$this->dot.$this->suffix)){
				$content = "";
				$content .= "/*\n";
				$content .= "* Script Create By Class AutoCScript\n";
				$content .= "* Class File Name AutoCScript.php\n";
				$content .= "* Data:".date("Y/m/d H:i:s")."\n";
				if($modules){
					$content .= "* Relation Modules [".$this->moduleId."]\n";	
				}
				$content .= "* Relation Controller [".$this->controllerId."]\n";
				$content .= "* Relation Action [".$this->actionId."]\n";
				$content .= "*/\n";
				$content .= "function ".$funcName."Action(){\n";
				$content .= "}\n";
				$content .= $funcName."Action.prototype = {\n";
				$content .= "\t"."delayed : false,//false/true\n";
				$content .= "\t"."init:function(){\n";
				$content .= "\t"."\t"."var _self = this;\n";
				$content .= "\t"."}\n";
				$content .= "}\n";
				
				$fp = fopen($path.$this->ds.$fileName.$this->dot.$this->suffix,'w+');
				if($fp){
					fwrite($fp,$content,strlen($content));	
				}
				fclose($fp);
		}
	}
	
	
}
