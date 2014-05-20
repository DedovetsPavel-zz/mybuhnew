<?php
/* @var $this UsersController */
/* @var $model Users */

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index'))
);


if($role == 1) {
$this->renderPartial('_form_create_booker', array('model'=>$model));
} elseif($role == 2) {
    $this->renderPartial('_form_create_entrepreneur', array('model'=>$model, 'bookers' => $bookers));

}

?>