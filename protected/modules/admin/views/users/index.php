<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создать пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'email',
        array(
            'name' => 'createdon',
            'value' => 'date("m.d.Y H:i:s", $data->createdon)'
        ),
        array(
            'name' => 'blocked',
            'value' => '($data->blocked == "1")? "Да" : "Нет"'
        ),
        array(
            'name' => 'role',
            'value' => '($data->role == "1") ? "Предприниматель" : "Бухгалтер"'
        ),
		/*
		'role',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
