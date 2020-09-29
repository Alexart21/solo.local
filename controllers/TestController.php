<?php

namespace app\controllers;

class TestController extends \yii\web\Controller
{
//    public $layout = 'main.php';

    public function actionIndex()
    {
//        $this->layout = 'main';
        return $this->render('index');
    }

    public  function actionClosed()
    {
        return $this->renderFile('@app/views/layouts/closed.php');
    }

}
