<?php
/* @var $this EntrepreneursController */
/* @var $model Entrepreneurs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'organization_name'); ?>
		<?php echo $form->textField($model,'organization_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'short_name_organization'); ?>
		<?php echo $form->textField($model,'short_name_organization',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inn'); ?>
		<?php echo $form->textField($model,'inn',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kpp'); ?>
		<?php echo $form->textField($model,'kpp',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ogrn'); ?>
		<?php echo $form->textField($model,'ogrn',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_date'); ?>
		<?php echo $form->textField($model,'registration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'organization_address'); ?>
		<?php echo $form->textField($model,'organization_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'okved'); ?>
		<?php echo $form->textField($model,'okved',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'okato'); ?>
		<?php echo $form->textField($model,'okato',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'okpo'); ?>
		<?php echo $form->textField($model,'okpo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'okfs'); ?>
		<?php echo $form->textField($model,'okfs',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oktmo'); ?>
		<?php echo $form->textField($model,'oktmo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'okogu'); ?>
		<?php echo $form->textField($model,'okogu',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'okopf'); ?>
		<?php echo $form->textField($model,'okopf',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ifns'); ?>
		<?php echo $form->textField($model,'ifns',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prf'); ?>
		<?php echo $form->textField($model,'prf',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_number_in_prf'); ?>
		<?php echo $form->textField($model,'registration_number_in_prf',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fss'); ?>
		<?php echo $form->textField($model,'fss',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_number_in_fss'); ?>
		<?php echo $form->textField($model,'registration_number_in_fss',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code_subordination'); ?>
		<?php echo $form->textField($model,'code_subordination',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'insurance_tariv_fss'); ?>
		<?php echo $form->textField($model,'insurance_tariv_fss',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_avance'); ?>
		<?php echo $form->textField($model,'date_avance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_pay'); ?>
		<?php echo $form->textField($model,'date_pay'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->