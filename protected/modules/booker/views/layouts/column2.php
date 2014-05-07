<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div id="top_tabs">
    <?php
//    $this->beginWidget('zii.widgets.CPortlet', array(
//        'title'=>'Операции',
//    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'accMenu'),
    ));
//    $this->endWidget();
    ?>
</div><!-- sidebar -->
<div id="content_cabinet">
    <?php echo $content; ?>
</div><!-- content -->


<?php $this->endContent(); ?>