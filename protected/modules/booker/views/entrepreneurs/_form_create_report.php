<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 13.05.14
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */?>
<div class="mission2">
    <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormTop.png">
    <div class="accFormBody">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'report-form-create',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>true,
            'action'=>$this->createUrl('/booker/entrepreneurs/createreport/'),
            'enableClientValidation'=>true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'afterValidate' => 'js:function(form,data,hasError) {
                if(!hasError) {
                    $.ajax({
                        "type":"POST",
                        "url":"' . $this->createUrl('/booker/entrepreneurs/createreport/') . '",
                        "data":form.serialize(),
                        "success":function(data) {
                        $("#table_reports_wrapper").html(data);
                        $("#success").html("Событие добавлено");
                        $("#report-form-create").trigger("reset");
                        // consolr.log(data);
                            /*if(data.success == 1) {
                                $("#success").html("Событие добавлено");
                                $("#report-form-create").trigger("reset");
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
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->error($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('class' => 'report_form_text_input')); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'comment'); ?>
            <?php echo $form->error($model,'comment'); ?>
            <?php echo $form->textArea($model,'comment',array('class' => 'report_form_textarea textarea')); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'status'); ?>
            <?php echo $form->error($model,'status'); ?>
            <?php echo $form->textField($model,'status',array('class' => 'report_form_text_input')); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'pay'); ?>
            <?php echo $form->error($model,'pay'); ?>
            <?php echo $form->textField($model,'pay',array('class' => 'report_form_text_input')); ?>
        </div>
        <div class="row">
            <?php echo $form->hiddenField($model,'parent', array('value' => $entrepreneur_id)); ?>
        </div>
        <p class="little"><span class="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/skrep.png"><span>Загрузить докумет</span><input type="file" class="hidden" name="file"></span><span class="right">+ еще</span></p>
        <div class="row">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить отчетность' : 'Сохранить',
                array(
                    'id' => 'create_report_submit',
                )
            ); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormBottom.png">
</div>