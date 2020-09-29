<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

//use y/ii\widgets\Spaceless;
AppAsset::register($this);
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
    <meta name="yandex-verification" content="630983552bc35f28"/>
    <!--Yandex.Metrika counter-->
    <!--<script type="text/javascript">(function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter49770670 = new Ya.Metrika2({
                        id: 49770670,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true
                    })
                } catch (e) {
                }
            });
            var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
                n.parentNode.insertBefore(s, n)
            };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false)
            } else {
                f()
            }
        })(document, window, "yandex_metrika_callbacks2");</script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/49770670" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>-->
</head>
<body>
<div id="main-box">
    <?php Pjax::begin([
        'clientOptions' => [
            'method' => 'POST',
            'data-pjax-container' => '#zvonok-ok',
            //                'url' => '/zvonok'
        ],
        'id' => 'zvonok',
        'enablePushState' => false, // не обновлять url
        'formSelector' => '.zvonok-form',
        'timeout' => '20000',
    ]);
    ?>
    <output id="zvonok-ok"></output>
    <?php Pjax::end(); ?>
    <!--noindex-->
    <!--    <div class="designer-box"><a class="pjax" rel="nofollow" href="/designer">вызвать замерщика</a></div>-->
    <!--    -->
    <div class="messenger-block" id="ms">
        <div class="zv-form-group">
<!--            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
            <p class="h2 underline underline-red">Скачайте подборку<br>материалов-Бесплатно!</p>
            <b>основные тренды дизайна кухонь</b>
                    <b>Все о материалах для кухни.</b>
                    <b>Каталог наших лучших работ</b>

            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'call zvonok-form', 'data-pjax' => true],
            ]);
            ?>
            <input type="hidden" id="mess-name" name="name"  value="">
            <!--        --><? //= $form->field($model, 'name')->textInput(['required' => true, 'tabindex' => '1']) ?>
            <br>
            <p class="h3">Куда отправить?:</p>
            <div class="inl" onclick="watsapp()"><img src="/img/mess_icons/watsapp.jpg" alt=""></div>
            <div class="inl" onclick="telegram()"><img src="/img/mess_icons/telegram.jpg" alt=""></div>
            <div class="inl" onclick="viber()"><img src="/img/mess_icons/viber.jpg" alt=""></div>
            <p class="h3">На какой номер отправить?:</p>
            <?php
            echo MaskedInput::widget([
                'options' => [
                    'required' => true,
                    'tabindex' => '1',
                    'placeholder' => '+7 (___)-___-__-__',
                ],
                'name' => 'tel',
                'mask' => '+7 (999)-999-99-99',
            ]);
            ?>
