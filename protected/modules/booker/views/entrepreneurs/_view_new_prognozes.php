<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 14.05.14
 * Time: 16:37
 * To change this template use File | Settings | File Templates.
 */
?>
<table class="infoTable" id="table_prognozes">
        <tr>
            <td class="headerTd" width="38">№</td>
            <td class="headerTd" width="140">Событие</td>
            <td class="headerTd" width="140">Срок</td>
            <td class="headerTd" width="140">Расход</td>
            <td class="headerTd" width="280">Комментарии</td>
        </tr>
        <?php
        $key = 1;
        foreach($prognozes as $prognoz) {
            $deadline = date('d.m.Y', $prognoz->deadline);
            $delete_link = CHtml::ajaxLink(
                'Удалить запись',
                '/booker/entrepreneurs/deleteprognoz/',
                array(
                    'type' => 'get',
                    'data' => array(
                        'id' => $prognoz->id,
                        'entrepreneur_id' => $entrepreneur_id,
                    ),
                    'update'=>'#table_prognozes_wrapper'
                ),
                array('class' => 'delete','confirm'=>'Вы уверены, что хотите удалить данное событие?', 'id' => 'prognoz_' . $prognoz->id)
            );

            $edit_link = CHtml::link('Редактировать запись', '#', array('class' => 'edit_link_prognoz', 'id' => 'edit_link_prognoz_' . $prognoz->id));

            echo '
                <tr id="prognoz_row_'.$prognoz->id.'">
                    <td width="38" height="95">'.$key.'</td>
                    <td width="140">'.$prognoz->event.'</td>
                    <td width="140">'.$deadline.'</td>
                    <td width="140">'.$prognoz->consumption.'</td>
                    <td width="280">'.$prognoz->comment.$delete_link.$edit_link.'</td>
                </tr>
                ';
            echo '<tr id="prognoz_edit_row_'.$prognoz->id.'" class="hide_form_edit_account"><td colspan="5">';
            $this->renderPartial('_form_edit_prognoz', array('model'=>$prognoz, 'entrepreneur_id' => $entrepreneur_id));
            echo '</td></tr>';
            $key++;
        }
        ?>
</table>
<?php Yii::app()->clientScript->registerScriptFile('/themes/buhland/jqueryui.custom.js'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.edit_link_prognoz').on('click', function() {
            var link_id = $(this).attr('id');
            var prognoz_id = link_id.substr(18);
            $('#prognoz_row_' + prognoz_id).hide();
            $('#prognoz_edit_row_' + prognoz_id).show();
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