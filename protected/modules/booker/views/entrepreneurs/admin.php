<?php
/* @var $this EntrepreneursController */
/* @var $model Entrepreneurs */

$this->breadcrumbs=array(
	'Entrepreneurs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Entrepreneurs', 'url'=>array('index')),
	array('label'=>'Create Entrepreneurs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#entrepreneurs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Entrepreneurs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrepreneurs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'name',
		'organization_name',
		'short_name_organization',
		'inn',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
