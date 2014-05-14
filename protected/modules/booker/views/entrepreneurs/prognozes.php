<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 12.05.14
 * Time: 11:14
 * To change this template use File | Settings | File Templates.
 */

$this->menu = array(
    array('label'=>'Клиенты', 'url'=>array('/booker/')),
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/')),
    array('label'=>'Отчетность', 'url'=>array('/booker/')),
    array('label'=>'Прогнозы', 'url'=>array('/booker/entrepreneurs/prognozes/', 'id' => $entrepreneur_id), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Настройки', 'url'=>array('/booker/entrepreneurs/update/', 'id' => $entrepreneur_id)),
);
?>

<div class="tableBlock">
    <div class="buttonAim3">Добавить событие</div>
    <div class="controlPanel">
        <div class="date">
            <span>Дата изменения с</span>
            <div class="input">
                <input type="text">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
            <span>по</span>
            <div class="input">
                <input type="text">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
        </div>
        <div class="searchInput">
            <input type="text">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/search.png">
        </div>
    </div>
    <?php $this->renderPartial('_form_create_event', array('model'=>$prognozesModel, 'entrepreneur_id' => $entrepreneur_id)); ?>
    <table class="infoTable">
        <tr>
            <td class="headerTd" width="38">№</td>
            <td class="headerTd" width="140">Событие</td>
            <td class="headerTd" width="140">Срок</td>
            <td class="headerTd" width="140">Расход</td>
            <td class="headerTd" width="280">Комментарии</td>
        </tr>
        <?php
        $key = 1;
        foreach($prognozes as $prognoz) {
            $deadline = date('d.m.Y', $prognoz->deadline);
            $delete_link = CHtml::ajaxLink(
                'Удалить запись',
                '/booker/entrepreneurs/deleteprognoz/',
                array(
                'type' => 'get',
                'data' => array(
                    'id' => $prognoz->id,
                    'entrepreneur_id' => $entrepreneur_id
                )
            ),
            array('class' => 'delete'));
            echo '
                <tr>
                    <td width="38" height="95">'.$key.'</td>
                    <td width="140">'.$prognoz->event.'</td>
                    <td width="140">'.$deadline.'</td>
                    <td width="140">'.$prognoz->consumption.'</td>
                    <td width="280">'.$prognoz->comment.$delete_link.'</td>
                </tr>
                ';
            $key++;
        }
        ?>
    </table>
    <div class="itog">
        <span class="left">Итого расходов <br>по состоянию на 05.04.2014г:</span>
        <span class="right">721 000 руб.</span>
    </div>
    <div class="clear"></div>
</div>