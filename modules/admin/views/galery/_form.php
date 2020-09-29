<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Galery */
/* @var $form yii\widgets\ActiveForm */
//debug($model);
?>

<div class="galery-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<!--    --><?//= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'category')->dropDownList([
        'kitchen'=>'кухни',
        'lkupe' => '"прямые" шкафы-купе',
        'kupe' => 'радиусные купе',
        'wall' => 'стенки',
        'office' => 'офисная мебель',
        'childrens' => 'детские комнаты',
        'hall' => 'прихожие',
        'bedroom' => 'спальни',
    ], ['style' => 'width:20em;font-weight:bold; color:green']); ?>

    <?= $form->field($model, 'timestamp')->textInput(['value' => time()]) ?>

    <?= $form->field($model, 'alt')->textInput(['maxlength' => true, 'value' => $model->title]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Отправить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>