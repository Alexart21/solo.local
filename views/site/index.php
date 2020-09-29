<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;
//use yii\helpers\Html;

header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $data[1]));
$this->title = $data[0]['title'];
$this->registerMetaTag(['name' => 'keywords', 'content' => $data[0]['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $data[0]['descrition']]);
?>
<!--END SERVICES SECTION -->

<!--Новинки-->

<div class="container">

<!---->
    <br>
    <br>
    <p class="h1 text-red-shadow" style="max-width: 60%">
        <span class="underline">Замерим</span>, продумаем дизайн и функционал под ваш бюджет, сделаем план электрики, изготовим, <span class="underline">установим</span>, подключим
        технику и сантехнику, уберем мусор.
    </p>
<div class="container icon-block1">
    <div class="row1">
        <div class="row1-in">
            <img src="/img/icon/piggy-bank.png" alt="">
            <div class="row1-in-text">
            <span class="h3">лучшие цены на рынке</span>
                <p>
                    Производим от Премиум до Эконом класса.
                    Без наценки магазина, напрямую с производства. Сэкономь до 20% от рыночных цен.
                </p>
            </div>
        </div>
        <div class="row1-in">
            <img src="/img/icon/scientist-woman.png" alt="">
            <div class="row1-in-text">
                <span class="h3">наивысшее качество</span>
                <p>
                    Средний стаж каждого сотрудника компании «Solo мебель», более 10 лет в индустрии мебели. Все сотрудники получают оплату, только после 100% сдачи заказа.
                </p>
            </div>
        </div>
        <div class="row1-in">
            <img src="/img/icon/coins.png" alt="">
            <div class="row1-in-text">
                <span class="h3">возможность рассрочки</span>
                <p>
                    Производим от Премиум до Эконом класса.
                    Без наценки магазина, напрямую с производства. Сэкономь до 20% от рыночных цен.
                </p>
            </div>
        </div>
    </div>
    <div class="row1">
        <div class="row1-in">
            <img src="/img/icon/credit-card.png" alt="">
            <div class="row1-in-text">
                <span class="h3">оплата любым удобным способом</span>
                <p>
                    Наличный расчет, банковская карта,
                    оплата на расчетный счет компании
                    при работе с юр. лицами.
                </p>
            </div>
        </div>
        <div class="row1-in">
            <img src="/img/icon/oven.png" alt="">
            <div class="row1-in-text">
                <span class="h3">скидки на технику</span>
                <p>
                    При покупке кухни, Вы получаете скидку на встраиваимую технику в подарок.
                </p>
            </div>
        </div>
        <div class="row1-in">
            <img src="/img/icon/certificate.png" alt="">
            <div class="row1-in-text">
                <span class="h3">10 лет гарантии от производителя</span>
                <p>
                    Послегарантийное обслуживание прописывается в договоре
                </p>
            </div>
        </div>
    </div>
    <div class="row1">
        <a href="/call" class="pjax"><div class="btn-red icon-block1-btn">УЗНАТЬ ПОДРОБНОСТИ</div></a>
    </div>
</div>
    <!---->
    <br>
    <br>
    <br>
<br>
<br>
    <!---->
    <div class="taxi-block container city">
        <img class="taxi-img" src="/img/taxi.png" width="652" height="428" alt="" data-scrollreveal="enter left and move 300px, wait 0.3s">

        <div class="taxi-form-block" id="ms" style="height: 500px" data-scrollreveal="enter right and move 300px, wait 0.3s">
            <div class="zv-form-group">
                <!--            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                <!--            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                <div class="h2 underline underline-red">Оставьте заявку на бесплатное такси до "<span style="color: #e61b05">Solo</span> мебель"!</div>

                <?php $form = ActiveForm::begin([
                    'options' => ['class' => 'call zvonok-form', 'data-pjax' => true],
                ]);
                ?>
                <div class="h3">Ваше имя:</div>
                <input type="text" id="mess-name" name="name" placeholder="например Елена" required>
                <br>
                <br>
                <p class="h3">Ваш номер телефона:</p>
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
                <button type="submit"  class="btn-red">оставить заявку</button>
                <?php ActiveForm::end(); ?>
                <br>
                <p class="zvonok-pol">
                    Нажимая на кнопку «оставить заявку», я даю согласие на <a class="underline" rel="nofollow" href="/politic">обработку
                        персональных
                        данных</a> в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»
                </p>
            </div>
        </div>

    </div>
    <!---->
    <br>
    <br>
    <br>
    <br>
    <div class="credit-block">
        <div class="h2 text-center credit-h1">ИНДИВИДУАЛЬНАЯ РАССРОЧКА ПОД 0%</div>
        <div class="h4 text-center credit-h2">ОТ КОМПАНИИ SOLO МЕБЕЛЬ. БЕЗ УЧАСТИЯ БАНКА,  БЕЗ СПРАВОК</div>
        <div class="credit-form-block">
            <br>
            <div class="h3 text-center underline-red" style="text-align: center;font-weight: bold;text-decoration: underline">ЗАПОЛНИТЕ КОРОТКУЮ АНКЕТУ</div>
            <div class="h4 text-center" style="width: 400px;margin: 0 auto;margin-top: -20px;line-height: 95%">И уже через месяц наслаждайтесь приготовление блюд на новенькой кухне</div>
            <br>
            <br>
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'call credit-form zvonok-form', 'data-pjax' => true],
            ]);
            ?>
            <b class="credit-form-label">Ваше имя:</b>
            <input type="text" id="mess-name" name="name" placeholder="например Елена" required>
            <br>
            <br>
            <b class="credit-form-label">Ваш номер телефона:</b>
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
            <br>
            <br>
            <b class="credit-form-label">Рассчитываемый бюджет на кухню:</b>
            <input type="text" id="sum-name" name="sum" placeholder="например 50 000" required>
            <br>
            <br>
            <b class="credit-form-label">Желаемый ежемесячный платеж:</b>
            <input type="text" id="payments" name="payments" placeholder="например 10 000" required>
            <br>
            <br>
            <button type="submit"  class="btn-red">оставить заявку</button>
            <!--<br>
            <p style="width: 300px;text-align: center;font-size: 80%">
                Ваши данные будут использованы только
                для связи с Вами на основании
                ФЗ РФ №152 "О персональных данных"
            </p>-->
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="taxi-block container">
        <div>
            <p class="h1">
                ЧТО ДЕЛАЕТ КОМАНДА «<span style="color: #e61b05">Solo</span> мебель», ДЛЯ ТОГО
                ЧТОБЫ ВЫ ПОЛУЧИЛИ НАИВЫСШЕЕ КАЧЕСТВО И ЧУВСТВО ВОСТОРГА ОТ ВАШЕЙ КУХНИ.
            </p>
            <div class="zamer-text">
                <p>
                    <span class="h3">
                    1  КАТАЛОГ КУХОННЫХ ГАРНИТУРОВ
                </span><br>
                Мы предполагаем, что принципиальный интерес к выбору кухонного гарнитура у Вас есть, поэтому предлагаем сделать первый легкий шаг, и ознакомиться с каталогом кухонных гарнитуров разной стилистики, предлагаемых компанией МебельМакс.

                Вы обязательно найдете кухню, от которой внутри Вас, кто-то сильно закричит «хочу!»
                <p>
                    <span class="h3">
                    2  ПОДРОБНАЯ КОНСУЛЬТАЦИЯ
                </span><br>
                    Менеджер, который свяжется с Вами, проконсультирует Вас по всем первичным интересующим вопросам.
                    После этой консультации  Вы будете знать о кухонных гарнитурах от А до Я.
                </p>
                <p>
                    <span class="h3">3  ВЫЕЗД ДИЗАЙНЕРА</span><br>
                    В удобное для Вас время к Вам приедет один из дизайнеров. Вы покажете ему свой интерьер, расскажете пожелания, особенности, заполните анкету. Дизайнер снимет размеры помещения.
                    Сделает фотографии помещения. Проконсультирует Вас по возникшим вопросам. Посоветует разные планировки и дизайн сразу же на месте. После этой встречи, Вы точно будете знать что хотите, в каком дизайне и каких размеров. Осталось это воплотить в 3-D визуализацию, что бы окончательно убедиться. А это следующий шаг…
                </p>
                <a href="/call" class="pjax"><div class="btn-red icon-block1-btn"; style="margin: 0 auto;">смотреть полностью</div></a>
            </div>
        </div>

        <div class="taxi-form-block" id="ms" data-scrollreveal="enter right and move 300px, wait 0.3s">
            <div class="zv-form-group">
                <div class="h2 underline underline-red" style="margin-bottom: -10px">Запишитесь на замер и получите подарок!</div>
                <?php $form = ActiveForm::begin([
                    'options' => ['class' => 'call zvonok-form zamer-form', 'data-pjax' => true],
                ]);
                ?>
                <div class="h3">Ваше имя:</div>
                <input type="text" onfocus="true" id="mess-name" name="name" tabindex="1" placeholder="например Елена" required>
                <br>
                <br>
                <p class="h3">Ваш номер телефона:</p>
                <br>
                <?php
                echo MaskedInput::widget([
                    'options' => [
                        'required' => true,
                        'tabindex' => '2',
                        'placeholder' => '+7 (___)-___-__-__',
                    ],
                    'name' => 'tel',
                    'mask' => '+7 (999)-999-99-99',
                ]);
                ?>
                <br>
                <br>
                <div class="h3">Адрес:</div>
                <input type="text" name="adress" tabindex="3" placeholder="улица дом.кв." required>
                <br>
                <br>
                <div class="h3">Удобное Вам время:</div>
                <input type="text" name="dop" tabindex="4" placeholder="напр. после 17-00">
                <br>
                <br>
                <button type="submit"  class="btn-red">записаться на замер</button>
                <br>
                <?php ActiveForm::end(); ?>
                <p class="zvonok-pol">
                    Нажимая на кнопку «записаться на замер», я даю согласие на <a class="underline" rel="nofollow" href="/politic">обработку
                        персональных
                        данных</a> в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»
                </p>
                <br>
                <br>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <!---->
    <div class="zakaz-mebel-block">
        <h2 class="h0 text-center">Мы также производим <br>любую корпусную мебель на заказ</h2>
    <div class="zakaz-mebel-img-block">
        <div class="category-img" data-scrollreveal="enter left and move 300px, wait 0.3s">
            <div class="zakaz-img-text">мебель для гостинной</div>
            <a href="/call" class="pjax"><div class="btn-red category-img-btn">смотреть каталог</div></a>
            <img src="/img/wall/wall.jpg" alt="">
        </div>
        <div class="category-img" data-scrollreveal="enter left and move 300px, wait 0.1s">
            <div class="zakaz-img-text">детскую мебель</div>
            <a href="/call" class="pjax"><div class="btn-red category-img-btn">смотреть каталог</div></a>
            <img src="/img/childrens/childrens.jpg" alt="">
        </div>
    </div>

        <div class="zakaz-mebel-img-block">
            <div class="category-img" data-scrollreveal="enter right and move 300px, wait 0.5s">
                <div class="zakaz-img-text">шкафы купе и гардеробные</div>
                <a href="/call" class="pjax"><div class="btn-red category-img-btn">смотреть каталог</div></a>
                <img src="/img/hall/kupe.jpg" alt="">
            </div>
            <div class="category-img" data-scrollreveal="enter right and move 300px, wait 0.7s">
                <div class="zakaz-img-text">а так же прочую мебель на заказ</div>
                <a href="/call" class="pjax"><div class="btn-red category-img-btn">смотреть каталог</div></a>
                <img src="/img/hall/other.jpg" alt="">
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <!---->
    <div class="h0 text-center">От новенькой и стильной кухни<br> Вас отделяет всего 6 шагов</div>
    <div class="container icon-block1">
        <div class="row1">
            <div class="row1-in in2">
                <img src="/img/icon/scientist-woman.png" alt="">
                <div class="arrow"><div class="icon-shewron fa fa-arrow-right"></div></div>
                <div class="row1-in-text">
                    <span class="h3">консультация со специалистом</span>
                    <p style="font-size: 14px">
                        После разговора по телефону с нашим менеджером, Вы получите всю информацию о Кухнях, какие материалы существуют, на чем можно сэкономить, на чем КАТЕГОРИЧЕСКИ нельзя экономить, какая бывает фурнитура и срок её службы. Это займет не более 1 мин. Просто оставьте заявку на сайте или позвоните по телефону.
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/report.png" alt="">
                <div class="arrow"><div class="icon-shewron fa fa-arrow-right"></div></div>
                <div class="row1-in-text">
                    <span class="h3">выезд дизайнера в помещение</span>
                    <p>
                        Дизайнер, выезжая на замер, посмотрит существующий интерьер, попросит вас ответить на пару вопросов, узнает о ваших предпочтениях, бюджете, целях. Сделает предварительный замер вашего помещения. И уже изучив всю информацию о Вас, сможет предоставить варианты эскизов Вашей мебели.
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/3d-printer.png" alt="">
                <div class="row1-in-text">
                    <span class="h3">презентация 3D-эскизов</span>
                    <p>
                        Производим от Премиум до Эконом класса. Без наценки магазина, напрямую с производства. Сэкономь до 20% от рыночных цен.
                    </p>
                </div>
            </div>
        </div>
        <div class="row1">
            <div class="row1-in in2">
                <img src="/img/icon/gears.png" alt="">
                <div class="arrow"><div class="icon-shewron fa fa-arrow-right"></div></div>
                <div class="row1-in-text">
                    <span class="h3">производство кухни</span>
                    <p>
                        После контрольного замера и выдачи чертежей конструктором. Ваш кухонный гарнитур попадает на производство нашей компании, оснащенное высокотехнологичный станочным парком и профессиональными сборщиками.
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/truck.png" alt="">
                <div class="arrow"><div class="icon-shewron fa fa-arrow-right"></div></div>
                <div class="row1-in-text">
                    <span class="h3">упаковка и доставка</span>
                    <p>
                        Каждый элемент Вашей кухни, будет упакован в гофрокартон и стрейч пленку. В компании МебельМакс, свой автопарк. Поэтому
                        мы сами отвечаем за перевозку мебели. Как бы далеко непришлось везти Вашу мебели, она доедет в целости и сохранности.
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/kitchen.png" alt="">
                <div class="row1-in-text">
                    <span class="h3">сборка гарнитура</span>
                    <p>
                        Собираем кухонный гарнитур.Обрабатываем швы специальным герметиком.
                        Подгоняем кухню по размерам помещения до миллиметров.Убираем мусор.
                        Оставляем Вам чистый и новенький гарнитур.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <br>
    <br>
