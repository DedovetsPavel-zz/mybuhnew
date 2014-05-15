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
				'actions'=>array('create','update','workers', 'createworker', 'prognozes', 'createevent', 'deleteprognoz',
                'reporting', 'createreport'),
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
        $this->performAjaxValidationWorker($model);
        if(isset($_POST['Workers'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes=$_POST['Workers'];
                if($model->save()) {
                    return 'Работник добавлен';
                }
            }
        }
    }

    public function actionPrognozes($id) {

        $criteria = new CDbCriteria;
        $criteria->condition = 'parent=:parent';

        $filter = $_GET['filter'];
        $date_start = $_GET['date_start'];
        $date_end = $_GET['date_end'];

        if($filter) {
            if($date_start || $date_end) {
                if($date_start) {
                    $date_start_time = strtotime($date_start);
                    $criteria->addCondition("deadline >= $date_start_time");
                }

                if($date_end) {
                    $date_end_time = strtotime($date_end);
                    $criteria->addCondition("deadline <= $date_end_time");
                }
            }
        }

        $search = $_GET['search'];

        if($search) {
            $search = trim($search);
            $search = strip_tags($search);
            $search = htmlspecialchars($search);
            if(strlen($search)) {
                $criteria->addCondition("event LIKE '%$search%'");
            }
        } else {
            $search = '';
        }

        $criteria->params = array(':parent' => $id);


        $user_id = Yii::app()->user->id;
        $prognozes = Prognozes::model()->findAll($criteria);
        $modelPrognozes = new Prognozes();
        $this->render('prognozes', array(
            'entrepreneur_id' => $id,
            'prognozes' => $prognozes,
            'prognozesModel' => $modelPrognozes,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'search' => $search
        ));
    }

    public function actionCreateevent() {
        $response = array();
        $response['success'] = 0;
        $response['error'] = 0;
        $model = new Prognozes();
        $this->performAjaxValidationEvent($model);
        if(isset($_POST['Prognozes'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes = $_POST['Prognozes'];
                $parent = $model->attributes['parent'];

                if($model->save()) {
                    $response['success'] = 1;
                    $this->layout = null;
                    $prognozes = Prognozes::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_prognozes',array(
                        'prognozes' =>  $prognozes,
                        'entrepreneur_id' => $parent
                    ));

                } else {
                    $response['error'] = 1;
                }
            } else {
                $response['error'] = 1;
            }
        } else {
            $response['error'] = 1;
        }

        //echo json_encode($response);
    }

    public function actionDeleteprognoz($id, $entrepreneur_id) {
        if(Yii::app()->request->isAjaxRequest) {
            $model = Prognozes::model()->findByPk($id);
            if($model->attributes['parent'] == $entrepreneur_id) {
                if($model->delete()) {
                    $prognozes = Prognozes::model()->findAll('parent=:parent', array(':parent' => $entrepreneur_id));
                    $this->layout = null;
                    $this->renderPartial('_view_new_prognozes',array(
                        'prognozes' =>  $prognozes,
                        'entrepreneur_id' => $entrepreneur_id
                    ));
                }
            }
        }
    }

    public function actionReporting($id) {
        $user_id = Yii::app()->user->id;
        $reports = Reports::model()->findAll('parent=:parent', array(':parent' => $id));
        $modelReports = new Reports();

        $this->render('reporting', array(
            'entrepreneur_id' => $id,
            'reports' => $reports,
            'reportsModel' => $modelReports
        ));
    }

    public function actionCreatereport() {
        $response = array();
        $response['success'] = 0;
        $response['error'] = 0;
        $model = new Reports();
        $this->performAjaxValidationReport($model);
        if(isset($_POST['Reports'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes = $_POST['Reports'];
                $parent = $model->attributes['parent'];

                if($model->save()) {
                    $response['success'] = 1;
                    $this->layout = null;
                    $reports = Reports::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_reports',array(
                        'reports' =>  $reports,
                        'entrepreneur_id' => $parent
                    ));

                } else {
                    $response['error'] = 1;
                }
            } else {
                $response['error'] = 1;
            }
        } else {
            $response['error'] = 1;
        }

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

    protected function performAjaxValidationEvent($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='events-form-create'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function performAjaxValidationReport($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='report-form-create'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}
