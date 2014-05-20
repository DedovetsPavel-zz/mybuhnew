<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
if(Yii::app()->user->checkAccess('0')){
    echo "hello, I'm administrator";
}
?>
