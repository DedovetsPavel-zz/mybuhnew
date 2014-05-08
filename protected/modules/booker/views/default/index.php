<?php
/* @var $this DefaultController */
?>
<?php
$this->menu = array(
    array('label'=>'Клиенты', 'url'=>array('/booker/'), 'itemOptions' => array('class' => 'active')),
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/')),
    array('label'=>'Отчетность', 'url'=>array('/booker/')),
    array('label'=>'Прогнозы', 'url'=>array('/booker/')),
    array('label'=>'Настройки', 'url'=>'/booker/'),
);
?>
<div class="tableBlock" id="table_users_wrapper">
    <table class="infoTable" id="table_users">
        <tr>
            <td class="headerTd">Клиент</td>
        </tr>
    <?php
    foreach($model as $item) {
        echo '<tr><td>' . CHtml::link($item->user_data->name,'#') . '</td></tr>';
    }
    ?>
    </table>
</div>


