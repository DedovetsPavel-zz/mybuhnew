<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 15.05.14
 * Time: 12:04
 * To change this template use File | Settings | File Templates.
 */


$this->menu = array(
    array('label'=>'Бухгалтерия', 'url'=>array('/entrepreneur/')),
    array('label'=>'Отчетность', 'url'=>array('/entrepreneur/default/reporting/'), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Прогнозы', 'url'=>array('/entrepreneur/default/prognozes/')),
    array('label'=>'Настройки', 'url'=>'/entrepreneur/default/'),
);
?>
<div class="tableBlock">
    <div class="clear_top_block"></div>
    <div class="controlPanel">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'reports-form-filter',
            'action'=>$this->createUrl('/entrepreneur/default/reporting/'),
            'enableClientValidation'=>false,
            'enableAjaxValidation'=>false,
            'method' => 'get'
        ));
        ?>
        <input type="hidden" name="filter" value="1"/>
        <div class="select-wrap">
                <?php echo $form->dropDownList($reportsModel,'status', array('' => '', '1' => 'Отправлено на оплату', '2' => 'Ожидает подтверждения'), array('class' => 'drop_down_select_head')); ?>
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
        <?php $this->endWidget(); ?>
    </div>
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
                        foreach($report->files as $file) {
                            $files_str .= CHtml::link($file->attributes['file'], array('/site/getfile/', 'id' => $file->attributes['id'])) . '<br>';
                        }
                    }

                    $update = date('d.m.Y', $report->date_update);
                    switch($report->status) {
                        case '1' : $status_text = 'Отправлено на оплату';
                            break;
                        case '2' : $status_text = 'Ожидает подтверждения';
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
                        array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данный прогноз?')
                    );

                    if($report->status == 2) {
                        $confirm_status_link = CHtml::ajaxLink(
                            'Подтвердить',
                            '/entrepreneur/default/confirmreport/',
                            array(
                                'type' => 'get',
                                'data' => array(
                                    'id' => $report->id,
                                    'entrepreneur_id' => $entrepreneur_id,
                                    'confirm' => 1
                                ),
                                'update'=>'#table_reports_wrapper'
                            ),
                            array('class' => 'delete')
                        );
                    } else {
                        $confirm_status_link = '';
                    }


                    echo '
                    <tr>
                        <td width="38" height="95">'.$key.'</td>
                        <td width="140">'.$report->name.'</td>
                        <td width="140">'.$report->comment.'</td>
                        <td width="140">'.$files_str.'
                            <ul>
                                <li><a class="download" href="#"></a></li>
                            </ul>
                        </td>
                        <td width="140">'.$update.'</td>
                        <td width="140">
                            '.$status_text.'<br> '.$confirm_status_link.'
                        </td>
                    </tr>
                    ';
                    $key++;
                }
            ?>
        </table>
    </div>
</div>