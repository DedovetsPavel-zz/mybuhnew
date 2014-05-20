<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/jquery-lightbox.css" type="text/css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/jqueryui.custom.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts/jquery.lightbox.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts/jquery.color.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/jcarousellite_1.0.1.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts/jquery.selectBox.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts/checkbox.js" type="text/javascript"></script>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->getClientScript()->registerCoreScript('yii'); ?>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
    <div class="center">
        <div class="enterForm">
            <p>Имя пользователя</p>
            <input type="text" class="input">
            <p>Пароль</p>
            <input type="text" class="input">
            <p class="little"><span class="left">Показать символы</span><span class="right">Забыли пароль?</span></p>
            <div class="button" type="button" >ОТПРАВИТЬ</div>
        </div>
        <div class="recoverForm">
            <p class="specialP">Восстановление пароля</p>
            <p>Email</p>
            <input type="text" class="input">
            <div class="button" type="button" >ВОССТАНОВИТЬ</div>
        </div>
        <div class="logo"></div>
        <div class="phones">
            <span><b>8-800-555-28-31</b><br>звонок по России бесплатный</span>
            <hr>
            <span><b>8-495-215-18-37</b><br>для Москвы</span>
        </div>

        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Главная', 'url'=>array('/')),
                array('label' => 'Как работает', 'url' => array('/')),
                array('label' => 'Вопросы и ответы', 'url' => array('/')),
                array('label' => 'Нам доверяют', 'url' => array('/')),
            ),
            'htmlOptions' => array(
                'id' => 'top_menu',
                'class' => 'mainMenu',
            ),
        )); ?>

        <?php
       // var_dump(UserIdentity::getId());
        $this->widget('zii.widgets.CMenu', array(
            'items' => array(
                //array('label' => 'Регистрация', 'url' => array('/'), 'visible'=>Yii::app()->user->isGuest),
                array('label' => Yii::app()->user->name, 'url' => array('/booker/'),'visible'=>!Yii::app()->user->isGuest),
                array('label' => 'Вход', 'url'=>array('/site/login/'), 'visible'=>Yii::app()->user->isGuest, 'itemOptions' => array('class' => 'enter')),
                array('label' => 'Выход', 'url'=>array('/site/logout'), 'itemOptions' => array('class' => 'enter'),'visible'=>!Yii::app()->user->isGuest)
            ),
            'htmlOptions' => array(
                'id' => 'enter_links',
                'class' => 'regBlock'
            )
        ));
        ?>
    </div>
</div>
<div class="body">
    <div class="center">
        <div class="accountBlock">
            <p class="accHead">Личный кабинет</p>
            <ul class="accMenu">
                <li class="active"><a href="#">Бухгалтерия</a></li>
                <li><a href="#">Отчетность</a></li>
                <li><a href="#">Прогнозы</a></li>
                <li><a href="#">Настройки</a></li>
            </ul>
            <?php echo $content; ?>
        </div>
    </div>
</div>
<div class="footer">
    <div class="center">
        <ul>
            <li><a href="#">О компании</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Условия использования</a></li>
            <li><a href="#">Помощь</a></li>
            <li><a href="#">Поддержка: 8-800-555-28-31, 8-495-215-18-37</a></li>
        </ul>
    </div>
</div>
</body>
</html>


