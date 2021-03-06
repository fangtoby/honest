<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->validate('create'))
				$model->encryption();
				if($model->save()){
					Yii::app()->session['nid'] = $model->uid;
					$this->redirect(array('uploadimg'));
				}
		}
		$model->initClear();
		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionUploadimg()
	{
		$model = $this->loadModel(Yii::app()->session['nid']);
		$session = Yii::app()->session;
		
		if(isset($_FILES['userimage'])){
			$model->scenario='upimage';
			$model->setFile($_FILES['userimage']);
			if($model->validate('upimage')){
			}else{
			}
			$session['user'] = $model;
			$this->render('confirm',array(
				'model'=>$model
			));
			Yii::app()->end();
		}
		$this->render('uploadimage',array(
			'model'=>$model,
		));
	}
	public function actionConfirm()
	{
		$session = Yii::app()->session;
		$model = $session['user'];
		$model->scenario='saveimage';
		
		if($model->validate() && $model->save()){
			$session->remove('user');
			$this->redirect(array('admin'));
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario = 'update';
		
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->validate('update')){
				$model->encryption();
				if($model->save()){
					$this->redirect(array('view','id'=>$model->uid));
				}
			}
		}
		$model->initClear();
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGetData()
	{
		$user = Users::model()->findAll("loginfrequency > 0 order by loginfrequency desc");
		$addActive = 1;
		$itemCount = count($user);
		$dataString = '<chart caption="User Login Frequency Information" palette="4" decimals="0" enableSmartLabels="1" enableRotation="0" bgColor="FFFFFF,FFFFFF" bgAlpha="40,100" bgRatio="0,100" bgAngle="360" showBorder="" startingAngle="50">';
		foreach($user as $key=>$value){
			if($value->loginfrequency > 0){
				$dataString.= '<set label="'.$value->username.'" value="'.$value->loginfrequency.'"';
				if($addActive == $itemCount || $addActive == 1){
					$dataString.='isSliced="1"';
				}
				$dataString.= '/>';
				$addActive++;
			}
		}
		$dataString.='</chart>';	
		echo $dataString;
	}
}
