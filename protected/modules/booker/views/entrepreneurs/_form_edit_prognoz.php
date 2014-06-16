<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 13.05.14
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'prognoz-form-update_' . $model->id,
    'htmlOptions' => array(
        'class' => 'prognoz_update_form'
    ),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'action'=>$this->createUrl('/booker/entrepreneurs/updateevent/', array('id' => $model->id)),
    'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:function(form,data,hasError) {
            if(!hasError) {
                $.ajax({
                    "type":"POST",
                    "url":"' . $this->createUrl('/booker/entrepreneurs/updateevent/', array('id' => $model->id)) . '",
                    "data":form.serialize(),
                    "success":function(data) {
                        $("#table_prognozes_wrapper").html(data);
                    }
                });
            }
        }'
    ),
)); ?>
<div id="success"></div>
<div class="row">
    <?php echo $form->labelEx($model,'event'); ?>
    <?php echo $form->error($model,'event'); ?>
    <?php echo $form->textField($model,'event',array('size'=>60,'maxlength'=>255, 'class' => 'event_form_text_input')); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'deadline'); ?>
    <?php echo $form->error($model,'deadline'); ?>
    <div class="input calendar">

        <?php
        if($model->deadline) {
            $deadline = date('d.m.Y', $model->deadline);
        } else {
            $deadline = '';
        }
        ?>

        <?php echo $form->textField($model,'deadline',array('class' => 'event_form_text_input calendar_input', 'value' => $deadline, 'id' => 'deadline' . $model->id)); ?>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
    </div>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'consumption'); ?>
    <?php echo $form->error($model,'consumption'); ?>
    <?php echo $form->textField($model,'consumption',array('size'=>60,'maxlength'=>255, 'class' => 'event_form_text_input')); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'comment'); ?>
    <?php echo $form->error($model,'comment'); ?>
    <?php echo $form->textArea($model,'comment',array('class' => 'event_form_textarea textarea')); ?>
</div>

<div class="row">
    <?php echo $form->hiddenField($model,'parent', array('value' => $entrepreneur_id)); ?>
</div>


<div class="row">
    <?php echo CHtml::submitButton('Сохранить',
        array(
            'id' => 'create_event_submit',
        )
    ); ?>
</div>
<?php $this->endWidget(); ?>

<!-- form -->