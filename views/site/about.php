<?php
//debug($data);die;
?>

<style>
    .main-header{
        top: 0;
    }
    .wrap{
        padding-top: 10vh;
    }
    #menu-wrapper{
        opacity: 1 !important;
    }
    #my-maps {
        display: none;
        position: relative;
    }

    #maps-close {
        position: absolute;
    }

    .ok-list {
        background: #fff;
        /*width: 610px;*/
        padding: 1em;
    }

    .ok-list li {
        list-style-type: none;
        list-style-image: url("/web/img/ok.gif");
        font-weight: bold;
        font-family: "Helvetica Neue", "Arial", sans-serif;
        /*font-size: 12px;*/
        margin-left: 35px;
        padding-top: -5px;

    }

    .ur {
        background: #fff;
        font-weight: bold;
        width: 25em;
        padding: 1em;
        font-family: 'Courier New', Monospace;
    }

    .premium {
        font-size: 130%;
    }

</style>
<?php
/*header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $data[1]['last_mod']));
$this->title = $data[0]['title'];
$this->registerMetaTag(['name' => 'keywords', 'content' => $data[0]['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $data[0]['descrition']]);*/

$this->title = 'О дизайн студии ' . Yii::$app->params['company'];
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->registerMetaTag(['name' => 'description', 'content' => 'О дизайн студии ' . Yii::$app->params['company']]);
//debug ($data[0]['content']);die;
//debug ($data);die;
?>
<div style="padding: 7em">
    <section>
<h1 class="header_shadow center-text top_h1">О компании</h1>

<p>Дизайн студия <strong class="aristo"><i><?= Yii::$app->params['company'] ?></i></strong> работает на рынке дизайнерских услуг в Чувашской республике и г. Чебоксары с 2014 года.<br />
    Мы гарантируем Вам весь необходимый цикл работ начиная от идеи и заканчивая предоставлением всех необходимых качественно выполненных эскизов.
    Наш основной вид деятельности &mdash; <strong>Дизайн экстерьера и интерьера.</strong>.</p>
        <p>

        </p>

<p>Качество продукции от компании <strong class="aristo"><i><?= Yii::$app->params['company'] ?></i></strong> подкреплено многолетними наработками европейских компаний на рынке мебельных, стеллажных систем и фурнитуры.</p>

<p><span class="header_shadow premium">Плюсы сотрудничества с <?= Yii::$app->params['company'] ?>:</span></p>

<ul class="ok-list">
    <li>Опыт на рынке дизайнерских услуг.</li>
    <li>Хорошее знание строительных и мебельных технологий.</li>
    <li>Накопленные собственные дизайнерские решения.</li>
    <li>Авторский надзор.</li>
    <li>Наличие в штате профессиональных сотрудников.</li>
    <li>Приемлeмые сроки &quot;от идеи до эскиза&quot;.</li>
</ul>
<br>
    <span class="header_shadow premium">Наш адрес и реквизиты:</span></p>

<p>&nbsp;</p>

<p class="ur">Юр. Адрес: г. Чебоксары, ул. Богдана Хмельницкого 76<br />
    <br />
    ОГРН11621300668231<br />
    ИНН2130179296<br />
    КПП 213001001</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<div id="my-maps">
    <button id="maps-close" type="button" class="close">×</button>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d4448.912100286975!2d47.220874!3d56.114629!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d56.114629!2d47.220873999999995!5e0!3m2!1sru!2sru!4v1491301496195"
        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<button id="maps-open">показать на карте</button>
    </section>
</div>
<script>
    var open = document.querySelector('#maps-open');
    var mymaps = document.querySelector('#my-maps');


    open.addEventListener('click', function () {
        mymaps.style.display = 'block';
        open.style.display = 'none';
    });

    document.querySelector('#maps-close').addEventListener('click', function () {
        mymaps.style.display = 'none';
        open.style.display = 'block';
    });
</script>