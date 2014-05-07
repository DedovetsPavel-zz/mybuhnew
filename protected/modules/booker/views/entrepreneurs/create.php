<?php
/* @var $this EntrepreneursController */
/* @var $model Entrepreneurs */

$this->breadcrumbs=array(
	'Entrepreneurs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Entrepreneurs', 'url'=>array('index')),
	array('label'=>'Manage Entrepreneurs', 'url'=>array('admin')),
);
?>

<h1>Create Entrepreneurs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>