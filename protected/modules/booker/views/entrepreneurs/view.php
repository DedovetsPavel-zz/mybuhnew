<?php
/* @var $this EntrepreneursController */
/* @var $model Entrepreneurs */

$this->breadcrumbs=array(
	'Entrepreneurs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Entrepreneurs', 'url'=>array('index')),
	array('label'=>'Create Entrepreneurs', 'url'=>array('create')),
	array('label'=>'Update Entrepreneurs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Entrepreneurs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entrepreneurs', 'url'=>array('admin')),
);
?>

<h1>View Entrepreneurs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'name',
		'organization_name',
		'short_name_organization',
		'inn',
		'kpp',
		'ogrn',
		'registration_date',
		'organization_address',
		'okved',
		'okato',
		'okpo',
		'okfs',
		'oktmo',
		'okogu',
		'okopf',
		'ifns',
		'prf',
		'registration_number_in_prf',
		'fss',
		'registration_number_in_fss',
		'code_subordination',
		'insurance_tariv_fss',
		'date_avance',
		'date_pay',
	),
)); ?>
