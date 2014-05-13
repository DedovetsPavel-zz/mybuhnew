<?php
/* @var $this WorkersController */
/* @var $model Workers */
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
		<?php echo $form->label($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post'); ?>
		<?php echo $form->textField($model,'post',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inn'); ?>
		<?php echo $form->textField($model,'inn',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'snils'); ?>
		<?php echo $form->textField($model,'snils',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hire_date'); ?>
		<?php echo $form->textField($model,'hire_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'termination_date'); ?>
		<?php echo $form->textField($model,'termination_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay'); ?>
		<?php echo $form->textField($model,'pay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent'); ?>
		<?php echo $form->textField($model,'parent'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->