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
    <div class="mission2">
        <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormTop.png">
        <div class="accFormBody">
            <p>Наименование документа </p>
            <input type="text" class="input">
            <p>Комментарий</p>
            <textarea class="textarea"></textarea>
            <div class="leftAndRight"><p>Состояние </p>	<div class="spanRight">Оплачено<div class="checkbox"></div></div></div>
            <div class="selector">
                <input type="text">
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
            <p class="little"><span class="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/skrep.png"><span>Загрузить докумет</span><input type="file" class="hidden" name="file"></span><span class="right">+ еще</span></p>
            <div class="button" type="button" >поставить задачу</div>
        </div>
        <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormBottom.png">
    </div>

    <table class="infoTable">
        <tr>
            <td class="headerTd" width="38">№</td>
            <td class="headerTd" width="140">Название документа</td>
            <td class="headerTd" width="140">Комментарий</td>
            <td class="headerTd" width="140">Файл документа</td>
            <td class="headerTd" width="140">Дата изменения</td>
            <td class="headerTd" width="140">Состояние</td>
        </tr>
        <tr>
            <td width="38" height="95">1</td>
            <td width="140">Счет ООО “Ромашка”</td>
            <td width="140">Счет</td>
            <td width="140">ромашка.jpg
                <ul>
                    <li><a class="download" href="#"></a></li>
                    <li><a class="del" href="#"></a></li>
                </ul>
            </td>
            <td width="140">12.02.2014</td>
            <td width="140">
                Отправлено на оплату
                <div class="leftAndRight"><div class="spanRight">Оплачено<div class="checkbox"></div></div></div>
                <a class="delete" href="#">Удалить запись</a>
            </td>
        </tr>
        <tr>
            <td width="38" height="95">2</td>
            <td width="140">Счет ООО “Ромашка”</td>
            <td width="140">Счет</td>
            <td width="140">ромашка.jpg
                <ul>
                    <li><a class="download" href="#"></a></li>
                    <li><a class="del" href="#"></a></li>
                </ul>

            </td>
            <td width="140">12.02.2014</td>
            <td width="140">
                Ожидает подтверждения
                <a class="delete" href="#">Удалить запись</a>
            </td>
        </tr>
        <tr>
            <td width="38" height="95">3</td>
            <td width="140">Счет ООО “Ромашка”</td>
            <td width="140">Счет</td>
            <td width="140">ромашка.jpg
                <ul>
                    <li><a class="download" href="#"></a></li>
                    <li><a class="del" href="#"></a></li>
                </ul>

            </td>
            <td width="140">12.02.2014</td>
            <td width="140">
                Отправлено на оплату
                <div class="leftAndRight"><div class="spanRight">Оплачено<div class="checkbox"></div></div></div>
                <a class="delete" href="#">Удалить запись</a>
            </td>
        </tr>
    </table>
</div>

