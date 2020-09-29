<?php
//var_dump($img[0]['filePath']);die;
header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $img['timestamp']));

if (!empty($img['title'])){
    $this->title = $img['title'] . ' ' . ' от дизайн студии '. Yii::$app->params['company'] . ' фото №' . $_GET['id'];
}else{
    $this->title = 'Фотогалерея изображение №' . $_GET['id'];
}

$this->registerMetaTag(['name' => 'keywords', 'content' => 'фотогалерея']);
$this->registerMetaTag(['name' => 'description', 'content' => $img['description']]);

$largeImgPath = __DIR__ . '/../../web/upload/original_img/' . $img['filePath'];  // путь к фото
$img_arr = getimagesize($largeImgPath);
$width = $img_arr[0]; // ширина
$height = $img_arr[1]; // высота
$w_h = $img_arr[3]; // ширина и высота для тега img
//debug($img_arr);die;
?>
<style>
    .main-header{
        top: 0;
    }
    #menu-wrapper{
        opacity: 1 !important;
    }
</style>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php if (!empty($img['title'])) : ?>
    <h1 class="header_shadow center-text image-header"><?= $img['title'] ?></h1>
<?php endif; ?>
<figure class="large-figure" style="width: <?= $width ?>px;margin: 0 auto">
    <img <?php echo $w_h ?> class="large-img" src="/upload/original_img/<?= $img['filePath'] ?>" alt="<?= $img['title'] ?>"
                     title="<?= $img['title'] ?>">
<!--        <div class="img-size">--><?php //echo $width . ' <span class="small">X</span> ' . $height ?><!--</div>-->

    <?php if(!empty($img['full_text'])) :  ?>
    <figcaption class="img-text text-center container">
        <?= $img['full_text'] ?>
        <?php /*if ($img['price']) : */?><!--
            <br>
            <br>
            <div class="price-block">
                <span class="black">Цена :</span> <span class="red digital"><?/*= $img['price'] */?> </span><span
                    class="rubl">руб.</span>
            </div>
        --><?php /*endif; */?>
    </figcaption>
    <?php else: ?>
    <div class="img-size"><?php echo $width . ' <span class="small">X</span> ' . $height ?> px</div>
    <?php endif; ?>
</figure>
