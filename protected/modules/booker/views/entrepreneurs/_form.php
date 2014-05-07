<?php
/* @var $this EntrepreneursController */
/* @var $model Entrepreneurs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrepreneurs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_name'); ?>
		<?php echo $form->textField($model,'organization_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'organization_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_name_organization'); ?>
		<?php echo $form->textField($model,'short_name_organization',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'short_name_organization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inn'); ?>
		<?php echo $form->textField($model,'inn',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'inn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kpp'); ?>
		<?php echo $form->textField($model,'kpp',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kpp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ogrn'); ?>
		<?php echo $form->textField($model,'ogrn',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ogrn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_date'); ?>
		<?php echo $form->textField($model,'registration_date'); ?>
		<?php echo $form->error($model,'registration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_address'); ?>
		<?php echo $form->textField($model,'organization_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'organization_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'okved'); ?>
		<?php echo $form->textField($model,'okved',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'okved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'okato'); ?>
		<?php echo $form->textField($model,'okato',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'okato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'okpo'); ?>
		<?php echo $form->textField($model,'okpo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'okpo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'okfs'); ?>
		<?php echo $form->textField($model,'okfs',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'okfs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oktmo'); ?>
		<?php echo $form->textField($model,'oktmo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'oktmo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'okogu'); ?>
		<?php echo $form->textField($model,'okogu',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'okogu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'okopf'); ?>
		<?php echo $form->textField($model,'okopf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'okopf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ifns'); ?>
		<?php echo $form->textField($model,'ifns',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ifns'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prf'); ?>
		<?php echo $form->textField($model,'prf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'prf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_number_in_prf'); ?>
		<?php echo $form->textField($model,'registration_number_in_prf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'registration_number_in_prf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fss'); ?>
		<?php echo $form->textField($model,'fss',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fss'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_number_in_fss'); ?>
		<?php echo $form->textField($model,'registration_number_in_fss',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'registration_number_in_fss'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code_subordination'); ?>
		<?php echo $form->textField($model,'code_subordination',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code_subordination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'insurance_tariv_fss'); ?>
		<?php echo $form->textField($model,'insurance_tariv_fss',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'insurance_tariv_fss'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_avance'); ?>
		<?php echo $form->textField($model,'date_avance'); ?>
		<?php echo $form->error($model,'date_avance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_pay'); ?>
		<?php echo $form->textField($model,'date_pay'); ?>
		<?php echo $form->error($model,'date_pay'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->