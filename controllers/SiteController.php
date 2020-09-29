<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use app\models\ContactForm;
use app\models\Content;
use app\models\LoginForm;
use app\models\callForm;
//use yii\filters\AccessControl;
//use yii\filters\VerbFilter;
//use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{
    /*public function actionError()
    {
        $errorCode = Yii::$app->errorHandler->exception->statusCode;
        $errorMsg = Yii::$app->errorHandler->exception->getMessage();
            if ($errorCode == 404) {
                $this->layout = '_404';
               return $this->render('_404', ['errorMsg' => $errorMsg]);
            }
    }*/
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
//        $this->enableCsrfValidation = false;

        $request = Yii::$app->request;

        if($request->isPost){ // отправка с формы на главной странице

            $subject = 'Обратный звонок';
            $name = Html::encode(mb_ucfirst($request->post('name')));
            $tel = Html::encode($request->post('tel'));

            $body = 'Клиент &nbsp;<b style="font-size: 120%;text-shadow: 0 1px 0 #e61b05">' . $name . '</b>&nbsp; просит перезвонить.<br>' .
                'Тел. :&nbsp;&nbsp;<b style="font-size: 110%;>' . $tel . '</b>';

            $success = Yii::$app->mailer->compose()
                ->setTo('mail@s-solo.ru')
                ->setFrom(['mail@s-solo.ru' => 's-solo.ru'])
                ->setSubject($subject)
                ->setHtmlBody($body)
                ->send();

//die($success);

            if ($success) {
                $msg = '<h3 style="color:green;text-align: center">Спасибо,  ожидайте звонка!</h3>';
                header('Refresh:3;url= http://solo.local/catalog');
            } else{
                $msg = '<h3 style="color:red;text-align: center">Ошибка !</h3>';
            }

            return $this->renderAjax('zvonok_ok', compact('name', 'tel', 'msg', 'body'));
        }

        $model = new Content();
        $data = $model->getContent();

        return $this->render('index', ['data' => $data]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    /* Форма отправки сообщения */
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post())) { // данные пришли
//            sleep(2);
            $model->contactSend(); // валидация, отправка почты, вывод сообщения об успехе(ошибке) и завершение скрипта

        }
        //  выводим контактную форму
        return $this->renderAjax('contact', ['model' => $model]);
    }

    /* Страница контакты */
    public function actionCoordinates()
    {
        $this->layout = 'galery';
        return $this->render('coord');
    }


    /* Вызов дизайнера (не использую) */
    /*public function actionDesigner()
    {
        $model = new DesignerForm();
        if ($model->load(Yii::$app->request->post())) { // данные пришли
//            sleep(2);
            $model->designerSend(); // валидация, отправка почты, вывод сообщения об успехе(ошибке) и завершение скрипта
        }
        //  выводим форму на заявку выезда дизайнера
        return $this->renderAjax('designer', ['model' => $model]);
    }*/

    /* Политика конфедициальности */
    public function actionPolitic()
    {
       return $this->renderFile(__DIR__ . '/../views/site/politic.php');
    }

    /* Вакансии */
    /*public function actionVacancies()
    {
        $this->layout = 'galery';
        return $this->render('vacancies');
    }*/

    /* Виджет обратного звонка */
    public function actionCall()
    {
        $model = new callForm();

        if ($model->load(Yii::$app->request->post())) { // данные пришли
//            $this->registerJs('alert("POST")');
            $model->callSend(); // валидация, отправка почты, вывод сообщения об успехе(ошибке) и завершение скрипта
        }

        return $this->renderAjax('call', ['model' => $model]);
    }

    public function actionCatalog()
    {
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
        Yii::$app->response->send();
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="catalog.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');
        ini_set('zlib.output_compression','0');

       $pdf = file_get_contents(__DIR__ . '/../web/files/catalog.pdf');
       die($pdf);
    }

}
