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
	
	public function beforeAction($action)
	{
		
		$autoCScript = AutoCScript::getInstance();
		$autoCScript->init();	
		
		return true;
	}
	/*
	 * Load CSS & Javascript file
	 * Date: Thursday, 27.12.2012  9:09
	 * Author: fang.yanliang
	 * Pop: To add relation script or stylesheet whith this action\controller\modules
	 * 
	*/
	
	/*
	
	public $userId;
	public $_ecore;
	
	public $_ehtml;
	
	protected function beforeRender($view){
		$cs = Yii::app()->clientScript;
		if(!Yii::app()->controller->module->id){
			$this->_ecore=Ecore::__getEcore();
			$cs->coreScriptPosition = CClientScript::POS_HEAD;
			$clientScripts = array(
				'js'=>array(
					array('data', 'lottery')
				)
			);
			$this->_ehtml = $this->_ecore->initClientScript(YII_TEST, $clientScripts, true);
		}
		return true;
	}
	
	public function filters(){
		return array('checkUser');
	}
	
  	public function filterCheckUser($filterChain) {
		if(!PointLog::initPointLogTable()){
			//Point Log create error
		}
        $session = Yii::app()->session;
        $session->open();
        $hostInfo = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? 'https://' . $_SERVER['HTTP_X_FORWARDED_HOST'] : Yii::app()->getRequest()->getHostInfo();
        $uri = Yii::app()->getRequest()->getRequestUri();
        
        $uri = urldecode($uri);
        //直接通过
        if($this->id == "site" && in_array($this->action->id, array('notify', 'error','index', 'saveToken'))){
        	$filterChain->run();
            return true;
        }
        $hasNecessaryParam = true;
		if(isset($_GET['fbId']) && isset($_GET['deviceId'])){
        	$user = User::model()->find('fbId=:fbId', array(':fbId'=>$_GET['fbId']));
        	if( $user === null 
        	   || (!isset($session['fbId']) || !isset($session['deviceId'])) 
        	   || strtotime($user->lastLoginTime)<strtotime(Util::getDayTime(time())) || ($_GET['fbId'] != $session['fbId'])){
        		$member = User::userAccess($_GET['fbId'], $_GET['deviceId']);
            	$session['fbId'] = $member[0]->fbId;
            	$session['deviceId'] = $member[1]->deviceId;
          	}
        }
    	if (!$hasNecessaryParam || !isset($session['fbId']) || !isset($session['deviceId'])) {
            if (preg_match("/redirect_url/", $uri)) {
                $this->redirect($this->createUrl('error/index', array('refresh' => 1)));
            }
            else {
                $this->redirect($this->createUrl('error/index', array('refresh' => 1, 'redirect_url' => urlencode($hostInfo . Yii::app()->getRequest()->getUrl()))));
            }
            return false;
        }
        else {
            $this->userId = $session['userId'];
            if (isset($_GET['redirect_url'])) {
                $this->redirect(urldecode($_GET['redirect_url']));
                return false;
            }
        }
        $filterChain->run();
    }
	*/
}