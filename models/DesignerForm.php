<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class DesignerForm extends Model
{
    public $name;
    public $tel;
    public $adress;
    public $dop;
//    public $robot;
//    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'tel', 'adress'], 'required', 'message' => 'заполните это поле !'],
            ['name', 'string', 'length' => [3, 100]],
            ['adress', 'string', 'max' => 600, 'tooLong' => 'не более 600 символов'],
            ['dop', 'trim'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше Имя',
            'tel' => 'Тел. :',
            'adress' => 'Адрес(улица дом/кв.)',
            'dop' => 'Дополнительно:',
        ];
    }


    public function designerSend()
    {
        $subject = 'Заявка на замер';
        $name = clr_get(mb_ucfirst($this->name));

        $body = 'Клиент &nbsp;<b style="font-size: 120%;text-shadow: 0 1px 0 #e61b05">' . $name . '</b>&nbsp; просит выехать на замер.<br>' .
            'Адрес : &nbsp;<b style="font-size: 110%">' . clr_get($this->adress) . '</b><br>' .
            'Тел. :&nbsp;&nbsp;<b style="font-size: 110%;">' . clr_get($this->tel) . '</b>';
        if (!empty($this->dop)) {
            $body .= '<br><br> <b>Дополнительно :</b><div style="font-style: italic">' . nl2br(clr_get($this->dop)) . '</div>';
        }
        $body .= '<br><br>Сообщение отправлено с сайта <b>https://www.s-solo.ru</b>';
        $success = Yii::$app->mailer->compose()
            ->setTo('mail@s-solo.ru')
            ->setFrom(['mail@s-solo.ru' => 's-solo.ru'])
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();
        if ($success && clr_get($this->robot[0]) === 'r') {
            if ($this->validate()) {
                die('<h3 style="color:green">Спасибо, ' . $name . ', Ваша заявка принята</h3>');
            }
        } else
            die('<h3 style="color:red">Ошибка !</h3>');
    }
}
