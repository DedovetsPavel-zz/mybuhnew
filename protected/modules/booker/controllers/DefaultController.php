<?php

class DefaultController extends Controller
{
	public function actionIndex() {
        $user_id = Yii::app()->user->id;
        $users = Users::model()->findAll('parent=:parent', array(':parent' => $user_id));
//        foreach($users as $user) {
//            var_dump($user->user_data);
//        }


        $this->render('index',array(
            'model'=>$users,
        ));


		//$this->render('index');
	}
}