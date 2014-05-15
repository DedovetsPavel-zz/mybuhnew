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
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/')),
    array('label'=>'Отчетность', 'url'=>array('/booker/entrepreneurs/reporting/', 'id' => $entrepreneur_id), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Прогнозы', 'url'=>array('/booker/entrepreneurs/prognozes/', 'id' => $entrepreneur_id)),
    array('label'=>'Настройки', 'url'=>array('/booker/entrepreneurs/update/', 'id' => $entrepreneur_id)),
);
?>
<div class="tableBlock">
    <div class="buttonAim2">Добавить отчетность</div>
    <div class="controlPanel">
        <div class="input open">
            <input type="text"  class="choosen">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/select.png">
            <ul class="checkme">
                <li>Вариант1</li>
                <li>Вариант2</li>
                <li>Вариант3</li>
                <li>Вариант4</li>
                <li>Вариант5</li>
                <li>Вариант6</li>
            </ul>
        </div>
        <div class="date">
            <span>Дата изменения с</span>
            <div class="input">
                <input type="text">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
            <span>по</span>
            <div class="input">
                <input type="text">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
            </div>
        </div>
        <div class="searchInput">
            <input type="text">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/search.png">
        </div>
    </div>
    <?php $this->renderPartial('_form_create_report', array('model'=>$reportsModel, 'entrepreneur_id' => $entrepreneur_id)); ?>
    <div id="table_reports_wrapper">
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
    </div>
</div>

