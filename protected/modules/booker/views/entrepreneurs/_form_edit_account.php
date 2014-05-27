<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'account-form-update_' . $model->id,
    'htmlOptions' => array(
        'class' => 'account_update_form'
    ),
    'enableAjaxValidation'=>false,
    'action'=>$this->createUrl('/booker/entrepreneurs/updateaccount/', array('id' => $model->id)),
    'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:function(form,data,hasError) {
        if(!hasError) {
            $.ajax({
                "type":"POST",
                "url":"' . $this->createUrl('/booker/entrepreneurs/updateaccount/', array('id' => $model->id)) . '",
                "data":form.serialize(),
                "success":function(data) {
                    $("#table_accounting_wrapper").html(data);
                    $(".account_update_form").trigger("reset");
                    $("#load_files_'.$model->id.'").html("");
                    $(".qq-upload-list li").remove();
                }
            });
        }
    }'
    ),
)); ?>
<?php $model->comment = ''; ?>

<div class="row">
    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->error($model,'name'); ?>
    <?php echo $form->textField($model,'name',array('class' => 'account_form_text_input')); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'type'); ?>
    <?php echo $form->error($model,'type'); ?>
    <div class="select-wrap">
        <?php echo $form->dropDownList($model,'type', $type, array('width' => '206px;')); ?>
    </div>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'comment'); ?>
    <?php echo $form->error($model,'comment'); ?>
    <?php echo $form->textArea($model,'comment',array('class' => 'comment_form_textarea textarea')); ?>
</div>
<div class="row">
    <?php echo $form->checkBoxList($model,'ready', array('1' => 'Готово'), array('separator' => '', 'template' => '{label}{input}', 'labelOptions' => array('class' => 'form_label_radio'))); ?>
</div>
    <div class="load_files" id="load_files_<?php echo $model->id; ?>">

    </div>
<div class="clear"></div>
    <p class="little"><span class="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/skrep.png"><span class="span_load_doc">Загрузить докумет</span><input type="file" class="hidden" name="file"></span><span class="right">+ еще</span></p>
    <?php
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile_' . $model->id,
            'config'=>array(
                'action'=>Yii::app()->createUrl('/site/upload'),
                'allowedExtensions'=>array("jpg","jpeg","gif","exe","mov","mp4","txt","doc","pdf","xls","3gp","php","ini","avi","rar","zip","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>1000*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>1*1024,
                'auto'=>false,
                'multiple' => false,
                'onComplete'=>"js:function(id, fileName, responseJSON){
                    if(responseJSON.success == true) {
                        $('#load_files_".$model->id."').append('<input type=\"hidden\" name=\"Accounting[file][]\" value=\"' + responseJSON.filename + '\">');
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

    <?php echo $form->hiddenField($model,'parent', array('value' => $entrepreneur_id)); ?>
    <div class="row update_account_submit_wrapper">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Поставить задачу' : 'Сохранить',
        array(
            'id' => 'create_account_submit_' . $model->id,
            'class' => 'update_account_button'
        )
    ); ?>
    </div>
<?php $this->endWidget(); ?>



