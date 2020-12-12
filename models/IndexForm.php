<?php


namespace app\models;

//use Yii;
use yii\base\Model;

class IndexForm extends Model
{
    public $reCaptcha;

    public function rules()
    {
        return [
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator3::className(),
                'secret' => '6Le5fgIaAAAAAJDEpFRiyRSV5EMzNZUKiwcf3ZHn', // unnecessary if reСaptcha is already configured
                'threshold' => 0.5,
                'action' => 'index',
            ],

        ];
    }

    public function attributeLabels()
    {
        return [
            'reCaptcha' => '',
        ];
    }
}