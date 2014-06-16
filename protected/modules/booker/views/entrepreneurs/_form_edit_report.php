<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 13.05.14
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'report-form-update_' . $model->id,
    'htmlOptions' => array(
        'class' => 'report_update_form'
    ),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'action'=>$this->createUrl('/booker/entrepreneurs/updatereport/', array('id' => $model->id)),
    'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:function(form,data,hasError) {
        if(!hasError) {
            $.ajax({
                "type":"POST",
                "url":"' . $this->createUrl('/booker/entrepreneurs/updatereport/', array('id' => $model->id)) . '",
                "data":form.serialize(),
                "success":function(data) {
                    $("#table_reports_wrapper").html(data);
                }
            });
        }
    }'
    ),
)); ?>
<div class="row">
    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->error($model,'name'); ?>
    <?php echo $form->textField($model,'name',array('class' => 'account_form_text_input')); ?>
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
    <div class="select-wrap">
        <?php echo $form->dropDownList($model,'type', array('1' => 'Согласовано', '2' => 'Ожидает подтверждения', '3' => 'Отправлено в налоговую'), array('width' => '206px;', 'class' => 'drop_down_list')); ?>
    </div>
</div>
<div class="row">
    <?php echo $form->hiddenField($model,'parent', array('value' => $entrepreneur_id)); ?>
</div>
<div class="load_files" id="load_files_<?php echo $model->id; ?>">

</div>
<p class="little"><span class="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/skrep.png"><span class="span_load_doc">Загрузить докумет</span><input type="file" class="hidden" name="file"></span><span class="right">+ еще</span></p>
<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        'id'=>'uploadFile_' . $model->id,
        'config'=>array(
            'action'=>Yii::app()->createUrl('/site/upload'),
            'allowedExtensions'=>array("jpg","jpeg","gif","txt","doc","docx","pdf","xls","xlsx","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
            'sizeLimit'=>1000*1024*1024,// maximum file size in bytes
            'minSizeLimit'=>1*1024,
            'auto'=>false,
            'multiple' => false,
            'onComplete'=>"js:function(id, fileName, responseJSON){
                if(responseJSON.success == true) {
                   $('#load_files_".$model->id."').append('<input type=\"hidden\" name=\"Reports[file][]\" value=\"' + responseJSON.filename + '\">');
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
<div class="row update_report_submit_wrapper">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить отчетность' : 'Сохранить',
        array(
            'id' => 'create_report_submit',
        )
    ); ?>
</div>
<?php $this->endWidget(); ?>