<!--карусель-->
<!--    <img src="/img/back.png" alt="">-->
    <div class="calc">
<!--        <img src="/img/back.png" class="calc-img" alt="">-->

        <div class="calc-text">

        <span class="h0">Экспресс расчет<br>
        в течении 15 минут
            </span>
            <p>
                Если вы уже заказывали эскиз кухонного гарнитура в другом месте,<br> отправьте нам чертежи с размерами, мы сделаем<br> экспресс расчет за 15мин с Более выгодным предложением.
            </p>
            <br>
            <br>
            <a href="/call" class="btn-red pjax"  class="white"">получить экспресс расчет</a>
        </div>
        <img class="calc-img" src="/img/kitchen.jpg" alt="">
    </div>
<!--\карусель-->
    <br>
    <br>
    <br>
    <!---->
    <a  name="coordinates"></a>
        <h3 class="h0 text-center">Как нас найти ?</h3>
        <div class="text-center h3">г.Чебоксары ТЦ "<b>Мега молл</b>" 4 этаж (ул. Калинина 105а)</div>
    <div class="coord">
        <div class="tz-block">
            <img class="tz-block-img" src="/img/mega.jpg" alt="">
            <div class="tz-block-text">
                <div class="h3">Тел: +7(8352) 37-57-00</div>
                <a rel="nofollow" href="/contact" class="pjax" title="написать письмо" style="margin-top: -15px;color:#000;">
                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;mail@s-solo.ru
                </a>
                <br>
                <b class="h4">Часы работы</b>
                <br>
                <span>Пн-Сб 10<sup>00</sup>&mdash;21<sup>00</span>
                &nbsp;&nbsp;Вс 10<sup>00</sup>&mdash;20<sup>00</sup></span>
            </div>
        </div>
        <!---->
        <div class="box-shadow" style="margin-bottom:-3px" id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                    var setting = {"height":450,"width":600,"zoom":17,"queryString":"Мега Молл, улица Калинина, Чебоксары, Россия","place_id":"ChIJtXBUroI3WkERV5PIDrgD1Ik","satellite":false,"centerCoord":[56.137947373666236,47.277931100000046],"cid":"0x89d403b80ec89357","cityUrl":"/russia/malyye-katrasi-269926","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"106955"};
                    var d = document;
                    var s = d.createElement('script');
                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=106955';
                    s.async = true;
                    s.onload = function (e) {
                        window.OneMap.initMap(setting)
                    };
                    var to = d.getElementsByTagName('script')[0];
                    to.parentNode.insertBefore(s, to);
                })();</script><a href="https://1map.com/map-embed?embed_id=106955">1map.com</a>
        </div>
        <!---->
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        <!---->
    <div class="h0 text-center">Анкеты-отзывы</div>
    <div class="h2 text-center">КОТОРЫЕ ЗАПОЛНЯЕТ КАЖДЫЙ КЛИЕНТ ПОСЛЕ УСТАНОВКИ КУХНИ</div>
    <div class="anket-block">
        <img src="/img/doc.png" alt="">
        <div class="anket-block-text">
            <b class="h3">Федоров А.С.</b><br>
            <span style="opacity: .6">заказывали в компании "Solo мебель"</span><br>
            <b class="h4">кухонный гарнитур</b>
            <br>
            <br>
            <br>
            <br>
            <b class="h3">Отзыв</b><br>
            Выражаю благодарность за качественную сборку и<br>
            подробную консультацию по выбору кухонного гарнитура.<br>
            <span style="opacity: .6">05.04.2019</span>
            <br>
            <br>
            <br>
            <br>
            <a href="/contact" class="pjax btn-red">оставить отзыв</a>
        </div>

    </div>

    <!---->
