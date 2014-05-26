<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 15.05.14
 * Time: 12:04
 * To change this template use File | Settings | File Templates.
 */


$this->menu = array(
    array('label'=>'Клиенты', 'url'=>array('/booker/')),
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/entrepreneurs/accounting/', 'id' => $entrepreneur_id), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Отчетность', 'url'=>array('/booker/entrepreneurs/reporting/', 'id' => $entrepreneur_id)),
    array('label'=>'Прогнозы', 'url'=>array('/booker/entrepreneurs/prognozes/', 'id' => $entrepreneur_id)),
    array('label'=>'Настройки', 'url'=>array('/booker/entrepreneurs/update/', 'id' => $entrepreneur_id)),
);
?>

<div class="tableBlock">
    <div class="clear_top_block"></div>
    <?php //$this->renderPartial('_form_create_account', array('model'=>$accountingModel, 'entrepreneur_id' => $entrepreneur_id, 'type' => $type)); ?>
    <div class="controlPanel">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'accounting-form-filter',
            'action'=>$this->createUrl('/booker/entrepreneurs/accounting/', array('id' => $entrepreneur_id)),
            'enableClientValidation'=>false,
            'enableAjaxValidation'=>false,
            'method' => 'get'
        ));
        ?>
        <input type="hidden" name="filter" value="1"/>
        <div class="select-wrap">
            <?php echo $form->dropDownList($accountingModel,'type', $type); ?>
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
                    array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данную задачу?', 'id' => 'account_' . $account->id)
                );

                echo '
                <tr>
                    <td width="38" height="95">'.$key.'</td>
                    <td width="140">'.$account->name.'</td>
                    <td width="140">'.$account->type.'</td>
                    <td width="140">'.$update.'</td>
                    <td width="140">'.$account->comment.'</td>
                    <td width="140">'.$files_str.'
                    </td>
                </tr>
                ';
                $key++;
            }
            ?>
        </table>
    </div>
</div>
