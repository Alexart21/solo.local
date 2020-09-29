<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Galery */

$this->title = 'Создние нового объекта фотогалереи';
$this->params['breadcrumbs'][] = ['label' => 'Фотогалерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galery-create">

    <h2 style="color: #003333;text-shadow: 1px 1px #e61b05"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>