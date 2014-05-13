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


$this->menu = array(
    array('label'=>'Клиенты', 'url'=>array('/booker/')),
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/')),
    array('label'=>'Отчетность', 'url'=>array('/booker/')),
    array('label'=>'Прогнозы', 'url'=>array('/booker/')),
    array('label'=>'Настройки', 'url'=>'/booker/', 'itemOptions' => array('class' => 'active')),
);


?>

<div class="tableBlock">
    <div class="load">Загрузить сканы</div>
    <div class="loadForm">
        <img class="imgBlock" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/loadFormTop.png">
        <div class="bodyForm">
            <p class="little"><span class="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/skrep.png"><span>Загрузить докумет</span><input type="file" class="hidden" name="file"></span><span class="right">+ еще</span></p>
            <div class="button" type="button" >Загрузить</div>
        </div>
        <img class="imgBlock" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/loadFormBottom.png">
    </div>
    <?php $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label' => 'Данные налогоплательщика', 'url' => array('/booker/'), 'itemOptions' => array('class' => 'active')),
            array('label' => 'Сотрудники', 'url'=>array('/booker/entrepreneurs/workers/', 'id' => $model->id))
        ),
        'htmlOptions' => array(
            'id' => 'secMenu',
            'class' => 'secMenu'
        )
    ));
    ?>
    <div class="informationBlock">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>

