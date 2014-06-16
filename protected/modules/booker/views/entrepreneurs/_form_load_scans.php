<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 28.05.14
 * Time: 11:54
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="loadForm">
    <img class="imgBlock" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/loadFormTop.png">
    <div class="bodyForm">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'form-load-scans',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>true,
            'action'=>$this->createUrl('/booker/entrepreneurs/update/', array('id' => $model->id))

        )); ?>
        <div class="load_files" id="load_files">

        </div>
        <p class="little"><span class="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/skrep.png"><span class="load_scans">Загрузить докумет</span><input type="file" class="hidden" name="file"></span><span class="right">+ еще</span></p>
        <?php
        $this->widget('ext.EAjaxUpload.EAjaxUpload',
            array(
                'id'=>'uploadFile',
                'config'=>array(
                    'action'=>Yii::app()->createUrl('/site/upload'),
                    'allowedExtensions'=>array("jpg","jpeg","gif","txt","doc","docx","pdf","xls","xlsx","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                    'sizeLimit'=>1000*1024*1024,// maximum file size in bytes
                    'minSizeLimit'=>1*1024,
                    'auto'=>false,
                    'multiple' => false,
                    'onComplete'=>"js:function(id, fileName, responseJSON){
                        if(responseJSON.success == true) {
                            $('#load_files').append('<input type=\"hidden\" name=\"scans[]\" value=\"' + responseJSON.filename + '\">');
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
        <?php echo CHtml::submitButton('Загрузить',
            array(
                'id' => 'load_scans',
            )
        ); ?>
        <?php $this->endWidget(); ?>
    </div>
    <img class="imgBlock" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/loadFormBottom.png">
</div>