<?php
//die('jkhjh');
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
//use yii\bootstrap\Modal;
?>

<?php
$subject = 'Обратный звонок';
$body = 'Клиент &nbsp;<b style="font-size: 120%;text-shadow: 0 1px 0 #e61b05">' . $name . '</b>&nbsp; просит перезвонить.<br>' .
    'Тел. :&nbsp;&nbsp;<b style="font-size: 110%;>' . $tel . '</b>';

$success = Yii::$app->mailer->compose()
    ->setTo('mail@s-solo.ru')
    ->setFrom(['mail@s-solo.ru' => 's-solo.ru'])
    ->setSubject($subject)
    ->setHtmlBody($body)
    ->send();

//die($success);

if ($success) {
    $msg = '<h3 style="color:green;text-align: center">Спасибо,  ожидайте звонка!</h3>';

} else{
    $msg = '<h3 style="color:red;text-align: center">Ошибка !</h3>';
}
require_once __DIR__ . '/zvonok_ok.php';
?>

<!--<div id="zv-resp" style="border: 1px solid #003333;padding: 1em">--><?//= $msg ?><!--</div>-->

<?php $form = ActiveForm::begin([
    'options' => ['class' => 'call', 'data-pjax' => true],
]);
?>
<input type="hidden" id="mess-name" name="name"  value="">
<!--        --><? //= $form->field($model, 'name')->textInput(['required' => true, 'tabindex' => '1']) ?>
<br>
<p class="h3">Куда отправить?:</p>
<a href="#"><img src="/img/mess_icons/watsapp.jpg" alt=""></a>
<a href="#"><img src="/img/mess_icons/telegram.jpg" alt=""></a>
<a href="#"><a href="#"><img src="/img/mess_icons/viber.jpg" alt=""></a>
    <p class="h3">На какой номер отправить?:</p>
    <?php
    echo MaskedInput::widget([
        'options' => [
            'required' => true,
            'placeholder' => '+7 (___)-___-__-__',
        ],
        'name' => 'tel',
        'mask' => '+7 (999)-999-99-99',
    ]);
    ?>
    <br>
    <br>
    <button type="submit" class="tel_but but_gr">получить бесплатно</button>
    <?php ActiveForm::end(); ?>

    <script>
        // через 5 сек удаляем сообщение
        var timerId = setInterval(function() {
            document.getElementById('zv-resp').style.display = 'none';
        }, 5000);

        setTimeout(function() {
            clearInterval(timerId);
        }, 5000);
    </script>
