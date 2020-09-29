<?php

namespace app\modules\admin\models;

use Yii;
use rico\yii2images;
use yii\db\ActiveRecord;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;

//Yii::setAlias('@icon_path', '');

/**
 * This is the model class for table "galery".
 *
 * @property integer $id
 * @property string $path
 * @property integer $timestamp
 * @property string $alt
 * @property string $title
 * @property string $description
 * @property string $full_text
 */
class Galery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;
    public $icon;
//    public $galery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
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
            [['title', 'category'], 'required'],
            [['timestamp'], 'integer'],
            [['path', 'category', 'full_text'], 'safe'],
            [['price'], 'safe'],
            [['alt'], 'string', 'max' => 200],
            [['title', 'description'], 'string', 'max' => 255],
//            [['image'], 'file', 'extensions' => 'png, jpg'],
//            [['galery'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Категория',
            'image' => 'Фото (Только файлы *.jpg !)',
            'timestamp' => 'Cоздано',
            'alt' => 'Alt',
            'price' => 'Цена',
            'title' => 'Заголовок',
            'description' => 'Мета тег Description',
            'full_text' => 'Описание',
            'icon' => 'Фото'
        ];
    }


    public function upload()
    {
        if($this->validate()){
            $originPath = 'upload/original_img/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($originPath);
            $this->attachImage($originPath, true);
            @unlink($originPath);
            return true;
        }else{
            return false;
        }
    }

    public static function resizeImg($originPath, $resizePath, $width, $height, $quality = 100)
    {
        $icon = new Imagine();
        $icon->open($originPath)
            ->resize(new Box($width, $height))
            ->save($resizePath, ['quality' => $quality]);
    }

}
