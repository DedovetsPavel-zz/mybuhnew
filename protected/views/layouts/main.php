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
<div class="blackbg">
    <form method="post">
        <div class="close"></div>
        <ul>
            <li>
                <p>Ваше имя</p>
                <input class="text" type="text">
            </li>
            <li>
                <p>Номер телефона</p>
                <input class="text" type="text">
            </li>
            <li>
                <div class="button" type="button" >ОТПРАВИТЬ</div>
            </li>
        </ul>
    </form>
</div>
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
        <div class="regForm">
            <p>Email</p>
            <input type="text" class="input">
            <p>Пароль</p>
            <input type="text" class="input">
            <p>Повторите пароль</p>
            <input type="text" class="input">
            <p>Телефонный номер</p>
            <input type="text" class="input">
            <div class="button" type="button" >ЗАРЕГИСТРИРОВАТЬСЯ</div>
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

        <?php $this->widget('zii.widgets.CMenu', array(
            'items' => array(
                array('label' => 'Регистрация', 'url' => array('/')),
                array('label' => 'Вход', 'url' => array('/'), 'itemOptions' => array('class' => 'enter'), 'linkOptions' => array('onclick' => 'return false;'))
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
<div class="bigLines"></div>
<div class="bannerBlock">
    <div class="line">Профессиональное бухгалтерское обслуживание</div>
    <div class="littleBlock">
        <ul>
            <li class="fli">Бухгалтерский учет</li>
            <li class="tli">Юридические услуги</li>
            <li class="thli">Регистрация фирм</li>
            <li class="foli">Online доступ</li>
            <li class="fili">Сдача отчетности</li>
            <li class="sili">Мобильное приложение</li>
        </ul>
        <div class="fift"></div>
        <p>экономии денег<br> на зарплатах<br> штатным бухгалтерам</p>
        <div class="button">отправить заявку</div>
    </div>
</div>
<div class="forBlock">
    <p class="blockHead">Для кого создан сервис</p>
    <ul>
        <li class="fli">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/who1.png">
            <p class="headerLi">Для стартапа</p>
            <p class="bodyLi">Творите, создавайте, исполняйте свои мечты и планы, а рутинную бухгалтерию оставьте нам, ведь ничто так не убивает вдохновение,
                как скучные обязательства и однообразная работа.</p>
        </li>
        <li class="sli">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/who2.png">
            <p class="headerLi">Для небольших компаний</p>
            <p class="bodyLi">Вкладывайте деньги в бизнес, вместо раздутого штата: удалённые бухгалтеры так же хорошо решают все вопросы, как и кадровые
                специалисты, только в два раза дешевле и без налогов на сотрудников.</p>
        </li>
        <li class="tli">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/who3.png">
            <p class="headerLi">Для растущих компаний</p>
            <p class="bodyLi">Когда бизнес стремительно растёт, он требует полной самоотдачи и внимания, поэтому не отвлекайтесь на те дела, которые
                успешно может решить наша компания: мы сами всё посчитаем, сведём и составим отчётность.</p>
        </li>
    </ul>
</div>
<div class="whyBlock">
    <p class="blockHead">Почему именно мы</p>
    <ul>
        <li class="fli">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/why1.png">
            <p class="headerLi">Компетентные решения</p>
            <p class="bodyLi">Мы постоянно следим за изменениями в налоговом праве и чётко исполняем взятые на себя обязательства.</p>
        </li>
        <li class="sli">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/why2.png">
            <p class="headerLi">Индивидуальный подход</p>
            <p class="bodyLi">В любом вопросе, связанном с бухгалтерией, мы опираемся на букву закона, но действуем, исходя из особенностей вашего бизнеса.</p>
        </li>
        <li class="tli">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/why3.png">
            <p class="headerLi">Безопасность</p>
            <p class="bodyLi">Вы не несёте никаких рисков: мы заботимся о конфиденциальности Ваших данных и несём ответственность за предоставленные услуги.</p>
        </li>
    </ul>
</div>
<div class="howBlock">
    <p class="blockHead"> Как мы работаем</p>
    <div class="macs"></div>
    <ul>
        <li>
            <div class="step1"></div>
            <p class="headerLi">Предприниматель</p>
        </li>
        <li class="arrow"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/arrow.png"></li>
        <li>
            <div class="step2"></div>
            <p class="headerLi">Сервис<br>«Мой бухгалтер»</p>
        </li>
        <li class="arrow"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/arrow.png"></li>
        <li>
            <div class="step3"></div>
            <p class="headerLi">Бухгалтер</p>
        </li>
        <li class="arrow"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/arrow.png"></li>
        <li>
            <div class="step4"></div>
            <p class="headerLi">Налоговая <br>служба</p>
        </li>
    </ul>
</div>
<div class="tarifBlock">
    <p class="blockHead">НАШИ ТАРИФЫ</p>
    <ul class="steps">
        <li>
            <div class="step1"></div>
            <p class="headerLi">Бухгалтер</p>
        </li>
        <li class="plus"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/plus.png"></li>
        <li>
            <div class="step2"></div>
            <p class="headerLi">Доступ в сервис<br> «Мой бухгалтер»</p>
        </li>
        <li class="plus"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/plus.png"></li>
        <li>
            <div class="step3"></div>
            <p class="headerLi">Сдача деклараций<br> в налоговую службу</p>
        </li>
    </ul>
    <div class="bigArrow"></div>
    <div class="filds">
        <ul>
            <li><p>Форма<br>деятельности</p>
                <div class="selector">
                    <input type="text">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/select.png">
                    <ul class="checkme">
                        <li>Вариант1</li>
                        <li>Вариант2</li>
                        <li>Вариант3</li>
                        <li>Вариант4</li>
                        <li>Вариант5</li>
                        <li>Вариант6</li>
                    </ul>
                </div>
            </li>
            <li><p>Система<br>налогообложения</p>
                <div class="selector">
                    <input type="text">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/select.png">
                    <ul class="checkme">
                        <li>Вариант1</li>
                        <li>Вариант2</li>
                        <li>Вариант3</li>
                        <li>Вариант4</li>
                        <li>Вариант5</li>
                        <li>Вариант6</li>
                    </ul>
                </div>
            </li>
            <li><p>Ведете<br>деятельность</p>
                <div class="selector">
                    <input type="text">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/select.png">
                    <ul class="checkme">
                        <li>Вариант1</li>
                        <li>Вариант2</li>
                        <li>Вариант3</li>
                        <li>Вариант4</li>
                        <li>Вариант5</li>
                        <li>Вариант6</li>
                    </ul>
                </div>
            </li>
            <li><p>Количество<br>сотрудников</p><input class="input"></li>
            <li><p>Количество<br>документов в месяц</p><input class="input"></li>
            <li class="specialLi"><p>Стоимость обслуживания<br><span>20 000 РУБ. МЕС.</span></p><div class="button">Что входит <br>в тарифный палан?</div></li>
        </ul>
        <div class="tarifBg">
            <div class="close">Х</div>
            <p>1. Подготовка и сдача через интернет отчетности в ИФНС, ФСС и ПФР</p>
            <p>2. Ведение типовой минимально необходимой кадровой документации по сотрудникам (если число сотрудников не превышает предел тарифного плана): приказы о приеме,
                увольнении, ведение личных карточек, а также регулярный расчет заработной платы и подготовка платежных поручений на выплаты заработной платы и НДФЛ.</p>
            <p>3. Внесение в бухгалтерскую программу всех необходимых бухгалтерских записей в соответствии с предоставленными Клиентом первичными документами и иными</p>
            поручениями (при условии, что число этих записей не превышает предел, установленный тарифным планом)
            <p>4. Составление учетной политики (кроме тарифных планов для клиентов с "нулевой отчетностью")</p>
        </div>
    </div>
    <div class="sendMessage">ОТПРАВИТЬ ЗАЯВКУ</div>
    <p class="messDescript">Вы можете позвонить нам и узнать условия бухгалтерского обслуживания прямо сейчас по телефону 8-800-555-28-31 (бесплатно для регионов России),
        8-495-215-18-37 (для Москвы)</p>
</div>
<div class="ourBlock">
    <p class="blockHead">НАШИ ОТЛИЧИЯ</p>
    <ul>
        <li>
            <div class="step1"></div>
            <p class="headerLi">С  нами более 5000 предпринимателей</p>
        </li>
        <li>
            <div class="step2"></div>
            <p class="headerLi">Удобный способ обмена информацией</p>
        </li>
        <li>
            <div class="step3"></div>
            <p class="headerLi">Серьезная компания</p>
        </li>
    </ul>
    <ul class="nextUl">
        <li>
            <div class="step4"></div>
            <p class="headerLi">Мобильное приложение</p>
        </li>
        <li>
            <div class="step5"></div>
            <p class="headerLi">Наши риски застрахованы</p>
        </li>
        <li>
            <div class="step6"></div>
            <p class="headerLi">Профессиональные сотрудники</p>
        </li>
    </ul>
</div>
<div class="faqBlock">
    <p class="blockHead">Часто задаваемые вопросы</p>
    <div class="blockBody">
        <ul>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Что такое аутсорсинг бухгалтерии?</span></p>
                <p class="body">- Это полноценный комплекс услуг по бухгалтерии, оказываемый удалённо, то есть компанией-аутсорсером. В первую очередь он интересен компаниям, которые хотят сократить издержки на содержании собственной бухгалтерии и получить при этом полноценное обслуживание. Наряду с главными преимуществами аутсорсинга бухгалтерии, как экономия средств, оперативность действий, а также круглогодичная поддержка без выходных, вы получаете ещё одно — освобождение собственных ресурсов и времени для развития компании.</p>
            </li>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Чем аутсорсинг бухучета лучше бухгалтера?</span></p>
                <p class="body">- Во-первых, вы сокращаете затраты на содержание штатного сотрудника: экономите на отчислениях с фонда оплаты труда, создании рабочего места, отпускных и прочих платежах. Во-вторых, не зависите от больничных и отпусков своего специалиста: мы работаем постоянно. В-третьих, заказывая удалённое бухгалтерское обслуживание, вы «нанимаете» сразу команду специалистов, но платите при этом в два раза меньше, чем средняя зарплата штатного бухгалтера. </p>
            </li>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Какие документы и данные нужны для начала работы по бухгалтерскому обслуживанию?</span></p>
                <p class="body">- Для компании: ФИО директора (гл. бухгалтера), реквизиты (адрес, контактный телефон для отчётности, банковские реквизиты), свидетельство ИНН и ОГРН, выписка из ЕГРЮЛ, режим налогообложения (ОСНО, ЕНВД, УСН 6 или 15%), уведомление из ФСС и ПФР о присвоении регистрационного номера, коды статистики и информация о способе взноса в уставной капитал: денежным переводом, орг.техникой, мебелью и т.п.? Для ИП: ФИО директора (гл. бухгалтера), все реквизиты (адрес, контактный телефон для отчётности, банковские реквизиты), свидетельство ИНН и ОГРНИП, выписка из ЕГРИП, режим налогообложения (ОСНО, ЕНВД, УСН 6 или 15%), уведомление из ФСС и ПФР о присвоении регистрационного номера и коды статистики. </p>
            </li>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Как происходит взаимодействие с бухгалтером сервиса «Мой бухгалтер»?</span></p>
                <p class="body">- Всё общение происходит любыми доступными средствами: через личный кабинет сервиса, по электронной почте, телефону. В личном кабинете вы загружаете сканы документов, ставите задачи бухгалтеру, отслеживаете работу бухгалтера, а также можете ознакомиться с ближайшими налоговыми событиями (функция «Прогнозы»). В случае возникновения вопросов по бухгалтерии, вы всегда можете связаться с нами по телефонам и получить консультацию. Вы загружаете здесь необходимые сканы документов, можете контролировать отсюда ход выполнения отчётов, согласуете по мере необходимости декларации, получаете информацию о ближайших налоговых выплатах, ставите задачи бухгалтеру. </p>
            </li>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Сколько стоит ведение бухгалтерского учета?</span></p>
                <p class="body">- Стоимость бухгалтерского обслуживания рассчитывается индивидуально для каждого предприятия, исходя из тарифа обслуживания. На формирование цены влияют: объем документооборота, режим налогообложения, количество сотрудников и прочие факторы. При этом у нас конкурентоспособные расценки и в конечном итоге оказываются гораздо ниже затрат на штатного бухгалтера. Воспользуйтесь нашим онлайн калькулятором, чтобы убедиться в этом.</p>
            </li>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Какие гарантии дает компания?</span></p>
                <p class="body">- Наша компания гарантирует правильность ведения бухгалтерского и налогового учёта, своевременную подготовку и сдачу отчетности, а также высокий уровень сервисного обслуживания и конфиденциальности. С каждым клиентом мы заключаем договор, в котором предусмотрена компенсация штрафных санкций со стороны аутсорсера в случае ошибочного ведения бухучёта, в т.ч. штрафов, начисленных налоговой инспекций за несвоевременное предоставление деклараций, некорректно указанных сумм налогов и т.д. Исключением являются случаи, если начисление штрафов происходит по вине организации-заказчика (несвоевременное предоставление аутсорсеру первичной документации, отказ от уплаты налогов и других предусмотренных законодательством обязательных процедур). </p>
            </li>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Какова ответственность сервиса «Мой бухгалтер»?</span></p>
                <p class="body">- Компания несёт ответственность за правильность ведения бухгалтерского и налогового учета, своевременную подготовку и сдачу отчетности, хранение документов, формирование и передачу обработанных документов заказчику. Степень и мера ответственности компании фиксируется в договоре.</p>
            </li>
            <li>
                <p class="header"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/quest.png"><span>Как гарантируется конфиденциальность?</span></p>
                <p class="body">- Информация о вашей компании является конфиденциальной и не передаётся третьим лицам, включая налоговые органы. В крайнем случае любое предоставление данных согласовывается с руководством предприятия. Все требования по обеспечению конфиденциальности также включены в условия договора на обслуживание.</p>
            </li>
        </ul>
    </div>
    <div class="footerBlock"></div>
</div>
<div class="clientsBlock">
    <p class="blockHead">НАШИ КЛИЕНТЫ</p>
    <ul>
        <li>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/man4.png">
            <div class="textBlock">
                <p class="name">Дубовсков Андрей Анатольевич — президент ОАО "МТС"</p>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
            </div>
        </li>
        <li>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/1.png">
            <div class="textBlock">
                <p class="name">Дубовсков Андрей Анатольевич — президент ОАО "МТС"</p>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
            </div>
        </li>
        <li>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/2.png">
            <div class="textBlock">
                <p class="name">Дубовсков Андрей Анатольевич — президент ОАО "МТС"</p>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
            </div>
        </li>
        <li>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/man.png">
            <div class="textBlock">
                <p class="name">Дубовсков Андрей Анатольевич — президент ОАО "МТС"</p>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
            </div>
        </li>
    </ul>
</div>
<div class="helpBlock">
    <p class="blockHead">В помощь предпринимателю</p>
    <div class="leftBlock">
        <div class="whiteContain">
            <a href="#"><div class="book1"></div></a>
            <a href="#"><div class="book2"></div></a>
            <a href="#"><div class="book3"></div></a>
            <a href="#"><div class="book4"></div></a>
            <a href="#"><div class="book5"></div></a>
            <a href="#"><div class="book6"></div></a>
            <div class="polka"></div>
        </div>
        <div class="miniHead">статьи</div>
    </div>
    <div class="rightBlock">
        <div class="whiteContain">
            <div class="inline">
                <a href="#"><div class="pop1">Налоги</div></a>
                <a href="#"><div class="pop2">Учет</div></a>
                <a href="#"><div class="pop3">Отравслевой учет</div></a>
                <a href="#"><div class="pop4">Кадровое дело</div></a>
            </div>
            <div class="inline">
                <a href="#"><div class="pop5">Договоры, иски</div></a>
                <a href="#"><div class="pop6">Личная бухгалтерия</div></a>
            </div>
            <div class="polka"></div>
        </div>
        <div class="miniHead">Формы бланков</div>
    </div>
</div>
<div class="calendarBlock">
    <p class="blockHead">Не забудь! Ближайшие даты отчетности</p>
    <div class="leftBlock">
        <ul class="ooo">
            <li>ООО</li>
            <li class="active">ИП</li>
        </ul>
        <ul class="activity">
            <li><span>1 Апреля</span> подать сведения <br>по форме 2-НДФЛ за 2013 год</li>
            <li><span>15 апреля</span> сдача отчета 4-ФСС <br>за работников за I квартал 2014 года</li>
            <li><span>15 Апреля</span> заплатить страховые взносы<br>за работников в ПФР, ФФОМС и ФСС за март 2014 года</li>
            <li><span>21 апреля</span> сдача декларации ЕНВД<br>за квартал 2014 года</li>
        </ul>
        <a class="next" href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/plus2.png">Читать далее</a>
    </div>
    <div class="rightBlock">
        <div class="calendarHead">15 мая</div>
        <div class="calBg">
            <table class="calendarBody">
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>14</td>
                    <td class="active">15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="sertBlock">
    <p class="blockHead">Наши сертификаты</p>
    <div class="container">
        <div class="left"></div>
        <div class="carousel">
            <ul>
                <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/sert.png"><a href="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/sert.png" class="zoom"></a></li>
                <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/sert2.png"><a href="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/sert2.png" class="zoom"></a></li>
                <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/sert3.png"><a href="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/sert3.png" class="zoom"></a></li>
            </ul>
        </div>
        <div class="right"></div>
    </div>
</div>
<div class="messageBlock">
    <p class="blockHead">Оставь заявку</p>
    <div class="firstString">
        <p>Если вы сомневаетесь, мы Вам можем предложить 1 месяц бесплатного обслуживания. (При условии, что Вы ООО и у Вас есть сотрудники) Вы можете зайти
            и посмотреть личный кабинет.</p>
        <div class="button">ПОСМОТРЕТЬ КАБИНЕТ</div>
    </div>
    <p class="secondString">Если у вас есть вопрос по поводу ведения бухгалтерии, Вы можете оставить заявку на сайте и мы Вам на него ответим</p>
    <div class="thirdString">
        <div class="button">ОТПРАВИТЬ ЗАЯВКУ</div>
        <p>Вы можете позвонить нам и узнать условия бухгалтерского обслуживания прямо сейчас по телефону 8-800-555-28-31 (бесплатно для регионов России),
            8-495-215-18-37 (для Москвы)</p>
    </div>
</div>
<div class="officeBlock">
    <p class="blockHead">Добро пожаловать к нам в офис</p>
    <ul class="phot">
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/phot1.png"></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/phot2.png"></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/phot3.png"></li>
    </ul>
</div>
<div class="mapBlock">
    <div class="form">
        <p class="adress">Юридический адрес:</p>
        <p>115191, г. Москва<br> ул.Тульская Б., 44,<br> помещение №5</p>
        <p>ОГРН 1127747079888<br>ИНН 7726707272</p>
        <p class="phone">8-800-555-28-31</p>
        <p class="phone">8-495-215-18-37</p>
    </div>
</div>
<div class="teamBlock">
    <p class="blockHead">Наша команда профессионалов</p>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/buhland/images/ourTeam.png">
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

            if (!$(this).attr("open"))
            {
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


