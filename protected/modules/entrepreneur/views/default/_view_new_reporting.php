<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 15.05.14
 * Time: 12:04
 * To change this template use File | Settings | File Templates.
 */
?>
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
