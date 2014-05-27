<?php
/* @var $this DefaultController */


$this->menu = array(
    array('label'=>'Бухгалтерия', 'url'=>array('/entrepreneur/'), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Отчетность', 'url'=>array('/entrepreneur/default/reporting/')),
    array('label'=>'Прогнозы', 'url'=>array('/entrepreneur/default/prognozes/')),
    array('label'=>'Настройки', 'url'=>'/entrepreneur/'),
);
?>

<div class="tableBlock">
    <div class="buttonAim">Поставить задачу бухгалтеру</div>
    <?php $this->renderPartial('_form_create_account', array('model'=>$accountingModel, 'entrepreneur_id' => $entrepreneur_id, 'type' => $type)); ?>
    <div class="controlPanel">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'accounting-form-filter',
            'action'=>$this->createUrl('/entrepreneur/default/'),
            'enableClientValidation'=>false,
            'enableAjaxValidation'=>false,
            'method' => 'get'
        ));
        ?>
        <input type="hidden" name="filter" value="1"/>
        <div class="select-wrap ">
            <?php echo $form->dropDownList($accountingModel,'type', $type, array('class' => 'drop_down_select_head')); ?>
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
    <div id="table_accounting_wrapper">
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
                $edit_link = CHtml::link('Редактировать запись', '#', array('class' => 'edit_link_account', 'id' => 'edit_link_account_' . $account->id));

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
    </div>
</div>
