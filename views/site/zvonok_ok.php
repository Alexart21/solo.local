<?php
//header('Refresh:3;url= http://solo.local/catalog');

use yii\bootstrap\Modal;

?>

<?php
//var_dump($msg);die;
//die('jgkjgjgk');

Modal::begin([
    'id' => 'zv',
//    'size' => 'SIZE_SMALL',
//    'header' => '<h3>Отправка сообщения</h3>',
]);
?>

<h3><?= $msg ?></h3>

<?php
Modal::end();
?>

<script>
    $('#zv').modal('show');

    $(document).on('pjax:beforeSend', function () {
        document.body.style.cursor = 'progress';
    });
    $(document).on('pjax:complete', function () {
        document.body.style.cursor = 'default';
    });
    /////
    // через 3 сек удаляем сообщение
    var timerId = setInterval(function() {
        $('#zv').modal('hide');
        window.open('/catalog', '_self');
    }, 3000);

    setTimeout(function() {
        clearInterval(timerId);
    }, 3000);
</script>
<?php
//    sleep(3);
//    return $this->redirect('catalog');
?>
