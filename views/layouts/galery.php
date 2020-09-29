<?php

use app\assets\AppAsset;
use app\assets\GaleryAsset;
use yii\helpers\Html;
use yii\widgets\Pjax;
//use y/ii\widgets\Spaceless;
GaleryAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php //Spaceless::begin(); // удаляет пробелы между HTML тегами?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <?php $this->head() ?>
    <!--Yandex.Metrika counter--><script type="text/javascript">(function(d,w,c){(w[c]=w[c]||[]).push(function(){try{w.yaCounter49770670=new Ya.Metrika2({id:49770670,clickmap:true,trackLinks:true,accurateTrackBounce:true})}catch(e){}});var n=d.getElementsByTagName("script")[0],s=d.createElement("script"),f=function(){n.parentNode.insertBefore(s,n)};s.type="text/javascript";s.async=true;s.src="https://mc.yandex.ru/metrika/tag.js";if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",f,false)}else{f()}})(document,window,"yandex_metrika_callbacks2");</script><noscript><div><img src="https://mc.yandex.ru/watch/49770670"style="position:absolute; left:-9999px;"alt=""/></div></noscript>
</head>
<body>
<!--<div class="designer-box pjax"><a rel="nofollow" href="/designer">вызвать замерщика</a></div>-->
<!--    -->
<a href="/call" data-tooltip="Оставьте свой номер телефона и мы перезвоним Вам" data-placement="right" class="pjax" rel="nofollow" id="popup__toggle">
    <div class="circlephone" style="transform-origin: center;"></div>
    <div class="circle-fill" style="transform-origin: center;">
    </div><div class="img-circle" style="transform-origin: center;">
        <div class="img-circleblock" style="transform-origin: center;"></div>
    </div>
</a>
<!--    -->
<div id="scroller"><i class="fa fa-angle-up"></i></div>
<?php Pjax::begin(
    [
        'clientOptions' => [
            'method' => 'GET',
            'data-pjax-container' => '#mail_box',
        ],
        'enablePushState' => false, // не обновлять url
        'linkSelector' => '.pjax a', //обрабатывать через pjax только отдельные ссылки
        'timeout' => '20000',
    ]);
?>
<output id="mail_box"></output>
<?php Pjax::end(); ?>
<!---->
<?php Pjax::begin([
    'clientOptions' => [
        'method' => 'get',
        'data-pjax-container' => '#ajax-img'
    ],
    'id' => 'ajax',
    'enablePushState' => false,
    'linkSelector' => '.pjax', //обрабатывать через pjax только отдельные ссылки
    'timeout' => 20000
]);
?>
<div id="ajax-img"></div>
<?php Pjax::end(); ?>
<!-- START #fh5co-header -->
<header id="fh5co-header-section" role="header" class="fh5co-scrolled" >
    <div class="container">

        <!-- START #fh5co-logo -->
        <div id="fh5co-logo" class="pull-left">
            <a href="/"><img src="/web/img/logo/logo.png" alt="логотип компании Соло мебель"></a>
            <span style="margin-top: -10PX;color: #222; font-family: Calibri">
                    мебель
                </span>
            <!--                <i class="fa fa-phone"></i>&nbsp;-->
            <div class="tel-block">
                <a href="tel:+78352375700"><span class="tel" itemprop="telephone">+7 (8352) 37-57-00</span></a><br>
                <a href="tel:+79023274546"><span class="tel" itemprop="telephone">+7 (902) 327-45-46</span></a>
            </div>
            <div class="mail-block">
                                                    <a rel="nofollow" href="/contact" class="pjax" title="написать письмо">
                <i class="fa fa-envelope"></i>mail@s-solo.ru
                                                    </a>
            </div>
        </div>
        <!-- START #fh5co-menu-wrap -->
        <nav id="fh5co-menu-wrap" role="navigation">
            <ul class="sf-menu" id="fh5co-primary-menu">
                <li class="active">
                    <a class="slide" href="/"><span data-text="Главная">Главная</span></a>
                </li>
                <li>
                    <a href="#" class="slide fh5co-sub-ddown"><span data-text="Каталог">Каталог</span></a>
                    <ul class="fh5co-sub-menu">
                        <li><a href="/galery/kitchen">кухни</a></li>
                        <li><a href="/galery/lkupe">шкафы-купе</a></li>
                        <li><a href="/galery/kupe">радиусные шкафы-купе</a></li>
                        <li><a href="/galery/wall">стенки</a></li>
                        <li><a href="/galery/office">офисная мебель</a></li>
                        <li><a href="/galery/childrens">детские комнаты</a></li>
                        <li><a href="/galery/hall">прихожие</a></li>
                        <li><a href="/galery/bedroom">спальные гарнитуры</a></li>

                        <!--
                        <li>
                            <a href="#" class="fh5co-sub-ddown">офисная мебель</a>
                            <ul class="fh5co-sub-menu">
                                <li><a href="#">столы</a></li>
                                <li><a href="#">ресепшн</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </li>
                <li><a class="slide" href="/coordinates"><span data-text='Контакты'>Контакты</span></a></li>
            </ul>
        </nav>

    </div>
</header>


<div id="fh5co-main">
    <main>
        <?= $content ?>
    </main>
    <footer style="text-align: center">
        <p class="text-center">
            <b style="font-size: 120%;color: #e61b05">SOLO</b> мебель&nbsp;Copyright
            &copy;&nbsp;&nbsp;2007&mdash;<?= date('Y') ?>.
            Проектирование и производство корпусной мебели в Чебоксарах.
        </p>
        <p class="text-center">
                <span class="tel">
                    <b class="header_shadow">Тел.</b> <b style="letter-spacing: 2px">+7(8352) 37-57-00 &nbsp;&nbsp;<a rel="nofollow" href="/contact"
                                                                                                                      class="pjax mail"><b class="header_shadow">E-mail:</b> &nbsp;<b style="letter-spacing: 2px">mail@s-solo.ru</b></a>
                </span>
            <br><br><br><b class="header_shadow">Часы работы :</b>
            <span itemprop="openingHours" datetime="Mo-Fr 10:00−21:00">Пн-Сб 10<sup>00</sup>&mdash;21<sup>00</span>
            &nbsp;&nbsp;<span>Вс 10<sup>00</sup>&mdash;20<sup>00</span>
        </p>
        <b class="text-center"><b class="header_shadow">Адрес :</b> пр. Ивана Яковлева 4б 4этаж (МТВ-центр)</b>
        <br><br><br><span style="font-size:90%;font-style:italic;font-weight: normal">сайт разработан группой <spaan style="font-weight: bolder;font-style: normal;letter-spacing: 1px">
                    <a href="https://alexart21.ru" style="color: #0000ff !important;">ALEXART21.RU</a></spaan></span>
    </footer>
</div>
<?php $this->endBody() ?>
<script>
    $(document).on('pjax:beforeSend', function () {
        document.body.style.cursor = 'progress';
    });
    $(document).on('pjax:complete', function () {
        document.body.style.cursor = 'default';
    });
    ///
    var w = document.body.clientWidth;
    if (w > 1366) {
//        console.log(w);
        $('#main-box,#fh5co-hero,#fh5co-header-section').css({
            'width': '1366px',
            'margin': '0 auto'
        });
        $('.designer-box').css('left', (w - 1366) / 2 + 'px');
        $('#popup__toggle').css('right', (w - 1366) / 2 + 130 + 'px');
            $('#scroller').css('right', (w - 1366) / 2 + 100 + 'px');
//        $('#fh5co-main').css('margin-right', '-100px');
    }
</script>
</body>
</html>
<?php //Spaceless::end()?>
<?php $this->endPage() ?>
