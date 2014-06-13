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
                        $("#load_files").html("");
                        $(".qq-upload-list li").remove();
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
        <div class="row report_form_radio_wrap">
            <div class="leftAndRight">
                <?php echo $form->error($model,'pay'); ?>
                <?php echo $form->checkBoxList($model,'pay', array('1' => 'Оплачено'), array('separator' => '', 'template' => '{label}{input}', 'labelOptions' => array('class' => 'form_label_radio'))); ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
                <?php echo $form->labelEx($model,'status'); ?>
                <?php echo $form->error($model,'status'); ?>
            <div class="selector">
                <?php echo $form->hiddenField($model,'status'); ?>
                <input id="status_text" class="report_form_text_input" type="text" name="status_text">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/select.png">
                <ul class="checkme">
                    <li data-value="1">Согласовано</li>
                    <li data-value="2">Ожидает подтверждения</li>
                    <li data-value="3">Отправлено в налоговую</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <?php echo $form->hiddenField($model,'parent', array('value' => $entrepreneur_id)); ?>
        </div>
        <div class="load_files" id="load_files">

        </div>
        <p class="little"><span class="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/skrep.png"><span>Загрузить докумет</span><input type="file" class="hidden" name="file"></span><span class="right">+ еще</span></p>
        <?php
        $this->widget('ext.EAjaxUpload.EAjaxUpload',
            array(
                'id'=>'uploadFile',
                'config'=>array(
                    'action'=>Yii::app()->createUrl('/site/upload'),
                    'allowedExtensions'=>array("jpg","jpeg","gif","exe","mov","mp4","txt","doc","pdf","xls","3gp","php","ini","avi","rar","zip","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                    'sizeLimit'=>1000*1024*1024,// maximum file size in bytes
                    'minSizeLimit'=>1*1024,
                    'auto'=>false,
                    'multiple' => false,
                    'onComplete'=>"js:function(id, fileName, responseJSON){
                        if(responseJSON.success == true) {
                            $('#load_files').append('<input type=\"hidden\" name=\"Reports[file][]\" value=\"' + responseJSON.filename + '\">');
                        }
                     }",
                    'messages'=>array(
                        'typeError'=>"{file} не допустимое расширение. Только {extensions} разрешены.",
                        'sizeError'=>"{file} очень большой, максимальный размер файла {sizeLimit}.",
                        'minSizeError'=>"{file} очень маленький, минимальный размер файла {minSizeLimit}.",
                        'emptyError'=>"{file} пуст, пожалуйста выберите файлы и повторите снова.",
                        'onLeave'=>"Файл загружается, если вы оставите сейчас загрузка будет отменена."
                    ),
                    'showMessage'=>"js:function(message){ alert(message); }"
                )
            ));
        ?>
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