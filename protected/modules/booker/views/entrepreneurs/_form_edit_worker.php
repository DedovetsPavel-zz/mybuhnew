<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 13.05.14
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'workers-form-edit_' . $model->id,
    'htmlOptions' => array(
        'class' => 'worker_update_form'
    ),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'action'=>$this->createUrl('/booker/entrepreneurs/updateworker/', array('id' => $model->id)),
    'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:function(form,data,hasError) {
            if(!hasError) {
              $.ajax({
                  "type":"POST",
                  "url":"' . $this->createUrl('/booker/entrepreneurs/updateworker/', array('id' => $model->id)) . '",
                  "data":form.serialize(),
                  "success":function(data) {
                      $("#success").html("Сотрудник добавлен");
                      $("#table_workers_wrapper").html(data);
                      $("#workers-form-create").trigger("reset");
                  },
              });
            }
        }'
    ),
)); ?>
<div class="row">
    <?php echo $form->labelEx($model,'fullname', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'fullname'); ?>
    <?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255, 'class' => 'worker_form_text_input')); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'post', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'post'); ?>
    <?php echo $form->textField($model,'post',array('size'=>60,'maxlength'=>255, 'class' => 'worker_form_text_input')); ?>

</div>

<div class="row">
    <?php echo $form->labelEx($model,'date_of_birth', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'date_of_birth'); ?>
    <div class="input calendar">
    <?php
    if($model->date_of_birth) {
        $date_of_birth = date('d.m.Y', $model->date_of_birth);
    } else {
        $date_of_birth = '';
    }

    echo $form->textField($model,'date_of_birth', array('value' => $date_of_birth, 'class' => 'worker_form_text_input', 'id' => 'date_of_birth_' . $model->id));
    ?>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
    </div>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'gender', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'gender'); ?>
    <div class="gender">
    <?php echo $form->radioButtonList($model,'gender', array('1' => 'М.', '2' => 'Ж.'), array('separator' => '', 'template' => '{label}{input}', 'labelOptions' => array('class' => 'form_label_radio'))); ?>
        <div class="clear"></div>
    </div>

</div>

<div class="row">
    <?php echo $form->labelEx($model,'inn', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'inn'); ?>
    <?php echo $form->textField($model,'inn',array('size'=>60,'maxlength'=>255, 'class' => 'worker_form_text_input')); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'snils', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'snils'); ?>
    <?php echo $form->textField($model,'snils',array('size'=>60,'maxlength'=>255, 'class' => 'worker_form_text_input')); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'hire_date', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'hire_date'); ?>
    <div class="input calendar">
    <?php
    if($model->hire_date) {
        $hire_date = date('d.m.Y', $model->hire_date);
    } else {
        $hire_date = '';
    }
    echo $form->textField($model,'hire_date', array('value' => $hire_date, 'class' => 'worker_form_text_input', 'id' => 'hire_date_' . $model->id));
    ?>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
    </div>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'termination_date', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'termination_date'); ?>
    <div class="input calendar">
        <?php
        if($model->termination_date) {
            $termination_date = date('d.m.Y', $model->termination_date);
        } else {
            $termination_date = '';
        }
        echo $form->textField($model,'termination_date', array('value' => $termination_date, 'class' => 'worker_form_text_input', 'id' => 'termination_date_' . $model->id));
        ?>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/calendar.png">
    </div>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'pay', array('class' => 'edit_worker_label')); ?>
    <?php echo $form->error($model,'pay'); ?>
    <?php echo $form->textField($model,'pay', array('class' => 'worker_form_text_input')); ?>
</div>

<div class="row">
    <?php echo $form->hiddenField($model,'parent', array('value' => $entrepreneur_id)); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить сотрудника' : 'Сохранить',
        array(
            'id' => 'create_worker_submit_' . $model->id,
            'class' => 'update_worker_button'
        )
    ); ?>
</div>
<?php $this->endWidget(); ?>

