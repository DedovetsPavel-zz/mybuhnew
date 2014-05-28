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
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/entrepreneurs/accounting/', 'id' => $model->id)),
    array('label'=>'Отчетность', 'url'=>array('/booker/entrepreneurs/reporting/', 'id' => $model->id)),
    array('label'=>'Прогнозы', 'url'=>array('/booker/entrepreneurs/prognozes/', 'id' => $model->id)),
    array('label'=>'Настройки', 'url'=>array('/booker/entrepreneurs/update/', 'id' => $model->id), 'itemOptions' => array('class' => 'active')),
);


?>

<div class="tableBlock">
    <div class="load">Загрузить сканы</div>
    <?php $this->renderPartial('_form_load_scans', array('model'=>$model)); ?>
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

    <?php
    $files_str = '';
    if(count($files)) {
        $files_str .= '<div class="scans_wrapper">';
        $files_str .= '<p>Сканы</p>';
        $files_str .= '<ul class="scans_list">';
        foreach($files as $file) {
            $files_str .= '<li>'.CHtml::link($file->attributes['file'], array('/site/getfile/', 'id' => $file->attributes['id']), array('class' => 'download_file')) . '</li>';
        }
        $files_str .= '</ul>';
        $files_str .= '</div>';
    }

    echo $files_str;

    ?>
</div>