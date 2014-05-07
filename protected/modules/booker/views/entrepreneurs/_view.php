<?php
/* @var $this EntrepreneursController */
/* @var $data Entrepreneurs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_name')); ?>:</b>
	<?php echo CHtml::encode($data->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('short_name_organization')); ?>:</b>
	<?php echo CHtml::encode($data->short_name_organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inn')); ?>:</b>
	<?php echo CHtml::encode($data->inn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kpp')); ?>:</b>
	<?php echo CHtml::encode($data->kpp); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ogrn')); ?>:</b>
	<?php echo CHtml::encode($data->ogrn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_date')); ?>:</b>
	<?php echo CHtml::encode($data->registration_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_address')); ?>:</b>
	<?php echo CHtml::encode($data->organization_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okved')); ?>:</b>
	<?php echo CHtml::encode($data->okved); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okato')); ?>:</b>
	<?php echo CHtml::encode($data->okato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okpo')); ?>:</b>
	<?php echo CHtml::encode($data->okpo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okfs')); ?>:</b>
	<?php echo CHtml::encode($data->okfs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oktmo')); ?>:</b>
	<?php echo CHtml::encode($data->oktmo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okogu')); ?>:</b>
	<?php echo CHtml::encode($data->okogu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okopf')); ?>:</b>
	<?php echo CHtml::encode($data->okopf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ifns')); ?>:</b>
	<?php echo CHtml::encode($data->ifns); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prf')); ?>:</b>
	<?php echo CHtml::encode($data->prf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_number_in_prf')); ?>:</b>
	<?php echo CHtml::encode($data->registration_number_in_prf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fss')); ?>:</b>
	<?php echo CHtml::encode($data->fss); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_number_in_fss')); ?>:</b>
	<?php echo CHtml::encode($data->registration_number_in_fss); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_subordination')); ?>:</b>
	<?php echo CHtml::encode($data->code_subordination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insurance_tariv_fss')); ?>:</b>
	<?php echo CHtml::encode($data->insurance_tariv_fss); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_avance')); ?>:</b>
	<?php echo CHtml::encode($data->date_avance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_pay')); ?>:</b>
	<?php echo CHtml::encode($data->date_pay); ?>
	<br />

	*/ ?>

</div>