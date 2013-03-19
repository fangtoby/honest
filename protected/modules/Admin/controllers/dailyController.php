<?php

class dailyController extends CMyController
{
	public function actionIndex()
	{
		$this->render('index');	
	}	
	public function actionView()
	{
		$this->render('view');	
	}	
	public function actionCreate()
	{
		$this->render('create');	
	}	
	public function actionUpdate()
	{
		$this->render('update');	
	}	
	public function actionManagement()
	{
		$this->render('management');	
	}	
}