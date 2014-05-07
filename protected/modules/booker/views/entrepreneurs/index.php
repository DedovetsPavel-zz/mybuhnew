<?php
/* @var $this EntrepreneursController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entrepreneurs',
);

$this->menu=array(
	array('label'=>'Create Entrepreneurs', 'url'=>array('create')),
	array('label'=>'Manage Entrepreneurs', 'url'=>array('admin')),
);
?>

<h1>Entrepreneurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
