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
        $update = date('d.m.Y', $report->update);
        switch($report->status) {
            case '1' : $status_text = 'Отправлено на оплату';
                break;
            case '2' : $status_text = 'Ожидает подтверждения ';
                break;
        }
        echo '
                    <tr>
                        <td width="38" height="95">'.$key.'</td>
                        <td width="140">'.$report->name.'</td>
                        <td width="140">'.$report->comment.'</td>
                        <td width="140">'.$report->parent.'ромашка.jpg
                            <ul>
                                <li><a class="download" href="#"></a></li>
                                <li><a class="del" href="#"></a></li>
                            </ul>
                        </td>
                        <td width="140">'.$update.'</td>
                        <td width="140">
                            '.$status_text.'
                            <a class="delete" href="#">Удалить запись</a>
                        </td>
                    </tr>
                    ';
        $key++;
    }
    ?>
</table>