<?php

class SettingController extends InsideController
{


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'create', 'update', 'delete'),
				'roles'=>array('admin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'create', 'update'),
				'roles'=>array('moderator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Setting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->field));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{

 		$data = Yii::app()->getRequest()->getPost('Setting', null);

		if (!empty($data)) {

			$success = true;

			foreach($data as $field => $value){
				$model = Setting::model()->findByAttributes(array('field'=>$field));
				$model->value = $value;
				$success &= $model->update();
			}

			if($success){
				Yii::app()->user->setFlash('Setting_FLASH', 'Збережено');
				$this->redirect(array('index'));
			}
		}

		$this->redirect(array('index'));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->field));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$setting = Setting::model()->findAll();

		$this->render('index', array('setting'=>$setting));
	}

}
