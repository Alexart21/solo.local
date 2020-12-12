<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $page
 * @property string $content
 */
class Content extends ActiveRecord
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
            [['page', 'content'], 'required'],
            [['content'], 'string'],
            [['page'], 'string', 'max' => 50],
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
            'page' => 'Page',
            'content' => 'Content',
        ];
    }

    /**
     * @return array|mixed|ActiveRecord[]
     */
    public function getContent()
    {
        // имя экшена
        $act = Yii::$app->requestedAction->id;

        // дергаем кэш
        $data = Yii::$app->cache->get($act);
        if ($data) {
            return $data;
        }
        /* Без хранимой процедуры */
//        $sql = "SELECT * FROM content WHERE page = '$act'";
        /* Хранимая процедура */
        $sql = 'CALL getContent(\'' . $act . '\')';
        $data = ActiveRecord::findBySql($sql)->asArray()->all();
//        var_dump($data);die;
        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 дней
        //15552000 - 180 суток
        Yii::$app->cache->set($act, $data, 15552000);
        return $data;
    }
}
