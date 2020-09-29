<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

//use rico\yii2images;

/**
 * This is the model class for table "galery".
 *
 * @property integer $id
 * @property string $path
 * @property string $price
 * @property integer $timestamp
 * @property string $alt
 */
class Galery extends ActiveRecord
{
//    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'galery';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['timestamp'], 'integer'],
            [['path'], 'string', 'max' => 50],
            [['alt'], 'string', 'max' => 200],
            [['price'], 'string', 'max' => 20],
//            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'timestamp' => 'Timestamp',
            'alt' => 'Alt',
        ];
    }


    /**
     * @return Unix timestamp с датой последней модификации из таблицы content
     */
    public static function getLastMod ()
    {
        // имя экшена
        $act = Yii::$app->requestedAction->id;

        /* SQL + ActiveRecord */
        /* $sql = "SELECT last_mod FROM content WHERE `page`='$act'";
        $last = ActiveRecord::findBySql($sql)->asArray()->one();
        return $last['last_mod'];*/

        /* Хранимая процедура */
        $sql = "CALL getGaleryLastMod('$act')";
        $last = ActiveRecord::findBySql($sql)->asArray()->one();
        return $last['last_mod'];
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы kitchen
     */
    public static function getKitchen($offset, $limit)
    {

        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'kitchen' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getKitchen($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы lkupe
     */
    public static function getLkupe($offset, $limit)
    {
        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'lkupe' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getLkupe($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы kupe
     */
    public static function getKupe($offset, $limit)
    {
        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'kupe' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getKupe($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы wall
     */
    public static function getWall($offset, $limit)
    {
        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'wall' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getWall($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы office
     */
    public static function getOffice($offset, $limit)
    {
        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'office' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getOffice($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы childrens
     */
    public static function getChildrens($offset, $limit)
    {
        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'childrens' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getChildrens($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы hall
     */
    public static function getHall($offset, $limit)
    {
        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'hall' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getHall($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /**
     * @param $offset параметр offset MYSQL
     * @param $limit параметр limit MYSQL
     * @return array|ActiveRecord[] данные для таблицы bedroom
     */
    public static function getBedroom($offset, $limit)
    {
        /* SQL + ActiveRecord */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'hall' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getBedroom($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /* Вывод отдельной картинки */
    /**
     * @param $id id картинки из GET параметра
     * @return array|mixed|null|ActiveRecord
     */
    public static function getImg($id)
    {
        $id = intval($id);

        $lastSql = "CALL getLastFromImg('$id')";
        $last = ActiveRecord::findBySql($lastSql)->asArray()->one();
        $last = $last['timestamp'];

        // дергаем кэш
        $imgData = Yii::$app->cache->get($id);
//        echo gmdate("D, d M Y H:i:s \G\M\T", $imgData['timestamp']);
//        die;
        if ($imgData) {
            array_push($imgData, $last);
            return $imgData;
        }

        /* SQL + ActiveRecord без подготовленного запроса */
        /*$sql = "SELECT galery.id, galery.title, galery.price, galery.description, galery.full_text, galery.timestamp, image.filePath, image.isMain, image.itemId FROM galery
                INNER JOIN image
                ON (galery.id = $id AND image.itemId = $id) AND isMain=1";
        $data = ActiveRecord::findBySql($sql)->asArray()->one();*/


        /* Подготовленный запрос */
        /*$sql = "SELECT galery.id, galery.title, galery.price, galery.description, galery.full_text, galery.timestamp, image.filePath, image.isMain, image.itemId FROM galery
                INNER JOIN image
                ON (galery.id = :id AND image.itemId = :id) AND image.isMain=1";
        $data = ActiveRecord::findBySql($sql, [':id' => $id])->asArray()->one();*/

        /* Хранимая процедура */
        $sql = "CALL getImgById($id)";
        $imgData = ActiveRecord::findBySql($sql)->asArray()->one();

//         set cache
//         86400 - сутки
//         604800 - неделя
//         15552000 - 180 суток
         Yii::$app->cache->set($id, $imgData, 15552000);
         array_push($imgData, $last); // добавляем Unix timestamp с датой последней модификации
         return $imgData;
    }
}
