<?php
$this->title = 'Вакансии от '.Yii::$app->params['company'] . $page;
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->registerMetaTag(['name' => 'description', 'content' => '']);
?>
<style>
    table{
        width: 500px;
        margin: 50px auto 100px auto;
        /*background: #ddd;*/
    }
    td,th{
        padding: 1em;
        border: 1px solid #999;
    }

    .red{
        color: #e61b05;
    }
</style>

<div class="galery-small container">
    <h1 class="header_shadow text-center" >Вакансии от <i><?= Yii::$app->params['company'] ?></i></h1>
    <h2 class="header_shadow text-center">Требуются:</h2>
    <table>
        <tr>
            <th>Вакансия</th>
            <th>Размер з/п</th>
            <th>Требования</th>
            </tr>

        <tr>
            <td>мебельщик</td>
            <td>30000 <i class="fa fa-ruble-sign red"></i></td>
            <td>стаж от 2 лет</td>
        </tr>
        <tr>
            <td>водитель</td>
            <td>30000 <i class="fa fa-ruble-sign red"></i></td>
            <td>опыт</td>
        </tr>
    </table>
</div>
