<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use app\models\IndexForm;
/* ДИЧь */
$indexForm = new IndexForm();

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
            <input type="hidden" id="mess-name" name="mess"  value="">
            <input type="hidden" name="pdf"  value="1">
            <!--        --><? //= $form->field($model, 'name')->textInput(['required' => true, 'tabindex' => '1']) ?>
            <br>
            <p class="h3">Куда отправить?:</p>
            <div id="msg-icon">
                <div class="inl" onclick="watsapp()"><i class="fab fa-whatsapp wats" title="whatsapp"></i></div>
                <div class="inl" onclick="viber()"><i class="fab fa-viber viber" title="viber"></i></div>
                <div class="inl" onclick="telegram()"><i class="fab fa-telegram-plane tg" title="telegram"></i></div>
            </div>
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
            <?= $form->field($indexForm, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha3::className(),
                [
                    'siteKey' => '6Le5fgIaAAAAAP5WhDlLtheUqavfIo-QbRlk6IMM', // unnecessary is reCaptcha component was set up
                    'action' => 'index',
                ]);
            ?>
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
    <!--<a href="/call" data-tooltip="Оставьте свой номер телефона и мы перезвоним Вам" data-placement="right" class="pjax"
       rel="nofollow" id="popup__toggle">
        <div class="circlephone" style="transform-origin: center;"></div>
        <div class="circle-fill" style="transform-origin: center;">
        </div>
        <div class="img-circle" style="transform-origin: center;">
            <div class="img-circleblock" style="transform-origin: center;"></div>
        </div>
    </a>-->
    <!--    -->
    <!-- loader -->
    <div id="container_loading">
        <!--        <i class="fas fa-spinner fa-spin"></i>-->
        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px"
             width="70px" height="70px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
             xml:space="preserve">
  <path fill="#DB3A0A"
        d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
      <animateTransform attributeType="xml"
                        attributeName="transform"
                        type="rotate"
                        from="0 25 25"
                        to="360 25 25"
                        dur="0.6s"
                        repeatCount="indefinite"/>
  </path>
  </svg>
    </div>
    <!-- end loader -->
    <div id="scroller"><i class="fa fa-angle-up"></i></div>
    <!--/noindex-->
    <!--Окно чата-->
    <audio preload="auto">
        <source src="/audio/buben.mp3" type="audio/mpeg">
        <source src="/audio/buben.ogg" type="audio/ogg">
    </audio>
    <div id="msg-block" data-closed data-toggle="tooltip" data-trigger="manual" title="<?= hello() ?>,я <?= Yii::$app->params['manager'] ?>.Чем могу помочь ?">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <div id="msg-content">
            <div class="msg-closed button-anim">
                <i class="fab fa-viber viber"></i> <i class="fab fa-whatsapp wats"></i>
                <b  class="msg-closed-text">Начните чат</b>
            </div>
            <img class="msg-img img-circle" src="/img/msg.jpg" alt="">
            <div class="msg-text">
                <div class="text-center"><?= hello() ?>,я <?= Yii::$app->params['manager'] ?>.</div>
                <div class="text-center text-info">выберите мессенджер и начните чат</div>
                <i style="display:block;text-align: right"><span class="fa fa-check"></span><?= date('H:i') ?>&nbsp;&nbsp;</i>
            </div>
            <hr>
            <a class="msg-btn viber-bg" href="viber://chat?number=<?= Yii::$app->params['msgNum'] ?>"
               target="_blank"><i class="fab fa-viber""></i> Viber</a>
            <a class="msg-btn watsap-bg" href="whatsapp://send?phone=<?= Yii::$app->params['msgNum'] ?>"
               target="_blank"><i class="fab fa-whatsapp"></i> Watsapp</a>
        </div>
    </div>
    <!--/-->
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
                    <a href="http://l917678y.beget.tech/" style="color: #0000ff !important;">ALEXART21.RU</a></spaan></span>
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
            $('#container_loading').show();
        });
        $(document).on('pjax:complete', function () {
            document.body.style.cursor = 'default';
            $('#container_loading').hide();
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
        let w = document.body.clientWidth;
        let scr_h = document.body.offsetHeight;
        // console.log(w);
       /* if (w > 1366) {
            let msgBlock = document.getElementById('msg-block');
            let main = document.querySelector('#main-box');
            console.log(w);
            console.log(scr_h);
            main.style.left = (w - 1366)/2 + 'px';
            msgBlock.style.left = (w - 1366)/2 + 'px';
            $('#main-box').css({
                'width': '1366px',
                'margin': '0 auto'
            });
            // $('.designer-box').css('left', (w - 1366) / 2 + 'px');
            $('#popup__toggle').css('right', (w - 1366) / 2 + 130 + 'px');
            $('#scroller').css('right', (w - 1366) / 2 + 100 + 'px');
            $('#fh5co-main').css('margin-right', '-100px');
        }*/
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