<!--            <i class=" fa fa-phone-volume"></i>-->
            <br>
            <br>
            <button type="submit"  class="btn-red">получить бесплатно</button>
            <?php ActiveForm::end(); ?>
            <br>
            <p class="zvonok-pol">
                Нажимая на кнопку «получить бесплатно», я даю согласие на <a class="underline" rel="nofollow" href="/politic">обработку
                    персональных
                    данных</a> в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»
            </p>
        </div>
    </div>
    <script>
       window.onload = function(){
           // блок в шапке с иконками мессенджеров
           $('#ms').show(400);
        }
    </script>
    <a href="/call" data-tooltip="Оставьте свой номер телефона и мы перезвоним Вам" data-placement="right" class="pjax"
       rel="nofollow" id="popup__toggle">
        <div class="circlephone" style="transform-origin: center;"></div>
        <div class="circle-fill" style="transform-origin: center;">
        </div>
        <div class="img-circle" style="transform-origin: center;">
            <div class="img-circleblock" style="transform-origin: center;"></div>
        </div>
    </a>
    <!--    -->
    <div id="scroller"><i class="fa fa-angle-up"></i></div>
    <!--/noindex-->
    <div id="fh5co-hero">
        <!--        <div>-->
        <div class="fh5co-hero-wrap">
            <div class="fh5co-hero-intro">
                <h1>кухни в чебоксарах<br>
                    по вашим размерам<br>
                    с гарантией<br>
                    до 5 лет.</h1>
                <!--<div class="h2">
                    только современные технологии
                </div>-->
            </div>
        </div>
        <!--        </div>-->
    </div>
    <?php Pjax::begin(
        [
            'clientOptions' => [
                'method' => 'GET',
                'data-pjax-container' => '#mail_box',
            ],
            'enablePushState' => false, // не обновлять url
            'linkSelector' => '.pjax', //обрабатывать через pjax только отдельные ссылки
            'timeout' => '20000',
        ]);
    ?>
    <output id="mail_box"></output>
    <?php Pjax::end(); ?>
    <!-- START #fh5co-header -->
    <header id="fh5co-header-section" role="header">
        <div class="container">

            <!-- START #fh5co-logo -->
            <div id="fh5co-logo" class="pull-left">
                <a href="/"><img src="/web/img/logo/logo.png"  alt="логотип компании Соло мебель"></a>
                <span class="logo-text">
                    мебель
                </span>
                <!--                <i class="fa fa-phone"></i>&nbsp;-->
                <div class="tel-block">
                    <a href="tel:+78352375700"><span class="tel" itemprop="telephone">+7 (8352) 37-57-00</span></a>&nbsp;&nbsp;&nbsp;<span class="tel" style="font-weight: normal"><img
                                src="/img/icon/map.png" alt="" style="margin-top: 1px"> ТЦ "Мега молл" 4 этаж</span><br>
                    <a href="tel:+79023274546"><span class="tel" itemprop="telephone">+7 (902) 327-45-46</span></a>&nbsp;&nbsp;&nbsp;<img
                            src="/img/icon/time.png" alt="" style="margin-top: 1px"><span class="tel" style="font-weight: normal"> <span itemprop="openingHours" datetime="Mo-Fr 10:00−21:00">Пн-Сб 10<sup>00</sup>&mdash;21<sup>00</span>
        &nbsp;&nbsp;Вс 10<sup>00</sup>&mdash;20<sup>00</span>
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
<!--                        <a class="slide" href="/"><span data-text="Главная">Главная</span></a>-->
                    </li>
                    <!--<li>
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
                        </ul>
                    </li>-->
                    <li><a class="slide" href="#coordinates"><span data-text='Контакты'>Контакты</span></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="fh5co-main">
        <!--<main>-->
        <?= $content ?>
        <!--</main>-->
        <footer style="text-align: center">
            <p class="text-center">
                <b style="font-size: 120%;color: #e61b05">SOLO</b> мебель&nbsp;Copyright
                &copy;&nbsp;&nbsp;2007&mdash;<?= date('Y') ?>.
                Проектирование и производство кухонной мебели в Чебоксарах.
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
            <b class="text-center"><b class="header_shadow">Адрес :</b> ул. Калинина 105а (Мега молл)</b>
            <br><br><br><span style="font-size:90%;font-style:italic;font-weight: normal">сайт разработан группой <spaan style="font-weight: bolder;font-style: normal;letter-spacing: 1px">
                    <a href="https://alexart21.ru" style="color: #0000ff !important;">ALEXART21.RU</a></spaan></span>
        </footer>
    </div>
    <?php $this->endBody() ?>
    <script>
        //// смена фона шапки
        /*$("#fh5co-hero").bgswitcher({
            images: ["/img/head/bg1.jpg", "/img/head/bg2.jpg", "/img/head/bg3.jpg"],
            loop: false,
        });*/
        ////
        $(document).on('pjax:beforeSend', function () {
            document.body.style.cursor = 'progress';

        });
        $(document).on('pjax:complete', function () {
            document.body.style.cursor = 'default';
//            $("#fh5co-hero").css('background-image', 'default');
        });
        // Window Scroll
        var windowScroll = function () {
            $(window).scroll(function () {

                var scrollPos = $(this).scrollTop();
                if ($('body').hasClass('fh5co-mobile-menu-visible')) {
                    $('body').removeClass('fh5co-mobile-menu-visible');
                }

//                var header = document.querySelector('header');

                if ($(window).scrollTop() > 70) {
                    $('#fh5co-header-section').addClass('fh5co-scrolled');
                    $('.meb').css('color', '#222');
                    $('.designer-box').css('display', 'block');
                    $('.tel-block').css('top', '32px');
                    $('.mail-block a').css('top', '5px');
                    $('.tel').css({
                        'color': '#003333',
                        'text-shadow': 'none'
                    });
//                    $('#fh5co-header-section').addClass('header-shadow');
                } else {
                    $('#fh5co-header-section').removeClass('fh5co-scrolled');
                    $('.meb').css('color', '#fff');
                    $('.designer-box').css('display', 'none');
                    $('.tel-block').css('top', '57px');
                    $('.mail-block a').css('top', '26px');
                    $('.tel').css({
                        'color': '',
                        'text-shadow': ''
                    });
//                    $('#fh5co-header-section').removeClass('header-shadow');
                }


                // Parallax
                $('.fh5co-hero-intro').css({
                    'opacity': 1 - (scrollPos / 300)
                });

            });
        };

        ////
        $(function () {
            windowScroll();
        });
        //
        var w = document.body.clientWidth;
        if (w > 1366) {
            console.log(w);
            $('#main-box,#fh5co-hero,#fh5co-header-section').css({
                'width': '1366px',
                'margin': '0 auto'
            });
            $('.designer-box').css('left', (w - 1366) / 2 + 'px');
            $('#popup__toggle').css('right', (w - 1366) / 2 + 130 + 'px');
            $('#scroller').css('right', (w - 1366) / 2 + 100 + 'px');
            $('#fh5co-main').css('margin-right', '-100px');
        }
        // открываем вкладку с каталогом
        /*$('.pdf-open').on('click', function () {
         window.open('/catalog', '_self');
        });*/

        $('#myCarousel').carousel({
            interval: 2000,
        });
    </script>
</div>
</body>
</html>
<?php //Spaceless::end()?>
<?php $this->endPage() ?>
