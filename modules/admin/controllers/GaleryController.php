<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Galery;
use app\modules\admin\models\Image;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\admin\models\GalerySearch;
use app\modules\admin\controllers\AppAdminController;
use yii\helpers\FileHelper;

/**
 * GaleryController implements the CRUD actions for Galery model.
 */
class GaleryController extends AppAdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->stop(); // пускаем только админа (описана в AppAdminController)
        return parent::beforeAction($action);
    }

    /**
     * Lists all Galery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GalerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Galery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Galery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Galery();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->image = UploadedFile::getInstance($model, 'image');
            if( $model->image ){
                $model->upload();
                Yii::$app->cache->flush(); // очистка кэша
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Galery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
//        debug($model);die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->image = UploadedFile::getInstance($model, 'image');
            if( $model->image ){
                $model->upload();
            }
            // пишем в timestamp текущее время
            self::lastMod($id);
            // очистка кэша
            Yii::$app->cache->flush();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Galery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        /* Удаление из таблицы galery */
        $this->findModel($id)->delete();
        // далее отсебятина
        /* Удаляем так же из табли image */
        Image::deleteAll(['itemId' => $id]);
        /* Удаление фоток */
        self::removeImg($id);
        Yii::$app->cache->flush(); // очистка кэша
        return $this->redirect(['index']);
    }

    /**
     * Finds the Galery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Galery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Galery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /* Запесь метки времени в таблю galery */
    private static function lastMod($id)
    {
        $last = Galery::findOne($id);
        $last->timestamp = time();
        $last->save();
    }

    /* Удаление директорий с оригинальным фото и иконкой */
    private static function removeImg($id)
    {
        // путь к папке с оригинальным фото
        $pathToOrigin = Yii::getAlias('@webroot') . '/upload/original_img/Galeries/Galery' . $id;
        // путь к папке c иконкой
        $pathToIcon = Yii::getAlias('@webroot') . '/upload/resize_img/Galeries/Galery' . $id;

        FileHelper::removeDirectory($pathToOrigin);
        FileHelper::removeDirectory($pathToIcon);
    }
}
