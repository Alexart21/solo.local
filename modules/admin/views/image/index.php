<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

//var_dump($model);die;
//debug($model);
?>
    <style>
        .help-block {
            font-size: 150% !important;
            font-weight: bolder;
            text-shadow: 0 0 20px #000;
            color: maroon !important;
        }
    </style>

    <h2>Загрузка изображений</h2>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'full_text')->textarea() ?>
<?= $form->field($model, 'image')->fileInput() ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>