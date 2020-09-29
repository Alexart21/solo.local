<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\db\ActiveRecord;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фотогалерея';
$this->params['breadcrumbs'][] = $this->title;

$model = $dataProvider->getModels();
?>
<div class="galery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category',
            [
                'attribute' => 'icon',
                'format' => 'raw',
                'value' => function($model)
                {
                    $id = $model['id'];
                    $sql = "SELECT urlAlias FROM image WHERE itemId = $id AND isMain = 1";
                    $img = ActiveRecord::findBySql($sql)->asArray()->one()['urlAlias'];
                    return "<a title='редактировать' href='/admin/galery/update?id=$id'><img src='/upload/resize_img/Galeries/Galery$id/$img.jpg'></a>";
                }
            ],
            'title',
            'timestamp:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>