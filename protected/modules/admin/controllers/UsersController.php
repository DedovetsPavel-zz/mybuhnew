<?php

class UsersController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view', 'create', 'update', 'delete', 'password'),
				'roles'=>array('0'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

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


    public function actionPassword($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'password';
        $model->password = $_POST['password'];
        if($model->save()) {
            $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('password',array(
            'model'=>$this->loadModel($id),
        ));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($role)
	{
		$model = new Users('create');
        $model->role = $role;
        if($role == 2) {
            $model->scenario = 'entrepreneur';
        }
        $model->blocked = 0;
        $bookersModel = Users::model()->findAll('parent=:parent AND role=1', array(':parent' => 0));
        $bookersArray = array();
        if(count($bookersModel)) {
            foreach($bookersModel as $booker) {
                $bookersArray[$booker->attributes['id']] = $booker->attributes['name'];
            }
        }

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'role' => $role,
            'bookers' => $bookersArray
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $model->password = '';

        //$model->scenario = 'update';
        //var_dump($model);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        $bookersModel = Users::model()->findAll('parent=:parent AND role=1', array(':parent' => 0));
        $bookersArray = array();
        if(count($bookersModel)) {
            foreach($bookersModel as $booker) {
                $bookersArray[$booker->attributes['id']] = $booker->attributes['name'];
            }
        }

        if($model->role == 2) {
            $model->scenario = 'entrepreneur_update';
        }

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

        if($role == 2) {
            $model->scenario = 'entrepreneur';
        }

		$this->render('update',array(
			'model'=>$model,
            'role' => $model->role,
            'bookers' => $bookersArray
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('index',array(
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
}
