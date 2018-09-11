<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-order_limiketang_com',
    'basePath' => dirname(__DIR__),
    'language' =>'zh-CN',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'order_limiketang_com\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\live_video\Admin',
            'enableAutoLogin' => true,
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // 'mobile_offline.manifest' => 'html5cache/index',
                // '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'kvgrid' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'limi_video_2017',  //这里配置秘钥字符串就不会报错了
        ],
        // 'AreaComponent' => [
        //     'class' => 'common\components\teacher_data\AreaComponent',
        // ],
    ],
    'modules' => [
       'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',

        ]
    ],
    'params' => $params,
];
