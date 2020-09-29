<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ZvonokForm extends Model
{
    public $name;
    public $tel;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'tel'], 'required', 'message' => 'заполните это поле !'],
            ['name', 'string', 'length' => [3, 30]],
            ['tel', 'string', 'length' => [11, 30]],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше Имя',
            'tel' => 'Номер телефона',
        ];
    }


    public function zvonokSend()
    {
        $subject = 'Обратный звонок';
        $name = clr_get(mb_ucfirst($_POST['name']));
        $tel = clr_get($_POST['tel']);

        $body = 'Клиент &nbsp;<b style="font-size: 120%;text-shadow: 0 1px 0 #e61b05">' . $name . '</b>&nbsp; просит перезвонить.<br>' .
       'Тел. :&nbsp;&nbsp;<b style="font-size: 110%;>' . $tel . '</b>' .
        '<br><br>Сообщение отправлено с сайта <b>https://www.s-solo.ru</b>';

        $success = Yii::$app->mailer->compose()
            ->setTo('mail@s-solo.ru')
            ->setFrom(['mail@s-solo.ru' => 's-solo.ru'])
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();

        if ($this->validate()) {
            if ($success) {
               $msg = '<h3 style="color:green;text-align: center">Спасибо, ' . $name . ', ожидайте звонка!</h3>';
            }
        } else
            $msg = '<h3 style="color:red;text-align: center">Ошибка !</h3>';
        return $msg;
    }
}
