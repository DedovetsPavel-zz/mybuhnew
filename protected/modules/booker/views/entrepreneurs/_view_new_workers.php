<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 23.05.14
 * Time: 12:01
 * To change this template use File | Settings | File Templates.
 */
?>
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
        $delete_link = CHtml::link('Удалить запись', array('url'=>'#'), array('submit'=>array('/booker/workers/delete/','id'=>$worker->id),'confirm'=>'Вы уверены, что хотите удалить выбранного сотрудника?'));

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