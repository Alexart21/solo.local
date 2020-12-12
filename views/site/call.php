<?php
if (!empty($msg)) die($msg); // сообщение об успехе/ошибке
//die('view');
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
//if ($success) die('OK');
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

$this->title = 'Call';
?>
<?php
Modal::begin([
    'id' => 'callback',
    'header' => '<h3>Укажите Ваш номер телефона и мы перезвоним Вам</h3>',
//    'footer' => 'TEST'
]);
?>
<div class="row call2">
    <div class="col-lg-5">
        <?php Pjax::begin([
            'clientOptions' => [
                'method' => 'POST'
            ],
            'id' => 'call',
            'enablePushState' => false,
            'timeout' => 20000
        ]);
        ?>

        <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]], ['id' => 'call-form', 'class' => 'call']); ?>

        <?= $form->field($model, 'name')->textInput(['required' => true, 'placeholder' => 'Ваше имя'])->label(false) ?>


        <?= $form->field($model, 'tel')->textInput(['class' => 'phone', 'required' => true])
            ->widget(MaskedInput::className(), [
                'mask' => '+7 (999) - 999 - 99 - 99',
                /*'clientOptions' => [
                    'placeholder' => '+7 (999) - 999 - 99 - 99'
                ],*/

            ]);
        ?>


<!--        --><?//= $form->field($model, 'robot')->checkboxList(['r' => '__Я не робот'])->label(false); ?>

        <div class="form-group">
            <?= Html::submitButton('жду звонка!', ['class' => 'btn-red', 'id' => 'call-btn', 'style' => 'width:220px']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
<?php
Modal::end();
?>

<script>
    $('#callback').modal('show');

    $(document).on('pjax:beforeSend', function () {
        document.body.style.cursor = 'progress';
    });
    $(document).on('pjax:complete', function () {
        document.body.style.cursor = 'default';
    });
    $('button.close').on('click', function () {
        // window.open('/catalog', '_self');
    });
</script>
