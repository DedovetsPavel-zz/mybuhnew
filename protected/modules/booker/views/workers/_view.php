<?php
/* @var $this WorkersController */
/* @var $data Workers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post')); ?>:</b>
	<?php echo CHtml::encode($data->post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inn')); ?>:</b>
	<?php echo CHtml::encode($data->inn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('snils')); ?>:</b>
	<?php echo CHtml::encode($data->snils); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hire_date')); ?>:</b>
	<?php echo CHtml::encode($data->hire_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('termination_date')); ?>:</b>
	<?php echo CHtml::encode($data->termination_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay')); ?>:</b>
	<?php echo CHtml::encode($data->pay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />

	*/ ?>

</div>