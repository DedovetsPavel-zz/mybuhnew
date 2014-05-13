<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 13.05.14
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */?>

<div class="scanLoad">
    <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormTop.png">
    <div class="accFormBody">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'workers-form-create',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>true,
        'action'=>$this->createUrl('/booker/entrepreneurs/createworker/'),
        //'enableClientValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:function(form,data,hasError) {
                if(!hasError) {
                  $.ajax({
                      "type":"POST",
                      "url":"' . $this->createUrl('/booker/entrepreneurs/createworker/') . '",
                      "data":form.serialize(),
                      "success":function(data) {
                          $("#success").html("Сотрудник добавлен");
                          $("#workers-form-create").trigger("reset");

                      },
                  });
                }
            }'
        ),
    )); ?>
    <div id="success"></div>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'fullname'); ?>
        <?php echo $form->error($model,'fullname'); ?>
        <?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'post'); ?>
        <?php echo $form->error($model,'post'); ?>
        <?php echo $form->textField($model,'post',array('size'=>60,'maxlength'=>255)); ?>

    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'date_of_birth'); ?>
        <?php echo $form->error($model,'date_of_birth'); ?>
        <div class="input calendar">
        <?php
        if($model->date_of_birth) {
            $date_of_birth = date('d.m.Y', $model->date_of_birth);
        } else {
            $date_of_birth = '';
        }

        echo $form->textField($model,'date_of_birth', array('value' => $date_of_birth));
        ?>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'gender'); ?>
        <?php echo $form->error($model,'gender'); ?>
        <?php echo $form->textField($model,'gender'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'inn'); ?>
        <?php echo $form->error($model,'inn'); ?>
        <?php echo $form->textField($model,'inn',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'snils'); ?>
        <?php echo $form->error($model,'snils'); ?>
        <?php echo $form->textField($model,'snils',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'hire_date'); ?>
        <?php echo $form->error($model,'hire_date'); ?>
        <div class="input calendar">
        <?php
        if($model->hire_date) {
            $hire_date = date('d.m.Y', $model->hire_date);
        } else {
            $hire_date = '';
        }
        echo $form->textField($model,'hire_date', array('value' => $hire_date));
        ?>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'termination_date'); ?>
        <?php echo $form->error($model,'termination_date'); ?>
        <div class="input calendar">
            <?php
            if($model->termination_date) {
                $termination_date = date('d.m.Y', $model->termination_date);
            } else {
                $termination_date = '';
            }
            echo $form->textField($model,'termination_date', array('value' => $termination_date));
            ?>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'pay'); ?>
        <?php echo $form->error($model,'pay'); ?>
        <?php echo $form->textField($model,'pay'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'parent'); ?>
        <?php echo $form->textField($model,'parent'); ?>
        <?php echo $form->error($model,'parent'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить сотрудника' : 'Сохранить',
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
                'id' => 'create_worker_submit',
            )
        ); ?>
    </div>

    <?php $this->endWidget(); ?>
    </div>
    <img class="misImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/accFormBottom.png">
</div><!-- form -->