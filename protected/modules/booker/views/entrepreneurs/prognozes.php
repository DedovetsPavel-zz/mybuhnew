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
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/entrepreneurs/accounting/', 'id' => $entrepreneur_id)),
    array('label'=>'Отчетность', 'url'=>array('/booker/entrepreneurs/reporting/', 'id' => $entrepreneur_id)),
    array('label'=>'Прогнозы', 'url'=>array('/booker/entrepreneurs/prognozes/', 'id' => $entrepreneur_id), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Настройки', 'url'=>array('/booker/entrepreneurs/update/', 'id' => $entrepreneur_id)),
);
?>

<div class="tableBlock">
    <div class="buttonAim3">Добавить событие</div>
    <div class="controlPanel">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'events-form-filter',
            'action'=>$this->createUrl('/booker/entrepreneurs/prognozes/', array('id' => $entrepreneur_id)),
            'enableClientValidation'=>false,
            'enableAjaxValidation'=>false,
            'method' => 'get'
        ));
        ?>
        <input type="hidden" name="filter" value="1"/>
        <div class="date">
            <span>Дата изменения с</span>
            <div class="input">
                <input class="input_filter_prognoz" type="text" name="date_start" value="<?php echo $date_start; ?>"/>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
            <span>по</span>
            <div class="input">
                <input class="input_filter_prognoz" type="text" name="date_end" value="<?php echo $date_end; ?>"/>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
        </div>
        <div class="searchInput">
            <input type="text" name="search" value="<?php echo $search ?>"/>
            <button type="submit" class="search_button" title="Поиск"></button>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <?php $this->renderPartial('_form_create_event', array('model'=>$prognozesModel, 'entrepreneur_id' => $entrepreneur_id)); ?>
    <div id="table_prognozes_wrapper">
    <table class="infoTable" id="table_prognozes">
        <tr>
            <td class="headerTd" width="38">№</td>
            <td class="headerTd" width="140">Событие</td>
            <td class="headerTd" width="140">Срок</td>
            <td class="headerTd" width="140">Расход</td>
            <td class="headerTd" width="280">Комментарии</td>
        </tr>
        <?php
        $key = 1;
        $summ = 0;
        foreach($prognozes as $prognoz) {
            $deadline = date('d.m.Y', $prognoz->deadline);
            $delete_link = CHtml::ajaxLink(
                'Удалить запись',
                '/booker/entrepreneurs/deleteprognoz/',
                array(
                    'type' => 'get',
                    'data' => array(
                        'id' => $prognoz->id,
                        'entrepreneur_id' => $entrepreneur_id,
                    ),
                    'update'=>'#table_prognozes_wrapper'
                ),
                array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данное событие?')
            );
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
            $summ = $summ + $prognoz->consumption;
        }
        ?>
    </table>
    </div>
    <div class="itog">
        <?php
        $now_date = date('d.m.Y.', time());
        if($date_start && $date_end) {
            echo '<span class="left">Итого расходов <br>с '.$date_start.'г. по '.$date_end.'г:</span>';
        } else {
            if(!$date_end && $date_start) {

                echo '<span class="left">Итого расходов <br>c '.$date_start.'г по '.$now_date.'г:</span>';
            } elseif(!$date_start && $date_end) {
                echo '<span class="left">Итого расходов <br>по состоянию на '.$date_end.'г:</span>';
            } else {
                echo '<span class="left">Итого расходов <br>по состоянию на '.$now_date.'г:</span>';
            }
        }
        ?>

        <span class="right"><?php echo number_format($summ, 0, ',', ' ') ?> руб.</span>
    </div>
    <div class="clear"></div>
</div>