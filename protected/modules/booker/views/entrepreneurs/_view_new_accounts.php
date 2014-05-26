<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 14.05.14
 * Time: 16:37
 * To change this template use File | Settings | File Templates.
 */
?>
<table class="infoTable"  id="table_accounting">
    <tr>
        <td class="headerTd" width="38">№</td>
        <td class="headerTd" width="140">Название документа</td>
        <td class="headerTd" width="140">Тип</td>
        <td class="headerTd" width="140">Дата изменения</td>
        <td class="headerTd" width="140">Комментарий</td>
        <td class="headerTd" width="140">Файл документа</td>
    </tr>
    <?php
    $key = 1;
    foreach($accounting as $account) {
        $update = date('d.m.Y', $account->date_update);
        $delete_link = CHtml::ajaxLink(
            'Удалить запись',
            '/booker/entrepreneurs/deleteaccount/',
            array(
                'type' => 'get',
                'data' => array(
                    'id' => $account->id,
                    'entrepreneur_id' => $entrepreneur_id,
                ),
                'update'=>'#table_accounting_wrapper'
            ),
            array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данную задачу?', 'id' => 'account_' . $account->id)
        );


        echo '
                <tr>
                    <td width="38" height="95">'.$key.'</td>
                    <td width="140">'.$account->name.'</td>
                    <td width="140">'.$account->type.'</td>
                    <td width="140">'.$update.'</td>
                    <td width="140">'.$account->comment.'</td>
                    <td width="140">ромашvfvfvfvfvfvfvfvfvка.jpg
                        <ul>
                            <li><a class="download" href="#"></a></li>
                            <li><a class="del" href="#"></a></li>
                        </ul>
                        <div class="leftAndRight"><div class="spanRight">Оплачено<div class="checkbox"></div></div></div>
                        '.$delete_link.'
                    </td>
                </tr>
                ';
        $key++;
    }
    ?>
</table>