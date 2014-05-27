<?php

class DefaultController extends Controller {

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }


    public function accessRules() {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index'),
                'roles'=>array('0', '1'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }



	public function actionIndex() {
        $user_id = Yii::app()->user->id;
        $users = Users::model()->findAll('parent=:parent', array(':parent' => $user_id));
        $this->render('index',array(
            'model'=>$users,
        ));
	}
}