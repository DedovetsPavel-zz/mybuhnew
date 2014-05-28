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
<script type="text/javascript">
    $(document).ready(function(){
        $('.edit_link_report').on('click', function() {
            var link_id = $(this).attr('id');
            var report_id = link_id.substr(17);
            $('.report_row_' + report_id).hide();
            $('#report_edit_row_' + report_id).show();
            return false;
        });
        $(".span_load_doc").on("click", function(){
            $(this).parent().parent().next().find('input[type="file"]').click();
        });
    });
</script>