<!--  carousel  -->
    <div class="h1 text-center" style="max-width: 1054px">
        Огромное количество материалов,цветов и дизайнерских решений позволит
        изготовить для вас эксклюзивную кухню.
    </div>
    <div class="carousel-container">
        <div id="myCarousel" class="slide carousel">
            <ul class="carousel-indicators">
                <li class="active" data-target="#myCarousel" data-slide-to="0">
                    <div class="abs">минимализм</div>
                </li>
                <li data-target="#myCarousel" data-slide-to="1">
                    <div class="abs">современный стиль</div>
                </li>
                <li data-target="#myCarousel" data-slide-to="2">
                    <div class="abs">стиль кантри</div>
                </li>
            </ul>
            <div class="carousel-inner">
                <div class="item active"><img src="/img/carousel_img/img1.jpg"/>
                </div>
                <div class="item"><img src="/img/carousel_img/img2.jpg"/>
                </div>
                <div class="item"><img src="/img/carousel_img/img3.jpg"/>
                </div>
            </div>
<!--            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left"></span></a>-->
<!--            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right"></span></a>-->
        </div>
    </div>
<!--  /carousel  -->
    <br>
    <br>
    <div class="h0 text-center">Остались вопросы?</div>
    <div class="h3 text-center">Мы с радостью на них ответим</div>
    <div class="container zvonok">
        <div class="zv-form-group" data-scrollreveal="enter bottom and move 100px, wait 0.4s">
            <h2 class="header_shadow zvonok-head">Есть вопросы?</h2>
            <p class="zvonok-p">
                Все возникшие вопросы Вы можете легко прояснить, оставив Ваши контактные данные.
                Мы обязательно перезвоним и дадим исчерпывающую консультацию!
            </p>
            <?php Pjax::begin([
                'clientOptions' => [
                    'method' => 'POST',
                    //                'url' => '/zvonok'
                ],
                'id' => 'zvonok2',
                'enablePushState' => false, // не обновлять url
                'timeout' => '20000',
                //            'data-pjax-container' => '#zvonok-resp'
            ]);
            ?>
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'call zvonok-form', 'data-pjax' => true],
            ]);
            ?>
            <input type="text" name="name" placeholder="имя" , required>
            <!--        --><? //= $form->field($model, 'name')->textInput(['required' => true, 'tabindex' => '1']) ?>
            <?php
            echo MaskedInput::widget([
                'options' => [
                    'required' => true,
                    'placeholder' => 'тел',
                ],
                'name' => 'tel',
                'mask' => '+7 (999)-999-99-99',
            ]);
            ?>
            <i class=" fa fa-phone-volume"></i>
            <button type="submit" class="btn-red" style="width: 160px;padding: 5px">жду звонка</button>
            <?php ActiveForm::end(); ?>
            <?php Pjax::end(); ?>
            <br>
            <p class="zvonok-pol">
                Нажимая на кнопку «жду звонка», я даю согласие на <a class="underline" rel="nofollow" href="/politic">обработку
                    персональных
                    данных</a> в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»
            </p>
        </div>


        <img width="208" height="243" src="/img/call.jpg" alt="" data-scrollreveal="enter bottom and move 100px, wait 0.4s">
        <p class="zvonok-p" data-scrollreveal="enter bottom and move 100px, wait 0.4s">
            <span class="h3 header_shadow">Фабрика <span class="red">SOLO</span> &mdash; выгодно и современно!</span>
            <br>
            <br>
            <strong>Мебель на заказ</strong> от SOLO это не только отсутствие посредников но и возможность выбрать товар из
            имеющегося на складе.
            Будь то <strong>радиусный шкаф купе</strong>, <strong>кухонный гарнитур</strong> или
            <strong>гардеробная</strong>.
            Приобретайте непосредственно у производителя!
        </p>
    </div>
    <br>
    <!---->
    <h2 class="text-center">Кухни в Чебоксарах от "<span class="red">Solo</span> мебель" - почувствуйте удовольствие от готовки на собственной кухне!</h2>
    <p>
        Приготовление новых блюд, тихие семейные вечера на новой кухне - наслаждайтесь вместе с кухней от “МебельМакс”. В основе нашей работы заложены определенные принципы: мы никогда не навязываем клиенту дополнительных услуг, не предлагаем некачественные материалы, полностью погружаемся в желания и идеи заказчика. С нами вы сможете воплотить в жизнь самые необычные идеи! Клиенты любят нас за то, что мы открыты к ним:
    </p>
    <ul>
        <li>
            Держим цены от производителя. Купить кухонный гарнитур — затратное мероприятие даже для решений эконом-класса. Мы работаем без посредников, поэтому в «Solo мебель» можно купить кухню без наценок.
        </li>
        <li>
            Предлагаем простые условия рассрочки. Покупка мебели в рассрочку (особенно если это кухня в Чебоксарах) часто связана с бумажной волокитой. Оформляем рассрочку без участия банка, без справок о доходах и даже без процентов.
        </li>
        <li>
            Мы заботимся о клиентах, поэтому выкупаем старую кухню. Не продавайте и не выбрасывайте ваш гарнитур — при оформлении заказа на кухню мы возьмём старый гарнитур в зачёт нового.
        </li>
        <li>
            Не экономим на качестве. Используем долговечные акриловые фасады и австрийскую фурнитуру Blum — продукцию лидирующего на рынке производителя.
        </li>
        <li>
            Даём гарантию. Мы настолько уверены в качестве наших гарнитуров, что предоставляем 10-летнюю гарантию на все материалы и работу.
        </li>
        <li>
            Мы не оставляем после себя мусора! Вы можете начинать пить чай уже через минуту после того, как мы покинем вашу кухню и оставим там новенький гарнитур!
        </li>
    </ul>

    <p>
        Пользуйтесь надёжной кухонной мебелью с «Solo мебель» и наслаждайтесь вкусом любимых блюд!</p>
    <h2 class="text-center">Для тех, у кого остались вопросы по дизайну кухни</h2>
    <p>Продумаем дизайн интерьера кухни и поможем найти уютное и функциональное решение даже для непростых планировок:</p>
    <ul>
        <li>
            Хрущёвки и квартиры с маленькой кухней. Найдём компромисс между эстетикой и функциональностью и воплотим его в жизнь.
        </li>
        <li>
            Квартиры-студии. Правильно зонируем квартиру.
        </li>
        <li>
            Нестандартные планировки. Для маленьких пространств предлагаем создать дизайн угловой кухни — это отличное сочетание комфорта и функциональности.
        </li>
        <li>
            Выезд дизайнера на замеры всегда бесплатный, даже если вам не понравится ни один из вариантов гарнитуров.
        </li>
    </ul>
    <h2 class="text-center">Если остались вопросы по кухонным гарнитурам</h2>
    <p>
        В ассортименте — кухонные гарнитуры для маленькой кухни (угловые и обычные), решения для квартир-студий и домашних пространств любой планировки.
    </p>
    <p>
        Если вам не понравился ни один из представленных в каталоге гарнитуров - ничего страшного! Дизайнер приедет к вам, сделает замеры и подготовит варианты. Вы можете подъехать к нам в офис на бесплатном такси, и мы вместе выберем индивидуальный дизайн кухни!
    </p>
    <!--noindex-->
