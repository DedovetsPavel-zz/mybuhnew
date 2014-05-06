<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index'))
);
?>

<h1>Создать пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>