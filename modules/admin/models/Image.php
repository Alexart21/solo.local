<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $filePath
 * @property integer $itemId
 * @property integer $isMain
 * @property string $modelName
 * @property string $urlAlias
 * @property string $name
 * @property string $title
 * @property string $full_text
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filePath', 'modelName', 'urlAlias', 'title'], 'required'],
            [['itemId', 'isMain'], 'integer'],
            [['full_text'], 'string'],
            [['filePath', 'urlAlias'], 'string', 'max' => 400],
            [['modelName'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 80],
            [['title'], 'string', 'max' => 255],
            [['image'], 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filePath' => 'File Path',
            'itemId' => 'Item ID',
            'isMain' => 'Is Main',
            'modelName' => 'Model Name',
            'urlAlias' => 'Url Alias',
            'name' => 'Name',
            'title' => 'Заголовок',
            'full_text' => 'Описание',
            'image' => 'Фото',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = '/upload/origin_img/'.$this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
//            $this->attachImage($path);
//            @unlink($path);
            return true;
        }else {
            return false;
        }
    }

}
