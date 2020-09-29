<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $page
 * @property string $content
 * @property string $title
 * @property string $keywords
 * @property string $descrition
 * @property integer $last_mod
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page', 'content', 'title', 'keywords', 'descrition', 'last_mod'], 'required'],
            [['content'], 'string'],
            [['last_mod'], 'integer'],
            [['page'], 'string', 'max' => 50],
            [['title', 'keywords', 'descrition'], 'string', 'max' => 500],
            [['page'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page' => 'Страница',
            'content' => 'Содержимое страницы',
            'title' => 'Title',
            'keywords' => 'Мета тег Keywords',
            'descrition' => 'Мета тег Description',
            'last_mod' => 'Unix TimeStamp для заголовка LastModified',
        ];
    }
}