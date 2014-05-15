<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 13.05.14
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */?>
<div class="mission3">
<div class="scanLoad_event">
    <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormTop.png">
    <div class="accFormBody">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'events-form-create',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>true,
    'action'=>$this->createUrl('/booker/entrepreneurs/createevent/'),
    'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:function(form,data,hasError) {
            if(!hasError) {
                $.ajax({
                    "type":"POST",
                    "url":"' . $this->createUrl('/booker/entrepreneurs/createevent/') . '",
                    "data":form.serialize(),
                    "success":function(data) {
                    $("#table_prognozes_wrapper").html(data);
                    $("#success").html("Событие добавлено");
                    $("#events-form-create").trigger("reset");
                    // consolr.log(data);
                        /*if(data.success == 1) {
                            $("#success").html("Событие добавлено");
                            $("#events-form-create").trigger("reset");
                        } else {
                            $("#success").html("Событие не добавлено");
                        }*/
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
        <div class="input">
            <?php echo $form->textField($model,'deadline',array('class' => 'event_form_text_input calendar_input')); ?>
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
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить событие' : 'Сохранить',
            array(
//                'ajax'=>array(
//                    'type'=>'POST',
//                    'url'=>Yii::app()->createUrl('/booker/entrepreneurs/createworker/'),
//                    'dataType' => 'json',
//                    'success'=>'function(data) {
//                        $("#success").html("Добавили");
//                        console.log(data);
//                        /*var response= jQuery.parseJSON(data);
//                        $.each(response, function(index, data){
//                            $("#success").append("<p>"+data+"</p>");
//                        });*/
//
//                    }',
//                ),
                'id' => 'create_event_submit',
            )
        ); ?>
    </div>
    <?php $this->endWidget(); ?>
    </div>
    <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormBottom.png">
</div></div>
<!-- form -->