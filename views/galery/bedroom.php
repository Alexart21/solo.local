<?php
use yii\widgets\LinkPager;
//use yii\widgets\Pjax;

if(!empty($_GET['page'])){
    $page = ' | страница ' . $_GET['page'];
}else $page = NULL;

header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $lastMod));
$this->title = 'Спальные гарнитуры в Чебоксарах от '.Yii::$app->params['company'] . $page;
$this->registerMetaTag(['name' => 'keywords', 'content' => $content[0]['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $content[0]['descrition']]);

const IMG_W = 310; // ширина иконок
const IMG_H = 250; // высота иконок
?>
<div class="galery-small container">
    <h1 class="header_shadow text-center" >Спальные гарнитуры на заказ от <i><?= Yii::$app->params['company'] ?></i></h1>
    <?php
    $delay = 0.1;
    ?>
    <div class="flex-center">
        <?php foreach ($imgData as $item): ?>
            <div class="raised">
                <?php
                echo '<figure  class="snip1584"  data-scrollreveal="enter left and move 500px, wait ' .  $delay . 's">'
                ?>
                <!--        <figure  class="snip1584"  data-scrollreveal="enter left and move 100px, wait ".--><?//= $delay ?><!--. "s>"-->
                <img width="<?= IMG_W ?>" height="<?= IMG_H ?>" src="/upload/resize_img/Galeries/Galery<?= $item['itemId'] ?>/<?= $item['urlAlias'] ?>.jpg" alt=""/>
                <figcaption>
                    <h3><?= $item['title'] ?></h3>
                    <?php if ($item['price']) : ?>
                        <h5><?= $item['price'] ?>&nbsp;<i class="fa fa-ruble-sign"></i></h5>
                    <?php endif; ?>
                </figcaption>
                <a class="pjax" href="/galery/ajax?id=<?= $item['id'] ?>"></a>

                </figure>
                <?php
                $delay += 0.1;
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div style="clear: both;text-align: center">
    <?= LinkPager::widget([
        'pagination' => $pagination,
        'nextPageLabel' => '<i class="fa fa-forward"></i>',
        'prevPageLabel' => '<i class="fa fa-backward"></i>',
    ]) ?>
</div>
