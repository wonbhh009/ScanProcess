<?php
namespace order_limiketang_com\controllers;

use Yii;
use common\extensions\BController;
use yii\web\HttpException;

// use common\extensions\support\ToolsAuth;


/**
 * Site controller
 */

class SiteController extends BController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

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
            return $this->render('index',[]);
    }

}
