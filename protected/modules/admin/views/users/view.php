<?php
/* @var $this UsersController */
/* @var $model Users */

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
    array('label'=>'Создать бухгалтера', 'url'=>array('create', 'role' => '1')),
    array('label'=>'Создать предприниметаля', 'url'=>array('create', 'role' => '2')),
	array('label'=>'Обновить пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить данного пользователя?')),

);
?>

<h1>Пользователь <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
        array(
            'label' => 'Дата регистрации',
            'value' => date("m.d.Y H:i:s", $model->createdon)
        ),
//        array(
//            'label' => 'Заблокирован',
//            'value' => ($data->blocked == "1")? "Да" : "Нет"
//        ),
        array(
            'label' => 'Роль',
            'value' => ($data->role == "1") ? "Бухгалтер" : "Предприниматель"
        )
	),
)); ?>
