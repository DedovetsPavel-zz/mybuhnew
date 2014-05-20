<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 20.05.14
 * Time: 10:55
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="enterForm">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php var_dump($model) . '12312312'; ?>



    <div class="row buttons">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

<?php $this->endWidget(); ?>

</div>