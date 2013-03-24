<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public $_ecore;
	public $_ehtml;
	
	public $uid;
	
	public function filters(){
		return array('checkUser');
	}
	
	public function filterCheckUser($filterChain)
	{
		$controller = $this->id;
        $action = $this->action->id;
		
		$hostInfo = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? 'https://' . $_SERVER['HTTP_X_FORWARDED_HOST'] : Yii::app()->getRequest()->getHostInfo();
        $uri = Yii::app()->getRequest()->getRequestUri();
        
        $uri = urldecode($uri);
		
        if(in_array($controller,array('site')) && in_array($action,array('login','error','captcha'))){
        	$filterChain->run();
            return true;
        }
		if(!Yii::app()->user->isGuest && isset(Yii::app()->user->uid)){
			$user = Users::model()->find('uid = :uid', array(':uid'=>Yii::app()->user->uid));
			if($user === null){
				 if(Yii::app()->request->isAjaxRequest){
					  echo CJSON::encode(array('loginStatus'=>'false'));
				  	  Yii::app()->end();
				  }else{
					  	Yii::app()->user->setFlash('message',"loginRequired");
						Yii::app()->user->loginRequired();  
				  }
			}else{
				$this->uid = Yii::app()->user->uid;
			}
		}
		$filterChain->run();
	}
	
	public function beforeAction($action)
	{
		$autoCScript = AutoCScript::getInstance();
		$autoCScript->init();	
		$controller = $this->id;
        $action = $this->action->id;
		if(!Yii::app()->user->isGuest && isset(Yii::app()->user->uid)){
			$user = Users::model()->find('uid = :uid', array(':uid'=>Yii::app()->user->uid));
			if($user === null){
				 if(Yii::app()->request->isAjaxRequest){
					  echo CJSON::encode(array('loginStatus'=>'false'));
				  	  Yii::app()->end();
				  }else{
					  	Yii::app()->user->setFlash('message',"error");
						Yii::app()->user->loginRequired();  
				  }
			}else{
				$this->uid = Yii::app()->user->uid;
			}
		}else{
			  if(in_array($controller,array('site')) && in_array($action,array('login','error','captcha'))){
			  }else{
				  if(Yii::app()->request->isAjaxRequest){
					  echo CJSON::encode(array('loginStatus'=>'false'));
				  	  Yii::app()->end();
				  }else{
					  	Yii::app()->user->setFlash('message',"loginRequired");
						Yii::app()->user->loginRequired();  
				  }
			  }
		}
		return true;
	}
	
	protected function beforeRender($view){
		$cs = Yii::app()->clientScript;
		$this->_ecore=Ecore::__getEcore();
		$cs->coreScriptPosition = CClientScript::POS_HEAD;
		$clientScripts = array(
						'js'=>array(
							array('honest', '')
						)
					);
		$this->_ehtml = $this->_ecore->initClientScript(YII_DEBUG, $clientScripts, true);
		return true;
	}

}