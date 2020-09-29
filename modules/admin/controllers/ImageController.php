<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Image;
use Yii;
use yii\web\UploadedFile;
use rico\yii2images;

class ImageController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function actionIndex()
    {
        $model = new Image;
//        debug($model);die;

        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image && $model->upload()) {
                Yii::$app->session->setFlash('success', 'Картинка загружена!'); // flash сообщение
                return $this->refresh();
            }else {
                Yii::$app->session->setFlash('error', 'Ошибка!');
            }
        }
        return $this->render('index', ['model' => $model]);
    }

}
