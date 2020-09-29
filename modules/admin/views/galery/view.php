<?php

use app\modules\admin\models\Galery;
use yii\helpers\Html;
use yii\widgets\DetailView;
/*use Imagine\Gd\Imagine;
use Imagine\Image\Box;*/

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Galeries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
/*$width = 192; // требуемая ширина иконки
$height = 108; // требуемая высота иконки
$quality = 50; // качество картинки*/

const WIDTH = 310;
const HEIGHT = 250;
const QUALITY = 50;

$img = $model->getImage();
/* Путь к файлу исходного изображения */
$pathToOrigin = Yii::getAlias('@app') . '/web/' . $img->getPathToOrigin();
/* Путь к иконке */
$pathToResize = Yii::getAlias('@app') . '/web/upload/resize_img/Galeries/Galery' . $img['itemId'] . '/' . $img['urlAlias'] . '.jpg';

/* Масштабирование изображения до размера $width x $height для иконки */
if (!empty($_GET['res']) && !file_exists($pathToResize)) { // иконки еще нет
    /* Создем директорию для иконки */
    mkdir(Yii::getAlias('@app') . '/web/upload/resize_img/Galeries/Galery' . $img['itemId']);

   /*$icon = new Imagine();
   $icon->open($pathToOrigin)
       ->resize(new Box($width, $height))
       ->save($pathToResize, ['quality' => 50]);*/
   Galery::resizeImg($pathToOrigin, $pathToResize, WIDTH, HEIGHT, QUALITY);


}
?>
<style>
    .breadcrumb{
        margin-top: 100px;
    }
</style>
<div class="galery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php if (!file_exists($pathToResize)) : ?>
        <?= Html::a('Масштабировать фото', ['view', 'id' => $model->id, 'res' => 1], ['class' => 'btn btn-primary']); ?>
        (До размеров <?= WIDTH ?> x <?= HEIGHT ?> px для иконки)
        <?php endif; ?>
    </p>

    <?php
    if (file_exists($pathToResize)) {
        $webPath = '/web/upload/resize_img/Galeries/Galery' . $img['itemId'] . '/' . $img['urlAlias'] . '.jpg';
    }else{
        $webPath = '/web/upload/original_img/' . $img['filePath'];
    }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'value' => "<img src='{$webPath}'>",
                'format' => 'html'
            ],
            'category',
            'timestamp:datetime',
            'alt',
            'title',
            'price',
            'description',
            'full_text:ntext',
        ],
    ]) ?>
</div>