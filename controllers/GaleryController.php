<?php

namespace app\controllers;

use Yii;
use app\models\Galery;
use app\models\Content;
use yii\data\Pagination;

//use yii\web\Controller;


class GaleryController extends \yii\web\Controller
{
   public $layout = 'galery';

    /* Отдельная картинка */
    public function actionAjax($id)
    {
        $imgData = Galery::getImg($id);
//        debug($imgData);
//        die;
        return $this->renderAjax('ajax', ['imgData' => $imgData]);
    }


    /* Кухни */
    public function actionKitchen()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'kitchen' . $page; // ключ для записи в кэш вида "kithen2"
        $cache = Yii::$app->cache;
        
        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('kitchen', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'kitchen'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getKitchen($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
    // 86400 - сутки
    // 604800 - неделя
    // 18144000 - 30 суток
    //15552000 - 180 суток
Yii::$app->cache->set($key, $data, 15552000);

return $this->render('kitchen', [
    'pagination' => $data['pagination'],
    'imgData' => $data['imgData'],
    'content' => $data['content'],
    'lastMod' => $lastMod,
]);
}

    /* Прямые купе */
    public function actionLkupe()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'lkupe' . $page; // ключ для записи в кэш вида lkupe2"
        $cache = Yii::$app->cache;

        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('lkupe', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'lkupe'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getLkupe($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 суток
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);

        return $this->render('lkupe', [
            'pagination' => $data['pagination'],
            'imgData' => $data['imgData'],
            'content' => $data['content'],
            'lastMod' => $lastMod,
        ]);
    }




    /* Радиусные купе */
    public function actionKupe()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'kupe' . $page; // ключ для записи в кэш вида "kupe2"
        $cache = Yii::$app->cache;

        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('kupe', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'kupe'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getKupe($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 суток
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);

        return $this->render('kupe', [
            'pagination' => $data['pagination'],
            'imgData' => $data['imgData'],
            'content' => $data['content'],
            'lastMod' => $lastMod,
        ]);
    }

    /* Стенки */
    public function actionWall()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'wall' . $page; // ключ для записи в кэш вида "wall2"
        $cache = Yii::$app->cache;

        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('wall', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'wall'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getWall($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 суток
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);

        return $this->render('wall', [
            'pagination' => $data['pagination'],
            'imgData' => $data['imgData'],
            'content' => $data['content'],
            'lastMod' => $lastMod,
        ]);
    }

    /* Офисная */
    public function actionOffice()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'office' . $page; // ключ для записи в кэш вида "office2"
        $cache = Yii::$app->cache;

        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('office', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'office'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getOffice($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 суток
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);

        return $this->render('office', [
            'pagination' => $data['pagination'],
            'imgData' => $data['imgData'],
            'content' => $data['content'],
            'lastMod' => $lastMod,
        ]);
    }

    /* Детские */
    public function actionChildrens()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'childrens' . $page; // ключ для записи в кэш вида "childrens2"
        $cache = Yii::$app->cache;

        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('childrens', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'childrens'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getChildrens($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 суток
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);

        return $this->render('childrens', [
            'pagination' => $data['pagination'],
            'imgData' => $data['imgData'],
            'content' => $data['content'],
            'lastMod' => $lastMod,
        ]);
    }

    /* Прихожие */
    public function actionHall()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'hall' . $page; // ключ для записи в кэш вида "hall2"
        $cache = Yii::$app->cache;

        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('hall', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'hall'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getHall($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 суток
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);

        return $this->render('hall', [
            'pagination' => $data['pagination'],
            'imgData' => $data['imgData'],
            'content' => $data['content'],
            'lastMod' => $lastMod,
        ]);
    }

    /* Спальные гарнитуры */
    public function actionBedroom()
    {
        $lastMod = Galery::getLastMod(); // timestamp для заголовка LastModified

        $page = !empty($_GET['page']) ? (string)(intval($_GET['page'])) : '1'; // номер страницы в пагинации

        $key = 'bedroom' . $page; // ключ для записи в кэш вида "bedroom2"
        $cache = Yii::$app->cache;

        // дергаем кэш
        if ($cache->exists($key)){
            $data = $cache->get($key);
            return $this->render('bedroom', [
                'pagination' => $data['pagination'],
                'imgData' => $data['imgData'],
                'content' => $data['content'],
                'lastMod' => $lastMod,
            ]);
        }

        $totalCount = Galery::find()->where(['category' => 'bedroom'])->count();
        $data['pagination'] = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $data['imgData'] = Galery::getBedroom($data['pagination']->offset, $data['pagination']->limit);

        $model = new Content();
        $data['content'] = $model->getContent();

        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 суток
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);

        return $this->render('bedroom', [
            'pagination' => $data['pagination'],
            'imgData' => $data['imgData'],
            'content' => $data['content'],
            'lastMod' => $lastMod,
        ]);
    }
    
}
