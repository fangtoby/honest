<?php
/*
*Basic On Yii Framework
*@Author Honest_lies
*@Modules Single
*@Date	2013-03-19  8:44
*
*/
class AutoCScript{//Auto Create Script Or Css File 	
	
	private static $_instance;
	private $scriptPath;
	private $ds = '/';
	private $dot = '.';
	private $lin = '-';
	private $suffix = 'js';
	private $modulesField = 'modules';
	private $moduleId='';
	private $controllerId;
	private $actionId;
	
	
	private function __construct(){
	}
	
	public function __clone(){
		trigger_error('Clone is not allow!',E_USER_ERROR);	
	}
	
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self;
		}	
		return self::$_instance;
	}
	
	public function init($enviroment=true)
	{
		if($enviroment === true){
			$this->setScriptPath();
			$this->setAllNeedId();
			$this->mkdirIfNotExist($this->scriptPath);
			if($this->moduleId != null){
				$modulesPath = $this->scriptPath.$this->modulesField;
				$modulesItem = $this->scriptPath.$this->modulesField.$this->ds.$this->moduleId;
				$modulesControllerPath = $this->scriptPath.$this->modulesField.$this->ds.$this->moduleId.$this->ds.$this->controllerId;
				$this->mkdirIfNotExist($modulesPath);
				$this->mkdirIfNotExist($modulesItem);
				$this->mkdirIfNotExist($modulesControllerPath);
				$this->createScript($modulesControllerPath,true);
			}else{
				$controllerPath = $this->scriptPath.$this->controllerId;
				$this->mkdirIfNotExist($controllerPath);
				$this->createScript($controllerPath);
			}
		}
	}
	
	public function mkdirIfNotExist($path)
	{
		if(file_exists($path) && is_dir($path)){
		}else{
			mkdir($path,0777);	
		}
		return true;
	}
	
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
	
}
