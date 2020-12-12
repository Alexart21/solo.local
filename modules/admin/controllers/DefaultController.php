<?php

namespace app\modules\admin\controllers;

use Yii;
//use yii\web\Controller;
//use yii\db\ActiveRecord;
use app\modules\admin\models\Content;
use app\modules\admin\models\Galery;
use yii\helpers\FileHelper;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
//    public $layout = 'admin'; // в конфиге прописал

    public function actionIndex()
    {
        return $this->render('index');
    }

    /* Для всех страниц заголовок Last Modified текущее время c небольшим разбросом */
    public function actionLast()
    {
        if (Yii::$app->request->isAjax) {
            // очищаем кэш
            Yii::$app->cache->flush();

            // таблица Content
            // start transaction
            $flag = true;
            $lastContent = Content::find()->where(true)->all();
//            debug($lastContent);die;
            foreach ($lastContent as $last) {
                $time = time() - rand(60, 300); // разброс от 1 до 5 минут
                $last->last_mod = $time;
                $res = $last->save();
                $flag = ($flag && $res) ? true : false;
                if (!$flag){
                    break;
                }
            }

            // таблица Galery
            $lastGalery = Galery::find()->where(true)->all();
            foreach ($lastGalery as $last) {
                $time = time() - rand(60, 300); // разброс от 1 до 5 минут
                $last->timestamp = $time;
                $last->save();
            }

            $result = $flag ? true : false;
            $flag = true;
            $header = '<h3>LastModified</h3>';
            return $this->renderAjax('modal', compact('result', 'flag', 'header'));

//            return $this->renderFile('@app/modules/alexadmx/views/alert.php', compact('result'));
        }
    }
    /* Очистка кэша */
    public function actionCache()
    {
        if (Yii::$app->request->isAjax) {
            $result = Yii::$app->cache->flush();
            $flag = true;
            $header = '<h3>Очистка кэша</h3>';
            return $this->renderAjax('modal', compact('result', 'flag', 'header'));
        }
    }

    /* Очистка временных и.т.п. папок */
    public function actionClear()
    {
        if (Yii::$app->request->isAjax) {
            $dirArr = require_once __DIR__ . '/../views/inc/dirArr.php'; // здесь массив с очищаемыми папками
            $fileCount = $dirCount = $errCount = 0; // счетчики
            $clearSize = 0; // сколько удалено(освобождено байт)
            foreach ($dirArr as $dirPath) {
                $dirPath = __DIR__ . '/../../../' . $dirPath;
                $fileArr =  FileHelper::findFiles($dirPath);
                $dirList = FileHelper::findDirectories($dirPath);
                // удаление файлов
                foreach ($fileArr as $filePath) {
                    if(isset($filePath)) {
                        $size = @filesize($filePath);
                        $fRes = @unlink($filePath);
                        $clearSize += $size;
                    }
                    if ($fRes) {
                        $fileCount++;
                    } else {
                        $errCount++;
                    }
                }
                // удаление директорий (если есть)
                foreach ($dirList as $dir){
                    if(isset($dir)){
                        $dRes = @rmdir($dir);
                    }

                    if ($dRes) {
                        $dirCount++;
                    } else {
                        $errCount++;
                    }
                }
            }
        }
        $header = '<h3>Очистка папок</h3>';
        return $this->renderAjax('modal', compact('fileCount', 'dirCount', 'errCount', 'header', 'clearSize', 'dirArr'));
//        return $this->renderAjax('modal');
    }
    
}
