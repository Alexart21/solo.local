<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
//use yii\helpers\HtmlPurifier;

$this->title = 'Contact';

?>
<?php
Modal::begin([
    'id' => 'modal',
    'header' => '<h3>Отправка сообщения</h3>',
]);
?>

<div class="site-contact">
<!--    <button class="close" data-dismiss="modal"><span style="font-size: .7em">&times;</span></button>-->
        <div class="row">
            <div class="col-lg-5">
                <?php Pjax::begin([
                    'clientOptions' => [
                        'method' => 'POST'
                        ],
                        'id' => 'contact',
                        'enablePushState' => false,
                        'timeout' => 20000
                ]);
                ?>

                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'options' => ['data-pjax' => true],
                    ]);
                ?>

                <?= $form->field($model, 'name')->textInput(['required' => true, 'tabindex' => '1', 'placeholder' => 'Ваше имя'])->label(false) ?>

                <?= $form->field($model, 'email')->input('email', ['tabindex' => '2', 'placeholder' => 'E-mail'])->label(false) ?>

                <?= $form->field($model, 'subject')->textInput(['tabindex' => '3', 'placeholder' => 'тема'])->label(false) ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6, 'tabindex' => '4', 'placeholder' => 'Текст сообщения'])->label(false) ?>

                <?= $form->field($model, 'robot')->checkboxList(['r' => '__Я не робот'])->label(false); ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'tel_but but_gr', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
</div>
<?php
Modal::end();
?>
<script>
    $('#modal').modal('show');

    $(document).on('pjax:beforeSend', function () {
        document.body.style.cursor = 'progress';
    });
    $(document).on('pjax:complete', function () {
        document.body.style.cursor = 'default';
    });
</script>


