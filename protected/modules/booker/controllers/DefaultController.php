<?php

class DefaultController extends Controller
{
	public function actionIndex() {

        $users = Users::model()->findAll('parent=:parent', array(':parent'=>4));
        foreach($users as $user) {
            var_dump($user->user_data);
        }


//        $this->render('index',array(
//            'model'=>$model,
//        ));


		$this->render('index');
	}
}