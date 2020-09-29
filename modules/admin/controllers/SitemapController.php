<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 05.04.2017
 * Time: 10:24
 */

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Galery;
use yii\db\ActiveRecord;
use app\modules\admin\models\Content;


class SitemapController extends AppAdminController
{
    public function actionIndex()
    {
        $siteRoot = __DIR__.'/../../../web/';
        $contentPriority = 1;
        $galeryPriority = 0.8;
        $XML = '';

        /* Таблица Content */

        $arr = [
            'kupe',
            'kitchen',
            'racks',
        ];

        $sql = "SELECT `page`, `last_mod` FROM content WHERE id > 0";
        $content = Content::findBySql($sql)->asArray()->all();
            foreach ($content as $data){
                if (in_array($data['page'], $arr)) {
                    $data['page'] = 'galery/' .$data['page'];
                }

                if ($data['page'] != 'index') {
                    $data['page'] = '/'.$data['page'];
                }else{
                    $data['page'] = '';
                }

                $date = date('Y-m-d', $data['last_mod']);
                $XML .=  "\r\n<url>\r\n\t<loc>https://www.". Yii::$app->params['siteUrl'] . $data['page'] ."</loc>\r\n\t<changefreq>weekly</changefreq>\r\n\t<lastmod>". $date ."</lastmod>\r\n\t<priority>". $contentPriority ."</priority>\r\n</url>";
            }

        /* Таблица Galery */
        $sql = "SELECT `id`, `timestamp` FROM galery WHERE id > 0";
        $galery = Galery::findBySql($sql)->asArray()->all();
            foreach ($galery as $data){
                $date = date('Y-m-d', $data['timestamp']);
                $XML .=  "\r\n<url>\r\n\t<loc>https://www.". Yii::$app->params['siteUrl'] .'/galery/ajax?id=' .$data['id'] ."</loc>\r\n\t<changefreq>weekly</changefreq>\r\n\t<lastmod>". $date ."</lastmod>\r\n\t<priority>". $galeryPriority ."</priority>\r\n</url>";
    
            }

        $resXML = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'
        .$XML."\n</urlset>";
        $fp = fopen($siteRoot . 'sitemap.xml', 'w+') or die('не могу открыть файл sitemap.xml !');
        if (fwrite($fp, $resXML)) {
            return $this->renderFile('@app/modules/admin/views/alert.php');
        }else {
            die('ERROR !');
        }
    }
}