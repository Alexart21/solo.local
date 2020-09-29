<?php
header("Cache-Control: no-store, no-cache");
header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $imgData['0']));

//echo '<br><br><br><br>';
//debug($imgData);die;

use yii\bootstrap\Modal;

//заголовок в картинку и в тег title
$title = !empty($imgData['title']) ? $imgData['title'] : 'Фото ' . $imgData['id'];
$this->title = $title;

$keywords = !empty($imgData['keywords']) ? $imgData['keywords'] : '';
$this->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);

$desc = !empty($imgData['description']) ? $imgData['description'] : '';
$this->registerMetaTag(['name' => 'description', 'content' => $desc]);

// подробное описание
$text = !empty($imgData['full_text']) ? $imgData['full_text'] : null;

$largeImgPath = __DIR__ . '/../../web/upload/original_img/' . $imgData['filePath'];  // путь к фото
$img_arr = getimagesize($largeImgPath);
$width = $img_arr[0]; // ширина
$height = $img_arr[1]; // высота
$w_h = $img_arr[3]; // ширина и высота для тега img
?>

<?php
Modal::begin([
    'id' => 'modal-img'
]);
?>
<div class="ajax-img-wrap" style="width: <?= $width ?>px;height: <?= $height ?>px">
    <button class="close" data-dismiss="modal"><span style="font-size: .7em">&times;</span></button>
    <figure class="snip1361">
    <img alt="<?= $title ?>" <?php echo $w_h ?> src="/upload/original_img/<?= $imgData['filePath'] ?>">
    <figcaption>
<!--        <span style="font-style: italic;color: #777777">Фото --><?//= $imgData['id'] ?><!--</span><br>-->
        <b><?= $title ?></b>
        <?php if (!empty($text)) : ?>
            <br><?= $text ?>
        <?php endif; ?>
                <?php if (!empty($imgData['price'])) : ?>
                    <br>
                    <span class="ajax-price"><?= $imgData['price'] ?>&nbsp;<i style="color:#000;" class="fa fa-ruble-sign"></i></span>
                <?php endif; ?>
    </figcaption>
    </figure>
</div>
<?php
Modal::end();
?>
<script>
    $('#modal-img').modal('show');
    document.title = '<?= $title ?>';
</script>
