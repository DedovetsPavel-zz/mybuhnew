<?php
/* @var $this EntrepreneursController */
/* @var $model Entrepreneurs */

$this->breadcrumbs=array(
	'Entrepreneurs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List Entrepreneurs', 'url'=>array('index')),
//	array('label'=>'Create Entrepreneurs', 'url'=>array('create')),
//	array('label'=>'View Entrepreneurs', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Entrepreneurs', 'url'=>array('admin')),
//);
?>

<h1>Update Entrepreneurs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>