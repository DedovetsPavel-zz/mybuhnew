<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/jquery-lightbox.css" type="text/css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts/jquery-1.4.2.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts/jquery.lightbox.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/scripts/jquery.color.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/jcarousellite_1.0.1.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
    <div class="center">
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
        <?php $this->widget('zii.widgets.CMenu', array(
            'items' => array(
                array('label' => Yii::app()->user->name, 'url' => array('/booker/')),
                array('label' => 'Выход', 'url'=>array('/site/logout'), 'itemOptions' => array('class' => 'enter'),'visible'=>!Yii::app()->user->isGuest)
            ),
            'htmlOptions' => array(
                'id' => 'enter_links',
                'class' => 'logoutBlock'
            )
        ));
        ?>
    </div>
</div>
<div class="body">
    <div class="center">
        <div class="accountBlock">
            <p class="accHead">Клиенты</p>
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
<script>
    $(document).ready(function(){
        $(".littleBlock .button").click(function(){
            $(".blackbg").fadeIn(500);
            $(".enterForm").fadeOut(500);
            $(".regForm").fadeOut(500);
            $(".recoverForm").fadeOut(500);
        });

        $(".blackbg .close").click(function(){
            $(".blackbg").fadeOut(500);
        });

        $(".regBlock .enter").click(function(){

            $(".recoverForm").fadeOut(500);
            if (!$(this).attr("open"))            {
                $(".enterForm").fadeIn(500);
                $(this).attr("open","on");
            }
            else
            {
                $(".enterForm").fadeOut(500);
                $(this).removeAttr("open");
            }
        });

        $(".little .right").click(function(){
            $(".recoverForm").fadeIn(500);
            $(".enterForm").fadeOut(500);
        });

        $(".regBlock li:first").click(function(){
            if (!$(this).attr("open"))
            {
                $(".regForm").fadeIn(500);
                $(this).attr("open","on");
            }
            else
            {
                $(".regForm").fadeOut(500);
                $(this).removeAttr("open");
            }

        });


        $(".tarifBlock .selector").click(function(){
            if (!$(this).attr("open"))
            {
                $(this).find(".checkme").css("display","block");
                $(this).attr("open","on");
            }
            else
            {
                $(this).find(".checkme").css("display","none");
                $(this).removeAttr("open");
            }

        });

        $(".tarifBlock .selector .checkme li").click(function(){
            var current = $(this).html();
            $(this).parents(".selector").find("input").val(current);
            $(this).find(".checkme").css("display","none");
            $(this).removeAttr("open");
        });

        $(".carousel").jCarouselLite({
            btnNext: ".right",
            btnPrev: ".left"
        });

        $(".carousel ul li a").lightbox();

        $(".tarifBlock .filds .button").click(function(){
            $(".tarifBg").fadeIn(500);

        });

        $(".tarifBg .close").click(function(){
            $(".tarifBg").fadeOut(500);
        });
    });
</script>
</body>
</html>






