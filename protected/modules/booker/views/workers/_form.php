<?php
/* @var $this WorkersController */
/* @var $model Workers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'workers-form11111',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
    'action'=>$this->createUrl('/booker/workers/create/'),
    'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post'); ?>
		<?php echo $form->textField($model,'post',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender'); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inn'); ?>
		<?php echo $form->textField($model,'inn',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'inn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'snils'); ?>
		<?php echo $form->textField($model,'snils',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'snils'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hire_date'); ?>
		<?php echo $form->textField($model,'hire_date'); ?>
		<?php echo $form->error($model,'hire_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'termination_date'); ?>
		<?php echo $form->textField($model,'termination_date'); ?>
		<?php echo $form->error($model,'termination_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay'); ?>
		<?php echo $form->textField($model,'pay'); ?>
		<?php echo $form->error($model,'pay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent'); ?>
		<?php echo $form->textField($model,'parent'); ?>
		<?php echo $form->error($model,'parent'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->