<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 12.05.14
 * Time: 11:14
 * To change this template use File | Settings | File Templates.
 */

$this->menu = array(
    array('label'=>'Бухгалтерия', 'url'=>array('/entrepreneur/')),
    array('label'=>'Отчетность', 'url'=>array('/entrepreneur/default/reporting/')),
    array('label'=>'Прогнозы', 'url'=>array('/entrepreneur/default/prognozes/')),
    array('label'=>'Настройки', 'url'=>array('/entrepreneur/default/entrepreuner/'), 'itemOptions' => array('class' => 'active')),
);
?>

<div class="tableBlock">
    <div class="clear_top_block_other"></div>
    <?php $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label' => 'Данные налогоплательщика', 'url' => array('/entrepreneur/default/entrepreuner')),
            array('label' => 'Сотрудники', 'url'=>array('/entrepreneur/default/workers'), 'itemOptions' => array('class' => 'active'))
        ),
        'htmlOptions' => array(
            'id' => 'secMenu',
            'class' => 'secMenu'
        )
    ));
    ?>
    <div class="informationBlock">
        <table class="mansTable">
            <tr>
                <td class="headerTd" width="38">№</td>
                <td class="headerTd">ФИО</td>
                <td class="headerTd">Должность</td>
                <td class="headerTd">Дата рождения</td>
                <td class="headerTd">Пол</td>
                <td class="headerTd">ИНН</td>
                <td class="headerTd">СНИЛС</td>
                <td class="headerTd">Дата приема на работу / Дата увольнения</td>
                <td class="headerTd">Заработная плата, руб</td>
            </tr>
            <?php
            $key = 1;
            foreach($workers as $worker) {
                $date_of_birth = date('d.m.Y', $worker->date_of_birth);
                $gender = ($worker->gender == 1) ? 'муж' : 'жен';
                $hire_date = date('d.m.Y', $worker->hire_date);
                if($worker->termination_date) {
                    $termination_date = ' / ' . date('d.m.Y', $worker->termination_date);
                } else {
                    $termination_date = '';
                }

                echo '
                <tr>
                    <td width="38" height="95">'.$key.'</td>
                    <td>'.$worker->fullname.'</td>
                    <td>'.$worker->post.'</td>
                    <td>'.$date_of_birth.'</td>
                    <td>'.$gender.'</td>
                    <td>'.$worker->inn.'</td>
                    <td>'.$worker->snils.'</td>
                    <td>' . $hire_date . $termination_date . '</td>
                    <td>'.number_format($worker->pay, 0, ',', ' ').'</td>
                </tr>
                ';
                $key++;
            }

            ?>
        </table>
    </div>
</div>