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
        $files_str = '';
        if(count($account->files)) {
            $files_str .= '<ul>';
            foreach($account->files as $file) {
                if($file->attributes['type'] == 2) {
                    $files_str .= '<li>' . CHtml::link($file->attributes['file'], array('/site/getfile/', 'id' => $file->attributes['id']), array('class' => 'download_file')) . '</li>';
                }
            }
            $files_str .= '</ul>';
        }

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

        $edit_link = CHtml::link('Редактировать запись', '#', array('class' => 'edit_link_account', 'id' => 'edit_link_account_' . $account->id));

        if($account->ready == 1) {
            $ready_txt = '<p class="ready">Готово</p>';
        } else {
            $ready_txt = '';
        }

        $comments_str = '';
        if(count($account->comments)) {
            foreach($account->comments as $comment) {
                if($comment->author == 1) {
                    $comments_str .= '<div class="comment_item"><span>'.$user_name.':</span>';
                } elseif($comment->author == 2) {
                    $comments_str .= '<div class="comment_item"><span>'.$entrepreuner_name.':</span>';
                }
                $comments_str .= $comment->comment . '</div>';
            }
        }

        echo '
        <tr id="account_row_'.$account->id.'">
            <td width="38" height="95">'.$key.'</td>
            <td width="140">'.$account->name.'</td>
            <td width="140">'.$type[$account->type].'</td>
            <td width="140">'.$update.'</td>
            <td width="140">'.$comments_str.'</td>
            <td width="140">'.$ready_txt.$files_str.'<br>' . $edit_link .'</td>
        </tr>
        ';
        echo '<tr id="account_edit_row_'.$account->id.'" class="hide_form_edit_account"><td colspan="6">';
        $this->renderPartial('_form_edit_account', array('model'=>$account, 'entrepreneur_id' => $entrepreneur_id, 'type' => $type));
        echo '</td></tr>';
        $key++;
    }
    ?>
</table>