<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $this->redirect(Yii::app()->createUrl('/admin/users/'));
		//$this->render('index');
	}
}