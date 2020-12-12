<?php
use yii\bootstrap\Modal;

$msg = $result ? '<h2 style="color: green">Успешно</h2>' : '<h2 style="color: red">Сбой</h2>';

Modal::begin([
        'header' => 'Sitemap.xml',
        'id' => 'modal',
]);
echo $msg;

Modal::end();
?>

<script>
    $('#modal').modal();

    // через 4 сек удаляем сообщение
    setTimeout(function() {
        $('#modal').modal('hide');
    }, 4000);
</script>

