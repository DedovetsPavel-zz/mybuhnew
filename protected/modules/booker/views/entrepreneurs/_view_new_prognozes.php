<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 14.05.14
 * Time: 16:37
 * To change this template use File | Settings | File Templates.
 */
?>
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
        }
        ?>
</table>