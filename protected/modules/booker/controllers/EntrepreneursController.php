<?php

class EntrepreneursController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';
    public $entrepreuner_name;

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','workers', 'createworker', 'prognozes', 'createevent', 'deleteprognoz',
                'reporting', 'createreport', 'deletereport', 'accounting', 'createaccount', 'deleteaccount', 'deleteworker',
                'updateaccount', 'updateworker', 'updatereport', 'updateevent'),
				'roles'=>array('0', '1'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $this->entrepreuner_name = $model->name;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Entrepreneurs']))
        {
            $model->attributes=$_POST['Entrepreneurs'];
            if($model->save())
                $this->redirect(array('/booker/entrepreneurs/update/','id'=>$model->id));
        }

        if(isset($_POST['scans'])) {
            if(count($_POST['scans'])) {
                foreach($_POST['scans'] as $file) {
                    $modelFile = new Files();
                    $modelFile->file = $file;
                    $modelFile->type = 0;
                    $modelFile->entrepreneur_id = $id;
                    $modelFile->parent = 0;
                    $modelFile->save();
                }
            }
        }

        $criteria = new CDbCriteria;
        $criteria->condition = 'entrepreneur_id=:entrepreneur_id';
        $criteria->condition = 'type=0';
        $criteria->params = array(':entrepreneur_id' => $id);

        $files = Files::model()->findAll($criteria);

        $this->render('update',array(
            'model'=>$model,
            'files' => $files
        ));
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

    public function actionWorkers($id) {
        $user_id = Yii::app()->user->id;
        $model_entrepreuner = Entrepreneurs::model()->findByPk($id);
        $this->entrepreuner_name = $model_entrepreuner->name;

        $workers = Workers::model()->findAll('parent=:parent', array(':parent' => $id));
        $modelWorkers = new Workers;
        $modelWorkers->gender = 1;
        $this->render('workers', array(
            'entrepreneur_id' => $id,
            'workers' => $workers,
            'workersModel' => $modelWorkers
        ));
    }

    public function actionCreateworker() {
        $model=new Workers;
        $this->performAjaxValidationWorker($model);
        if(isset($_POST['Workers'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes=$_POST['Workers'];
                $parent = $model->attributes['parent'];
                if($model->save()) {
                    $this->layout = null;
                    $workers = Workers::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_workers',array(
                        'workers' =>  $workers,
                        'entrepreneur_id' => $parent
                    ), false, true);
                }
            }
        }
    }


    public function actionDeleteworker($id, $entrepreneur_id) {
        if(Yii::app()->request->isAjaxRequest) {
            $model = Workers::model()->findByPk($id);
            if($model->attributes['parent'] == $entrepreneur_id) {
                if($model->delete()) {
                    $workers = Workers::model()->findAll('parent=:parent', array(':parent' => $entrepreneur_id));
                    $this->layout = null;
                    $this->renderPartial('_view_new_workers',array(
                        'workers' =>  $workers,
                        'entrepreneur_id' => $entrepreneur_id
                    ), false, true);
                }
            }
        }
    }


    public function actionUpdateworker($id) {
        $model = Workers::model()->findByPk($id);
        if($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        if(isset($_POST['Workers'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes = $_POST['Workers'];
                $parent = $model->attributes['parent'];

                if($model->save()) {
                    $workers = Workers::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->layout = null;
                    $this->renderPartial('_view_new_workers',array(
                        'workers' =>  $workers,
                        'entrepreneur_id' => $parent
                    ), false, true);
                }
            }
        }
    }



    public function actionPrognozes($id) {

        $model_entrepreuner = Entrepreneurs::model()->findByPk($id);
        $this->entrepreuner_name = $model_entrepreuner->name;



        $criteria = new CDbCriteria;
        $criteria->condition = 'parent=:parent';
        $criteria->params = array(':parent' => $id);
        $date_start = '';
        $date_end = '';
        $search = '';

        if(isset($_GET['filter'])) {
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
        }



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
                    $this->layout = null;
                    $prognozes = Prognozes::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_prognozes',array(
                        'prognozes' =>  $prognozes,
                        'entrepreneur_id' => $parent
                    ), false, true);
                }
            }
        }
    }

    public function actionUpdateevent($id) {
        $model = Prognozes::model()->findByPk($id);
        if($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        if(isset($_POST['Prognozes'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes = $_POST['Prognozes'];
                $parent = $model->attributes['parent'];

                if($model->save()) {
                    $prognozes = Prognozes::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_prognozes',array(
                        'prognozes' =>  $prognozes,
                        'entrepreneur_id' => $parent
                    ), false, true);
                }
            }
        }
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
                    ), false, true);
                }
            }
        }
    }

    public function actionReporting($id) {

        $model_entrepreuner = Entrepreneurs::model()->findByPk($id);
        $this->entrepreuner_name = $model_entrepreuner->name;

        $modelReports = new Reports();
        $criteria = new CDbCriteria;
        $criteria->condition = 'parent=:parent';
        $criteria->params = array(':parent' => $id);
        $date_start = '';
        $date_end = '';
        $search = '';

        if(isset($_GET['filter'])) {
            $filter = $_GET['filter'];
            $date_start = $_GET['date_start'];
            $date_end = $_GET['date_end'];
            $status = $_GET['Reports']['status'];

            if($filter) {
                if($date_start || $date_end) {
                    if($date_start) {
                        $date_start_time = strtotime($date_start);
                        $criteria->addCondition("date_update >= $date_start_time");
                    }

                    if($date_end) {
                        $date_end_time = strtotime($date_end);
                        $criteria->addCondition("date_update <= $date_end_time");
                    }
                }

                if($status) {
                    $status = htmlspecialchars(strip_tags(trim($status)));
                    $status = (int)$status;
                    //var_dump($status);die;
                    $criteria->addCondition("status = $status");
                    $modelReports->status = $status;
                }
            }

            $search = $_GET['search'];

            if($search) {
                $search = trim($search);
                $search = strip_tags($search);
                $search = htmlspecialchars($search);
                if(strlen($search)) {
                    $criteria->addCondition("name LIKE '%$search%'");
                }
            } else {
                $search = '';
            }
        }

        $user_id = Yii::app()->user->id;
        $reports = Reports::model()->findAll($criteria);


        $this->render('reporting', array(
            'entrepreneur_id' => $id,
            'reports' => $reports,
            'reportsModel' => $modelReports,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'search' => $search
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
                if(isset($_POST['Reports']['file'])) {
                    $model->file = $_POST['Reports']['file'];
                    $model->entrepreneur_id = $parent;
                    $model->type = 1;
                }

                if($model->save()) {
                    $response['success'] = 1;
                    $this->layout = null;
                    $reports = Reports::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_reports',array(
                        'reports' =>  $reports,
                        'entrepreneur_id' => $parent
                    ), false, true);
                }
            }
        }
    }


    public function actionDeletereport($id, $entrepreneur_id) {
        if(Yii::app()->request->isAjaxRequest) {
            $model = Reports::model()->findByPk($id);
            if($model->attributes['parent'] == $entrepreneur_id) {
                if($model->delete()) {
                    $reports = Reports::model()->findAll('parent=:parent', array(':parent' => $entrepreneur_id));
                    $this->layout = null;
                    $this->renderPartial('_view_new_reports',array(
                        'reports' =>  $reports,
                        'entrepreneur_id' => $entrepreneur_id
                    ), false, true);
                }
            }
        }
    }


    public function actionUpdatereport($id) {
        $model = Reports::model()->findByPk($id);
        if($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        if(isset($_POST['Reports'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes = $_POST['Reports'];
                $parent = $model->attributes['parent'];
                if(isset($_POST['Reports']['file'])) {
                    $model->file = $_POST['Reports']['file'];
                    $model->entrepreneur_id = $parent;
                    $model->type = 1;
                }


                if($model->save()) {
                    $reports = Reports::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->layout = null;
                    $this->renderPartial('_view_new_reports',array(
                        'reports' =>  $reports,
                        'entrepreneur_id' => $parent
                    ), false, true);
                }
            }
        }
    }


    public function actionAccounting($id) {

        $entrepreuner = Entrepreneurs::model()->findByPk($id);
        $entrepreuner_name = $entrepreuner->name;
        $this->entrepreuner_name = $entrepreuner->name;

        $modelAccounting = new Accounting();
        $criteria = new CDbCriteria;
        $criteria->condition = 'parent=:parent';
        $criteria->params = array(':parent' => $id);
        $date_start = '';
        $date_end = '';
        $search = '';

        if(isset($_GET['filter'])) {
            $filter = $_GET['filter'];
            $date_start = $_GET['date_start'];
            $date_end = $_GET['date_end'];
            $type = $_GET['Accounting']['type'];

            if($filter) {
                if($date_start || $date_end) {
                    if($date_start) {
                        $date_start_time = strtotime($date_start);
                        $criteria->addCondition("date_update >= $date_start_time");
                    }

                    if($date_end) {
                        $date_end_time = strtotime($date_end);
                        $criteria->addCondition("date_update <= $date_end_time");
                    }
                }

                if($type) {
                    $type = htmlspecialchars(strip_tags(trim($type)));
                    $type = (int)$type;
                    $criteria->addCondition("type = $type");
                    $modelAccounting->type = $type;
                }
            }

            $search = $_GET['search'];

            if($search) {
                $search = trim($search);
                $search = strip_tags($search);
                $search = htmlspecialchars($search);
                if(strlen($search)) {
                    $criteria->addCondition("name LIKE '%$search%'");
                }
            } else {
                $search = '';
            }
        }


        $user_id = Yii::app()->user->id;
        $user_name = Yii::app()->user->name;
        $accounting = Accounting::model()->findAll($criteria);
        $type = array(''=> '', '1' => 'Счет','2' => 'Счет-фактура','3' => 'Договор','4' => 'Платежное поручение','5' => 'Декларация','6' => 'Отчет','7' => 'Задача бухгалтеру','8' => 'Прочее',);

        $this->render('accounting', array(
            'entrepreneur_id' => $id,
            'accounting' => $accounting,
            'accountingModel' => $modelAccounting,
            'type' => $type,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'search' => $search,
            'user_name' => $user_name,
            'entrepreuner_name' => $entrepreuner_name
        ));
    }


    public function actionCreateAccount() {
        $type = array(''=> '', '1' => 'Счет','2' => 'Счет-фактура','3' => 'Договор','4' => 'Платежное поручение','5' => 'Декларация','6' => 'Отчет','7' => 'Задача бухгалтеру','8' => 'Прочее',);
        $response = array();
        $response['success'] = 0;
        $response['error'] = 0;
        $model = new Accounting();

        $this->performAjaxValidationAccount($model);
        if(isset($_POST['Accounting'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes = $_POST['Accounting'];
                $parent = $model->attributes['parent'];
                $model->file = $_POST['Accounting']['file'];
                $model->entrepreneur_id = $parent;
                $model->type_file = 2;

                if($model->save()) {
                    $user_name = Yii::app()->user->name;
                    $entrepreuner = Entrepreneurs::model()->findByPk($parent);
                    $entrepreuner_name = $entrepreuner->name;
                    $response['success'] = 1;
                    $this->layout = null;
                    $accounts = Accounting::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_accounts',array(
                        'accounting' =>  $accounts,
                        'entrepreneur_id' => $parent,
                        'type' => $type,
                        'user_name' => $user_name,
                        'entrepreuner_name' => $entrepreuner_name
                    ), false, true);
                }
            }
        }
    }

    public function actionDeleteaccount($id, $entrepreneur_id) {
        $type = array(''=> '', '1' => 'Счет','2' => 'Счет-фактура','3' => 'Договор','4' => 'Платежное поручение','5' => 'Декларация','6' => 'Отчет','7' => 'Задача бухгалтеру','8' => 'Прочее',);
        if(Yii::app()->request->isAjaxRequest) {
            $model = Accounting::model()->findByPk($id);
            if($model->attributes['parent'] == $entrepreneur_id) {
                if($model->delete()) {
                    $user_name = Yii::app()->user->name;
                    $entrepreuner = Entrepreneurs::model()->findByPk($entrepreneur_id);
                    $entrepreuner_name = $entrepreuner->name;
                    $accounts = Accounting::model()->findAll('parent=:parent', array(':parent' => $entrepreneur_id));
                    $this->layout = null;
                    $this->renderPartial('_view_new_accounts',array(
                        'accounting' =>  $accounts,
                        'entrepreneur_id' => $entrepreneur_id,
                        'type' => $type,
                        'user_name' => $user_name,
                        'entrepreuner_name' => $entrepreuner_name
                    ), false, true);
                }
            }
        }
    }


    public function actionUpdateaccount($id) {
        $model = Accounting::model()->findByPk($id);
        if($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        $type = array(''=> '', '1' => 'Счет','2' => 'Счет-фактура','3' => 'Договор','4' => 'Платежное поручение','5' => 'Декларация','6' => 'Отчет','7' => 'Задача бухгалтеру','8' => 'Прочее',);
        if(isset($_POST['Accounting'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->attributes = $_POST['Accounting'];
                $parent = $model->attributes['parent'];
                if(isset($_POST['Accounting']['file'])) {
                    $model->file = $_POST['Accounting']['file'];
                    $model->entrepreneur_id = $parent;
                    $model->type_file = 2;
                }


                if($model->save()) {
                    $user_name = Yii::app()->user->name;
                    $entrepreuner = Entrepreneurs::model()->findByPk($parent);
                    $entrepreuner_name = $entrepreuner->name;
                    $response['success'] = 1;
                    $this->layout = null;
                    $accounts = Accounting::model()->findAll('parent=:parent', array(':parent' => $parent));
                    $this->renderPartial('_view_new_accounts',array(
                        'accounting' =>  $accounts,
                        'entrepreneur_id' => $parent,
                        'type' => $type,
                        'user_name' => $user_name,
                        'entrepreuner_name' => $entrepreuner_name
                    ), false, true);
                }
            }
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

    protected function performAjaxValidationAccount($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='account-form-create'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}
