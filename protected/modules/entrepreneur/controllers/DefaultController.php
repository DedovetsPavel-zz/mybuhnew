<?php

class DefaultController extends Controller
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
                'actions'=>array('view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','create','update','workers', 'createworker', 'prognozes', 'createevent', 'deleteprognoz',
                    'reporting', 'createreport', 'deletereport', 'accounting', 'createaccount', 'deleteaccount', 'entrepreuner', 'updateaccount', 'confirmreport'),
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



	public function actionIndex() {
        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];

        $entrepreuner_user = Users::model()->findByPk($user_id);
        $entrepreuner_booker = Users::model()->findByPk($entrepreuner_user->parent);
        $entrepreuner_booker_name = $entrepreuner_booker->name;

        $modelAccounting = new Accounting();
        $criteria = new CDbCriteria;
        $criteria->condition = 'parent=:parent';
        $criteria->params = array(':parent' => $entrepreuner_id);
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

        $type = array(''=> '', '1' => 'Счет','2' => 'Счет-фактура','3' => 'Договор','4' => 'Платежное поручение','5' => 'Декларация','6' => 'Отчет','7' => 'Задача бухгалтеру','8' => 'Прочее',);

        $accounting = Accounting::model()->findAll($criteria);
        $this->render('index',array(
            'accounting'=>$accounting,
            'accountingModel' => $modelAccounting,
            'type' => $type,
            'entrepreneur_id' => $entrepreuner_id,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'search' => $search,
            'user_name' => $entrepreuner_booker_name,
            'entrepreuner_name' => $entrepreuner->name
        ));
	}


    public function actionCreateAccount() {
        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];

        $entrepreuner_user = Users::model()->findByPk($user_id);
        $entrepreuner_booker = Users::model()->findByPk($entrepreuner_user->parent);
        $entrepreuner_booker_name = $entrepreuner_booker->name;

        $response = array();
        $response['success'] = 0;
        $response['error'] = 0;
        $model = new Accounting();
        $this->performAjaxValidationAccount($model);

        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];
        $type = array(''=> '', '1' => 'Счет','2' => 'Счет-фактура','3' => 'Договор','4' => 'Платежное поручение','5' => 'Декларация','6' => 'Отчет','7' => 'Задача бухгалтеру','8' => 'Прочее',);

        if(isset($_POST['Accounting'])) {
            if(Yii::app()->request->isAjaxRequest) {
                $model->parent = $entrepreuner_id;
                $model->attributes = $_POST['Accounting'];
                $model->file = $_POST['Accounting']['file'];
                $model->entrepreneur_id = $entrepreuner_id;
                $model->type_file = 2;

                if($model->save()) {
                    $response['success'] = 1;
                    $this->layout = null;
                    $accounts = Accounting::model()->findAll('parent=:parent', array(':parent' => $entrepreuner_id));
                    $this->renderPartial('_view_new_accounts',array(
                        'accounting' =>  $accounts,
                        'entrepreneur_id' => $entrepreuner_id,
                        'type' => $type,
                        'user_name' => $entrepreuner_booker_name,
                        'entrepreuner_name' => $entrepreuner->name
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

    public function actionUpdateaccount($id) {
        $model = Accounting::model()->findByPk($id);
        if($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];
        $entrepreuner_user = Users::model()->findByPk($user_id);
        $entrepreuner_booker = Users::model()->findByPk($entrepreuner_user->parent);
        $entrepreuner_booker_name = $entrepreuner_booker->name;
        $type = array(''=> '', '1' => 'Счет','2' => 'Счет-фактура','3' => 'Договор','4' => 'Платежное поручение','5' => 'Декларация','6' => 'Отчет','7' => 'Задача бухгалтеру','8' => 'Прочее',);
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
                        'user_name' => $entrepreuner_booker_name,
                        'entrepreuner_name' => $entrepreuner->name
                    ), false, true);
                }
            }
        }
    }





    protected function performAjaxValidationAccount($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='account-form-create'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


    public function actionReporting() {

        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];


        $modelReports = new Reports();
        $criteria = new CDbCriteria;
        $criteria->condition = 'parent=:parent';
        $criteria->params = array(':parent' => $entrepreuner_id);
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

        $user_id = Yii::app()->user->id;
        $reports = Reports::model()->findAll($criteria);


        $this->render('reporting', array(
            'entrepreneur_id' => $entrepreuner_id,
            'reports' => $reports,
            'reportsModel' => $modelReports,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'search' => $search
        ));
    }

    public function actionConfirmreport($id,$entrepreneur_id,$confirm) {
        if($confirm) {
            $report = Reports::model()->findByPk($id);

            $report->status = 1;
            if($report->save()) {
                $reports = Reports::model()->findAll('parent=:parent', array(':parent' => $entrepreneur_id));
                $this->renderPartial('_view_new_reporting', array(
                    'entrepreneur_id' => $entrepreneur_id,
                    'reports' => $reports,
                ), false, true);
            }
        }
    }


    public function actionPrognozes() {

        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];

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

        $criteria->params = array(':parent' => $entrepreuner_id);

        $user_id = Yii::app()->user->id;
        $prognozes = Prognozes::model()->findAll($criteria);
        $modelPrognozes = new Prognozes();
        $this->render('prognozes', array(
            'entrepreneur_id' => $entrepreuner_id,
            'prognozes' => $prognozes,
            'prognozesModel' => $modelPrognozes,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'search' => $search
        ));
    }


    public function actionEntrepreuner() {
        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];
        //$entrepreuner->;
        $this->render('entrepreuner', array(
            'model' => $entrepreuner,
            'labels' => $entrepreuner->attributeLabels()
        ));
        //echo $entrepreuner_id;
    }

    public function actionWorkers() {
        $user_id = Yii::app()->user->id;
        $entrepreuner = Entrepreneurs::model()->findByAttributes(array('user_id' => $user_id));
        $entrepreuner_id = $entrepreuner->attributes['id'];
        $workers = Workers::model()->findAll('parent=:parent', array(':parent' => $entrepreuner_id));
        $this->render('workers', array(
            'entrepreneur_id' => $entrepreuner_id,
            'workers' => $workers
        ));
    }



}