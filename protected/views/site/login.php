<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Логин';
?>

<h1>Логин</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Поля помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Вход', array('id' => 'login_but_submit')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
