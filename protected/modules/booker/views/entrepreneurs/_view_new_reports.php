<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 14.05.14
 * Time: 16:37
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
        $update = date('d.m.Y', $report->date_update);
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

        switch($report->status) {
            case '1' : $status_text = 'Отправлено на оплату';
                break;
            case '2' : $status_text = 'Ожидает подтверждения ';
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

        echo '
            <tr>
                <td width="38" height="95">'.$key.'</td>
                <td width="140">'.$report->name.'</td>
                <td width="140">'.$report->comment.'</td>
                <td width="140">'.$files_str.'</td>
                <td width="140">'.$update.'</td>
                <td width="140">
                   '.$status_text.'
                </td>
            </tr>
            ';
        $key++;
    }
    ?>
</table>