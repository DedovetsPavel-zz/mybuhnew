<div class="form">
    <? $form = $this->beginWidget('CActiveForm', array(
        'id' => 'subscribe-form',
        'action' => CHtml::normalizeUrl(array("site/subscribe")),
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:function(form,data,hasError) {
                if(!hasError) {
                  $.ajax(
                  {
                    "type":"POST",
                    "url":"' . CHtml::normalizeUrl(array("site/subscribe")) . '",
                    "data":form.serialize(),
                    "success":function(data)
                        {
                          $("#success").html("Вы подписаны на обновления.");
                        },
                  });
                }
            }'
        ),
    ));
    ?>
    <div id="success"></div>
    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row buttons">
        <? echo CHtml::submitButton('Подписаться'); ?>
    </div>

    <? $this->endWidget(); ?>
</div>