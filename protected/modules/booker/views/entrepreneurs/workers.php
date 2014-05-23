<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 12.05.14
 * Time: 11:14
 * To change this template use File | Settings | File Templates.
 */

$this->menu = array(
    array('label'=>'Клиенты', 'url'=>array('/booker/')),
    array('label'=>'Бухгалтерия', 'url'=>array('/booker/entrepreneurs/accounting/', 'id' => $entrepreneur_id)),
    array('label'=>'Отчетность', 'url'=>array('/booker/entrepreneurs/reporting/', 'id' => $entrepreneur_id)),
    array('label'=>'Прогнозы', 'url'=>array('/booker/entrepreneurs/prognozes/', 'id' => $entrepreneur_id)),
    array('label'=>'Настройки', 'url'=>array('/booker/entrepreneurs/update/', 'id' => $entrepreneur_id), 'itemOptions' => array('class' => 'active')),
);
?>

<div class="tableBlock">
    <div class="buttonAim4">Добавить сотрудника</div>
    <?php $this->renderPartial('_form_create_worker', array('model'=>$workersModel, 'entrepreneur_id' => $entrepreneur_id)); ?>
    <?php $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label' => 'Данные налогоплательщика', 'url' => array('/booker/entrepreneurs/update/', 'id' => $entrepreneur_id)),
            array('label' => 'Сотрудники', 'url'=>array('/booker/'), 'itemOptions' => array('class' => 'active'))
        ),
        'htmlOptions' => array(
            'id' => 'secMenu',
            'class' => 'secMenu'
        )
    ));
    ?>
    <div class="informationBlock" id="table_workers_wrapper">
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
                <td class="headerTd">Удалить запись</td>
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


                $delete_link = CHtml::ajaxLink(
                    'Удалить запись',
                    '/booker/entrepreneurs/deleteworker/',
                    array(
                        'type' => 'get',
                        'data' => array(
                            'id' => $worker->id,
                            'entrepreneur_id' => $entrepreneur_id,
                        ),
                        'update'=>'#table_workers_wrapper'
                    ),
                    array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данного работника?', 'id' => 'worker_' . $worker->id)
                );

                //$delete_link = CHtml::link('Удалить запись', array('url'=>'#'), array('submit'=>array('/booker/workers/delete/','id'=>$worker->id),'confirm'=>'Вы уверены, что хотите удалить выбранного сотрудника?'));

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
                    <td>'.$delete_link.'</td>
                </tr>
                ';
                $key++;
            }

            ?>
        </table>
    </div>
</div>