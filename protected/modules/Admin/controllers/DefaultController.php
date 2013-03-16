<?php

class DefaultController extends CMyController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionLogin()
	{
		
	}
	public function actionTry()
	{
		$this->render('try');
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