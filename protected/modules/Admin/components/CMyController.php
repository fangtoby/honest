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
	
	/*
	
	public $_ecore;
	
	public $_ehtml;
	
	protected function beforeRender($view){
		$cs = Yii::app()->clientScript;
		if(Yii::app()->controller->module->id){
			switch (Yii::app()->controller->module->id) {
				case 'admin' :
        			$this->_ecore=Ecore::__getEcore();
					$cs->coreScriptPosition = CClientScript::POS_HEAD;
					$clientScripts = array(
						'js'=>array(
							array('module-data', 'module-lottery')
						)
					);
					$this->_ehtml = $this->_ecore->initClientScript(YII_TEST, $clientScripts, true);
				break;	
				default:
				    $cs->registerCoreScript('jquery');
				break;
			}
			
		}
		return true;
	}
	
	
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