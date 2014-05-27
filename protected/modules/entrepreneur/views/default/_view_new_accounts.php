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
            foreach($account->files as $file) {
                $files_str .= CHtml::link($file->attributes['file'], array('/site/getfile/', 'id' => $file->attributes['id'])) . '<br>';
            }
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
            array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данную задачу?')
        );
        $edit_link = CHtml::link('Редактировать запись', '#', array('class' => 'edit_link_account', 'id' => 'edit_link_account_' . $account->id));
        $comments_str = '';
        if(count($account->comments)) {
            foreach($account->comments as $comment) {
                if($comment->author == 1) {
                    $comments_str .= '<div class="comment_item"><span>'.$user_name.': </span>';
                } elseif($comment->author == 2) {
                    $comments_str .= '<div class="comment_item"><span>'.$entrepreuner_name.': </span>';
                }
                $comments_str .= $comment->comment . '</div>';
            }
        }
        if($account->ready == 1) {
            $ready_txt = '<p class="ready">Готово</p>';
        } else {
            $ready_txt = '';
        }


        echo '
            <tr>
                <td width="38" height="95">'.$key.'</td>
                <td width="140">'.$account->name.'</td>
                <td width="140">'.$type[$account->type].'</td>
                <td width="140">'.$update.'</td>
                <td width="140">'.$comments_str.'</td>
                <td width="140">'.$ready_txt.$files_str.'<br>' . $edit_link .'
                </td>
            </tr>
            ';
        echo '<tr id="account_edit_row_'.$account->id.'" class="hide_form_edit_account"><td colspan="6">';
        $this->renderPartial('_form_edit_account', array('model'=>$account, 'entrepreneur_id' => $entrepreneur_id, 'type' => $type));
        echo '</td></tr>';
        $key++;
    }
    ?>
</table>
<?php Yii::app()->clientScript->registerScriptFile('/themes/buhland/scripts/jquery.selectBox.js'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.edit_link_account').on('click', function() {
            var link_id = $(this).attr('id');
            var account_id = link_id.substr(18);
            $('#account_row_' + account_id).hide();
            $('#account_edit_row_' + account_id).show();
            //console.log(account_id);
            return false;
        });

        $(".span_load_doc").on("click", function(){
            $(this).parent().parent().next().find('input[type="file"]').click();
        });
        $('.drop_down_list').selectBox();
    });
</script>
