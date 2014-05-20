<?php
/* @var $this UsersController */
/* @var $model Users */

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
    array('label'=>'Создать бухгалтера', 'url'=>array('create', 'role' => '1')),
    array('label'=>'Создать предприниметаля', 'url'=>array('create', 'role' => '2')),
    array('label'=>'Изменить пароль', 'url'=>array('password', 'id' => $model->id)),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id))
);

if($role == 1) {
    $this->renderPartial('_form_booker', array('model'=>$model));
} elseif($role == 2) {
    $this->renderPartial('_form_entrepreneur', array('model'=>$model, 'bookers' => $bookers));
}


