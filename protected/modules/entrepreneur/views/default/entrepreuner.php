<?php
/* @var $this EntrepreneursController */
/* @var $model Entrepreneurs */

$this->menu = array(
    array('label'=>'Бухгалтерия', 'url'=>array('/entrepreneur/')),
    array('label'=>'Отчетность', 'url'=>array('/entrepreneur/default/reporting/')),
    array('label'=>'Прогнозы', 'url'=>array('/entrepreneur/default/prognozes/')),
    array('label'=>'Настройки', 'url'=>array('/entrepreneur/default/entrepreuner'), 'itemOptions' => array('class' => 'active')),
);
?>

<div class="tableBlock">
    <div class="clear_top_block_other"></div>
    <?php $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label' => 'Данные налогоплательщика', 'url' => array('/entrepreneur/default/entrepreuner'), 'itemOptions' => array('class' => 'active')),
            array('label' => 'Сотрудники', 'url'=>array('/entrepreneur/default/workers'))
        ),
        'htmlOptions' => array(
            'id' => 'secMenu',
            'class' => 'secMenu'
        )
    ));
    ?>
    <div class="informationBlock">
        <div class="form_data_enter">
            <div class="row">
                <p class="info_txt"><?php echo $labels['organization_name'] ?></p>
                <p class="info_value"><?php echo $model->organization_name ?></p>
            </div>

            <div class="row">
                <p class="info_txt"><?php echo $labels['short_name_organization'] ?></p>
                <p class="info_value"><?php echo $model->short_name_organization ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['inn'] ?></p>
                <p class="info_value"><?php echo $model->inn ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['kpp'] ?></p>
                <p class="info_value"><?php echo $model->kpp ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['ogrn'] ?></p>
                <p class="info_value"><?php echo $model->ogrn ?></p>
            </div>

            <div class="row shortPSpecial">
                <p class="info_txt"><?php echo $labels['registration_date'] ?></p>
                <p class="info_value"><?php
                    if($model->registration_date) {
                        $registration_date = date('d.m.Y', $model->registration_date);
                    } else {
                        $registration_date = '';
                    }
                    echo $registration_date ?>
                </p>
            </div>

            <div class="row">
                <p class="info_txt"><?php echo $labels['organization_address'] ?></p>
                <p class="info_value"><?php echo $model->organization_address ?></p>
            </div>

            <div class="row shortP specialBlock">
                <p class="info_txt"><?php echo $labels['okved'] ?></p>
                <p class="info_value"><?php echo $model->okved ?></p>
            </div>
            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['okato'] ?></p>
                <p class="info_value"><?php echo $model->okato ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['oktmo'] ?></p>
                <p class="info_value"><?php echo $model->oktmo ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['okpo'] ?></p>
                <p class="info_value"><?php echo $model->okpo ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['okogu'] ?></p>
                <p class="info_value"><?php echo $model->okogu ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['okfs'] ?></p>
                <p class="info_value"><?php echo $model->okfs ?></p>
            </div>

            <div class="row shortP">
                <p class="info_txt"><?php echo $labels['okopf'] ?></p>
                <p class="info_value"><?php echo $model->okopf ?></p>
            </div>

            <div class="row specialBlock2">
                <p class="info_txt"><?php echo $labels['ifns'] ?></p>
                <p class="info_value"><?php echo $model->ifns ?></p>
            </div>

            <div class="row">
                <p class="info_txt"><?php echo $labels['prf'] ?></p>
                <p class="info_value"><?php echo $model->prf ?></p>
            </div>

            <div class="row shortP specialBlock3">
                <p class="info_txt"><?php echo $labels['registration_number_in_prf'] ?></p>
                <p class="info_value"><?php echo $model->registration_number_in_prf ?></p>
            </div>

            <div class="row">
                <p class="info_txt"><?php echo $labels['fss'] ?></p>
                <p class="info_value"><?php echo $model->fss ?></p>
            </div>

            <div class="row shortP specialBlock3">
                <p class="info_txt"><?php echo $labels['registration_number_in_fss'] ?></p>
                <p class="info_value"><?php echo $model->registration_number_in_fss ?></p>
            </div>

            <div class="row smallP">
                <p class="info_txt"><?php echo $labels['code_subordination'] ?></p>
                <p class="info_value"><?php echo $model->code_subordination ?></p>
            </div>

            <div class="row shortP specialBlock4">
                <p class="info_txt"><?php echo $labels['insurance_tariv_fss'] ?></p>
                <p class="info_value"><?php echo $model->insurance_tariv_fss ?></p>
            </div>
            <p>Заработная плата работников</p>
            <div class="row calenBlock">
                <p class="info_txt"><?php echo $labels['date_avance'] ?></p>
                <p class="info_value"><?php
                    if($model->date_avance) {
                        $date_avance = date('d.m.Y', $model->date_avance);
                    } else {
                        $date_avance = '';
                    }
                    echo $date_avance;
                    ?>
                </p>
            </div>

            <div class="row calenBlock2">
                <p class="info_txt"><?php echo $labels['date_pay'] ?></p>
                <p class="info_value"><?php
                    if($model->date_pay) {
                        $date_pay = date('d.m.Y', $model->date_pay);
                    } else {
                        $date_pay = '';
                    }

                    echo $date_pay; ?>
                </p>
            </div>
        </div>
    </div>
</div>