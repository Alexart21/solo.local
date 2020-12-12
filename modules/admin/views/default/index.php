<?php
use yii\widgets\Pjax;

$user = strtolower(Yii::$app->user->identity->username);
?>

<div class="admin-default-index">
    <br>
    <br>
    <?php if ($user === Yii::$app->params['admin']) : ?>
        <a class="btn btn-danger pjax" href="/admin/default/cache">очистить кэш</a>&nbsp;
    <?php endif; ?>
    <a class="btn btn-success pjax" href="/admin/default/last">Last Modified</a>&nbsp;
    <a class="btn btn-success pjax" href="/admin/sitemap">Sitemap</a>&nbsp;
    (<b>Очиска кэша/Установка заголовка Last Modified в текущее время/Генерация Sitemap.xml</b>)

    <?php Pjax::begin(
        [
            'clientOptions' => [
                'method' => 'GET',
                'data-pjax-container' => '#cache',
            ],
            'enablePushState'=>false, // не обновлять url
            'linkSelector' => '.pjax', //обрабатывать через pjax только отдельные ссылки
            'timeout' => '30000',
        ]);
    ?>

    <div id="cache"></div>
    <?php Pjax::end(); ?>
    <?php if ($user === Yii::$app->params['admin']) : ?>
        <h3><a href="/admin/content">Содержимое основных страниц</a> (таблица Content)</h3>
        <h3><a href="/admin/galery">Фотогалерея</a></h3>
    <?php endif; ?>
    <?php
    $dirArr = require_once __DIR__ . '/../inc/dirArr.php';
    ?>
    <hr>
    <a class="btn btn-info pjax" data-toggle="tooltip" title="Очистка временных папок(Рекомендуется перед бэкапом)" href="/admin/default/clear">Очистка</a>
    <ol style="float: bottom">
        Очищаются папки:
        <?php
        foreach ($dirArr as $item) :
            ?>
            <li><?= $item ?></li>
        <?php
        endforeach;
        ?>
    </ol>
</div>
