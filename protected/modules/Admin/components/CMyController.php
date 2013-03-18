<?php
class CMyController extends CController
{
	public $layout='/layouts/column1';
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
	
	public $userID;
	
	protected function beforeRender($view){
		$cs = Yii::app()->clientScript;
		if(Yii::app()->controller->module->id){
			switch (Yii::app()->controller->module->id) {
				case 'admin' :
        			$this->_ecore=Ecore::__getEcore();
					$cs->coreScriptPosition = CClientScript::POS_HEAD;
					$clientScripts = array(
						'js'=>array(
							array('', '')
						)
					);
					$this->_ehtml = $this->_ecore->initClientScript(YII_DEBUG, $clientScripts, true);
				break;	
				default:
				    $cs->registerCoreScript('jquery');
				break;
			}
			
		}
		return true;
	}
	
	/*
	public function filters(){
		return array('checkUser');
	}
	
  	public function filterCheckUser($filterChain) {
		$session = Yii::app()->session;
        $session->open();
		$controller = $this->id;
        $action = $this->action->id;
		
		if(isset($_GET['userID']) && $_GET['userID'] == 123){
			$session['userID'] = $_GET['userID'];
		}else{
			if(isset($session['userID']) && $session['userID'] == 123){
			}else{
				if(in_array($controller,array('default','try')) && in_array($action,array('index','try'))){
				}else{
					Yii::app()->adminuser->loginRequired();
				}
				 
			}
		}
		$filterChain->run();
	}
	*/
	public function beforeAction($action)
	{
		$controller = $this->id;
        $action = $this->action->id;
		
		$autoCScript = AutoCScript::getInstance();
		$autoCScript->init();
	
		if(!Yii::app()->adminuser->isGuest){
			$userInfo = Yii::app()->adminuser->userInfo;
			$this->userID = $userInfo['id'];
		}else{
			  if(in_array($controller,array('default')) && in_array($action,array('index','login','try'))){
			  }else{
				  echo CJSON::encode(array('loginStatus'=>'false'));
				  Yii::app()->end();
			  }
		}
		return true;
	}
	/*
	public function beforeAction($action) 
    {
		if(isset(Yii::app()->user->logoutRequired) && Yii::app()->user->logoutRequired){
            Yii::app()->user->logout();
            Yii::app()->user->setState('logoutRequired',false);
            Yii::app()->user->loginRequired();
            return false;
        }
        //用户未登录进入该网站 就需要登录
        $controller = $this->id;
        $action = $this->action->id;
        if(!in_array($controller, array('site')) && !in_array($action, array('login','logout')))//,'index')))
        {
            if(Yii::app()->adminuser->isGuest)
            {
                if(Yii::app()->request->isAjaxRequest)
                {
                    echo "登录超时，请重新登录！";
                    return false;
                }
                else
                {	
					Yii::app()->adminuser->setFlash('message',"loginRequired"); 
                    Yii::app()->adminuser->loginRequired();
                    return false;
                }
            }
        }
        return true;
    }
	*/
}