<!--<div class="h2" style="text-align: center">Отзывы наших клиентов</div>-->
<!--<div class="container flex-center">-->
<!---->
<!--    <div class="otzyv-block">-->
<!--        <img src="/web/img/user/user1.jpg" alt="">-->
<!--        <p>-->
<!--            <h3>Светлана</h3>-->
<!--        <div class="h4">продавец-консультант</div>-->
<!--        Спасибо компании «Соло мебель», а конкретно Владимиру, который собирал мой заказ,-->
<!--        его терпению и доброжелательности!!! Сказать, честно, первый раз обратилась с индивидуальным-->
<!--        проектом к компании без рекомендации, просто нажав на сайт в интернете)))-->
<!--        Очень переживала, будет ли мой проект соответствовать всем требованиям)-->
<!--        И поняла, что в нашем городе есть профессионалы своего дела! Спасибо огромное!-->
<!--        </p>-->
<!--    </div>-->
<!--    <div class="otzyv-block">-->
<!--        <img src="/web/img/user/user2.jpg" alt="">-->
<!--        <p>-->
<!--            <h3>Валерий</h3>-->
<!--        <div class="h4">водитель</div>-->
<!--        Нужна была мебель для загородного дома.-->
<!--        Нашли ваш сайт и остались очень довольными. Дизайнер Владимир-->
<!--        очень внимательно отнесся к нашим запросам и помог подобрать кухонную мебель.-->
<!--        Бригада сборщиков работала аккуратно и качественно.-->
<!--        Остались положительные эмоции от результата их работы. Спасибо.-->
<!--        Нас устроила и цена и качество вашей мебели и выполненной работы.-->
<!--        </p>-->
<!--    </div>-->
<!--    <div class="otzyv-block">-->
<!--        <img src="/web/img/user/user3.jpg" alt="">-->
<!--        <p>-->
<!--            <h3>Екатерина</h3>-->
<!--        <div class="h4">домохозяйка</div>-->
<!--        После сделанного ремонта, настало время заказывать кухню!-->
<!--        Долго ходили по магазинам в своем городе и перелопачен интернет.-->
<!--        Наткнулись на сайт фирмы «Соло мебель».. Очень понравились фасады и цена за них-->
<!--        адекватная…Решили сделать заказ в этой компании…Хочу сказать честно, что волновались-->
<!--        сильно…Приехал замерщик Владимр — замерил, дал советы, составил проект. Через две недели-->
<!--        уже привезли мебель. Мы считаем, что это очень оперативно.-->
<!--        </p>-->
<!--    </div>-->
<!--</div>-->
<!--/noindex-->
<br>
<br>

    <!---->
    <div class="container icon-block1" style="border: none">
        <div class="row1">
            <div class="row1-in in2">
                <img src="/img/icon/pantone.png" alt="">
                <div class="row1-in-text text-center">
                    <span class="h3">более 1000 цветовых решений</span>
                    <p style="font-size: 14px">
                        Изготовим гарнитур любого<br>
                        оттенка и стиля
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/coliseum.png" alt="">
                <div class="row1-in-text text-center">
                    <span class="h3">фабричное производство фасадов</span>
                    <p>
                        Закупаем фасады<br>
                        в России и Италии
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/water.png" alt="">
                <div class="row1-in-text text-center">
                    <span class="h3">корпус кухни из ЛДСП</span>
                    <p>
                        Создаем каркас гарнитура<br>
                        из влагостойкого материала
                    </p>
                </div>
            </div>
        </div>
        <div class="row1">
            <div class="row1-in in2">
                <img src="/img/icon/notre-dame.png" alt="">
                <div class="row1-in-text text-center">
                    <span class="h3">австрийская фурнитура <b>BLUM</b></span>
                    <p>
                        Используем долговечные<br>
                        и надёжные комплектующие
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/truck.png" alt="">
                <div class="row1-in-text text-center">
                    <span class="h3">бесплатная доставка</span>
                    <p>
                        Доставим кухню в любую точку Чувашии
                    </p>
                </div>
            </div>
            <div class="row1-in in2">
                <img src="/img/icon/kitchen.png" alt="">
                <div class="row1-in-text text-center">
                    <span class="h3">производим гарнитуры "под ключ"</span>
                    <p>
                        Вы получаете кухню, полностью<br>
                        введенную в эксплуатацию
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!---->
<!--<div class="h2 header_shadow text-center">Будьте в курсе акций и скидок!</div>-->
<!--<div class="brands">
    <img width="188" height="52" src="/img/brands/hettich.jpg" alt=""
         data-scrollreveal="enter top and move 400px, wait 0.2s">
    <img width="188" height="52" src="/img/brands/blum .jpg" alt=""
         data-scrollreveal="enter top and move 400px, wait 0.4s">
    <img width="188" height="52" src="/img/brands/mak.jpg" alt=""
         data-scrollreveal="enter top and move 400px, wait 0.6s">
</div>-->

<script>
    var head_h = screen.height;
    //        console.log (head_h);
    document.getElementById('fh5co-hero').style.height = head_h + 'px';
    //    document.getElementById('fh5co-hero').style.top = 0;
</script>