<?php

class EntrepreneursController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','workers', 'createworker'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Entrepreneurs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entrepreneurs']))
		{
			$model->attributes=$_POST['Entrepreneurs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entrepreneurs']))
		{
			$model->attributes=$_POST['Entrepreneurs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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
		$dataProvider=new CActiveDataProvider('Entrepreneurs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Entrepreneurs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Entrepreneurs']))
			$model->attributes=$_GET['Entrepreneurs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


    public function actionWorkers($id) {
        $user_id = Yii::app()->user->id;
        $workers = Workers::model()->findAll('parent=:parent', array(':parent' => $id));
        $modelWorkers = new Workers;
        $modelWorkers->gender = 1;


        $this->render('workers', array(
            'entrepreneur_id' => $id,
            'workers' => $workers,
            'workersModel' => $modelWorkers
        ));
    }

    public function actionCreateworker()
    {
        $model=new Workers;
        //var_dump($_POST['Workers']);die;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidationWorker($model);


        if(isset($_POST['Workers']))
        {


            //die('тут');
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes=$_POST['Workers'];
                if($model->save()) {
                    return 'Работник добавлен';
                }
            } else {
                die('2');
            }


        }

//        $this->render('create',array(
//            'model'=>$model,
//        ));
    }



	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Entrepreneurs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Entrepreneurs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Entrepreneurs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='entrepreneurs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    protected function performAjaxValidationWorker($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='workers-form-create'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
