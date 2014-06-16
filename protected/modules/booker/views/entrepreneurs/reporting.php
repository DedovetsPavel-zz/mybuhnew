<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 15.05.14
 * Time: 12:04
 * To change this template use File | Settings | File Templates.
 */


$this->menu = array(
    array('label'=>'Клиенты', 'url'=>array('/booker/')),
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/entrepreneurs/accounting/', 'id' => $entrepreneur_id)),
    array('label'=>'Отчетность', 'url'=>array('/booker/entrepreneurs/reporting/', 'id' => $entrepreneur_id), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Прогнозы', 'url'=>array('/booker/entrepreneurs/prognozes/', 'id' => $entrepreneur_id)),
    array('label'=>'Настройки', 'url'=>array('/booker/entrepreneurs/update/', 'id' => $entrepreneur_id)),
);
?>
<div class="tableBlock">
    <div class="buttonAim2">Добавить отчетность</div>
    <div class="controlPanel reporting_control_panel">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'reports-form-filter',
            'action'=>$this->createUrl('/booker/entrepreneurs/reporting/', array('id' => $entrepreneur_id)),
            'enableClientValidation'=>false,
            'enableAjaxValidation'=>false,
            'method' => 'get'
        ));
        ?>
        <input type="hidden" name="filter" value="1"/>
        <div class="select-wrap">
                <?php echo $form->dropDownList($reportsModel,'status', array('' => '', '1' => 'Согласовано', '2' => 'Ожидает подтверждения', '3' => 'Отправлено в налоговую'), array('class' => 'drop_down_select_head')); ?>
        </div>
        <div class="date">
            <span>Дата изменения с</span>
            <div class="input">
                <input class="input_filter_report" type="text" name="date_start" value="<?php echo $date_start; ?>"/>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
            <span>по</span>
            <div class="input">
                <input class="input_filter_report" type="text" name="date_end" value="<?php echo $date_end; ?>"/>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
        </div>
        <div class="searchInput">
            <input type="text" name="search" value="<?php echo $search ?>"/>
            <button type="submit" class="search_button" title="Поиск"></button>
        </div>
        <div>
            <?php
                echo CHtml::link('Показать все', array('/booker/entrepreneurs/reporting/', 'id' => $entrepreneur_id), array('class' => 'reset_form'))
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <?php $this->renderPartial('_form_create_report', array('model'=>$reportsModel, 'entrepreneur_id' => $entrepreneur_id)); ?>
    <div id="table_reports_wrapper">
        <table class="infoTable" id="table_reports">
            <tr>
                <td class="headerTd" width="38">№</td>
                <td class="headerTd" width="140">Название документа</td>
                <td class="headerTd" width="140">Комментарий</td>
                <td class="headerTd" width="140">Файл документа</td>
                <td class="headerTd" width="140">Дата изменения</td>
                <td class="headerTd" width="140">Состояние</td>
            </tr>
            <?php
                $key = 1;
                foreach($reports as $report) {
                    $files_str = '';
                    if(count($report->files)) {
                        $files_str .= '<ul>';
                        foreach($report->files as $file) {
                            if($file->type == 1) {
                                $files_str .= '<li>'.CHtml::link($file->attributes['file'], array('/site/getfile/', 'id' => $file->attributes['id']), array('class' => 'download_file')) . '</li>';
                            }
                        }
                        $files_str .= '</ul>';
                    }

                    $update = date('d.m.Y', $report->date_update);
                    switch($report->status) {
                        case '1' : $status_text = 'Согласовано';
                            break;
                        case '2' : $status_text = 'Ожидает подтверждения';
                            break;
                        case '3' : $status_text = 'Отправлено в налоговую';
                            break;
                    }


                    $delete_link = CHtml::ajaxLink(
                        'Удалить запись',
                        '/booker/entrepreneurs/deletereport/',
                        array(
                            'type' => 'get',
                            'data' => array(
                                'id' => $report->id,
                                'entrepreneur_id' => $entrepreneur_id,
                            ),
                            'update'=>'#table_reports_wrapper'
                        ),
                        array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данный прогноз?', 'id' => 'report_' . $report->id)
                    );

                    $edit_link = CHtml::link('Редактировать запись', '#', array('class' => 'edit_link_report', 'id' => 'edit_link_report_' . $report->id));

                    echo '
                    <tr class="report_row_'.$report->id.'">
                        <td width="38" height="95">'.$key.'</td>
                        <td width="140">'.$report->name.'</td>
                        <td width="140">'.$report->comment.'</td>
                        <td width="140">'.$files_str.'</td>
                        <td width="140">'.$update.'</td>
                        <td width="140">
                            '.$status_text.$edit_link.'
                        </td>
                    </tr>
                    ';
                    echo '<tr id="report_edit_row_'.$report->id.'" class="hide_form_edit_report"><td colspan="6">';
                    $this->renderPartial('_form_edit_report', array('model'=>$report, 'entrepreneur_id' => $entrepreneur_id));
                    echo '</td></tr>';
                    $key++;
                }
            ?>
        </table>
    </div>
</div>