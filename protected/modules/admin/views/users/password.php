<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 20.05.14
 * Time: 15:27
 * To change this template use File | Settings | File Templates.
 */

$this->menu=array(
    array('label'=>'Список пользователей', 'url'=>array('index')),
    array('label'=>'Создать пользователя', 'url'=>array('create')),
    array('label'=>'Просмотре пользователя', 'url'=>array('view', 'id' => $model->id)),
    array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id))
);
?>

Укажите пароль<br>

<?php

echo CHtml::form();
echo CHtml::textField('password');
echo CHtml::submitButton('Изменить');
echo CHtml::endForm();