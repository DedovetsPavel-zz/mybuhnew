<?php

class DefaultController extends Controller
{
	public function actionIndex() {
        $user_id = Yii::app()->user->id;
        $users = Users::model()->findAll('parent=:parent', array(':parent' => $user_id));
        $this->render('index',array(
            'model'=>$users,
        ));
	}
}