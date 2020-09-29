<?php

use yii\bootstrap\Modal;

?>

<?php
//die('jgkjgjgk');
Modal::begin([
    'id' => 'modal',
    'header' => '<h3>Отправка сообщения</h3>',
]);
?>

<h1>TEL</h1>

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

