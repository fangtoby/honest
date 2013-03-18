<?php

class DefaultController extends CMyController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionLogin()
	{
		$userArray = array('id'=>'930973365','name'=>'Honest_lies');
		$userIdentity = UserIdentity::createAuthenticatedIdentity($userArray);
		Yii::app()->adminuser->login($userIdentity,60*20);
		$this->render('login');
	}
	public function actionLogout()
	{
		Yii::app()->adminuser->logout();
		Yii::app()->adminuser->loginRequired();
	}
	
	public function actionTry()
	{
		
		
		$this->render('try');
	}
	
	public function actionDbinfo()
	{
		$this->render('dbinfo');	
	}
	
	public function actionForajax()
	{
		if(Yii::app()->request->isAjaxRequest && isset($_GET['json'])){
			$param = $_GET['json'];
			$param['author']='honest_lies';
			$param['nowTime'] = date("Y-m-d h:m:s",time());
			if($param['times'] != 0){
				$param['times']= $param['times']+1;
			}else{
				$param['times'] = 1;
			}
			if(IS_AJAX){
				$param['requestWays']= 'It Ajax!';
			}
			if(is_object($param)){
				echo CJSON::encode(array('note'=>'is object in php!'));
			}
			if(is_array($param)){
				$param['note']='is array in php!';
				echo CJSON::encode($param);
				Yii::app()->end();				
			}
		}else{
			Yii::app()->adminuser->loginRequired();
		}
	}
	
	
}