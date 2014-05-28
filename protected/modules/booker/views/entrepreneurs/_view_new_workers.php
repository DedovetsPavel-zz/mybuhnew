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
        $edit_link = CHtml::link('Редактировать запись', '#', array('class' => 'edit_link_worker', 'id' => 'edit_link_worker_' . $worker->id));

        echo '
            <tr class="worker_row_'.$worker->id.'">
                <td width="38" height="95">'.$key.'</td>
                <td>'.$worker->fullname.'</td>
                <td>'.$worker->post.'</td>
                <td>'.$date_of_birth.'</td>
                <td>'.$gender.'</td>
                <td>'.$worker->inn.'</td>
                <td>'.$worker->snils.'</td>
                <td>' . $hire_date . $termination_date . '</td>
                <td>'.number_format($worker->pay, 0, ',', ' ').'</td>
                <td>'.$edit_link.$delete_link.'</td>
            </tr>
            ';
        echo '<tr id="worker_edit_row_'.$worker->id.'" class="hide_form_edit_worker"><td colspan="10">';
        $this->renderPartial('_form_edit_worker', array('model'=>$worker, 'entrepreneur_id' => $entrepreneur_id));
        echo '</td></tr>';
        $key++;
    }
    ?>
</table>
<?php Yii::app()->clientScript->registerScriptFile('/themes/buhland/jqueryui.custom.js'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.edit_link_worker').on('click', function() {
            var link_id = $(this).attr('id');
            var worker_id = link_id.substr(17);
            $('.worker_row_' + worker_id).hide();
            $('#worker_edit_row_' + worker_id).show();
            return false;
        });
        $(".calendar input").datepicker();

        $(".calendar img").click(function(){
            $(this).closest(".calendar").find("input").focus();
        });
    });

    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
            'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
            'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

</script>