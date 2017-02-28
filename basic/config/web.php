<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => '2Q71CYW8JCu7cD0QzaAflnyvt5Ts66Ir',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
            'loginUrl' => ['login'],
        ],
        'errorHandler' => [
            'errorAction' => 'error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/login' => 'site/login',
                '/logout' => 'site/logout',
                '/<id:\d+>' => 'site/index',
                '/user/<id:\d+>' => 'user/view',
                '/user/update/<id:\d+>' => 'user/update',
                '/user/delete/<id:\d+>' => 'user/delete',
                '/user/delete-ajax/<id:\d+>' => 'user/delete-ajax',
                '/user/save/<id:\d+>' => 'user/save',
                '/profile' => 'user/profile',
                '/category/<id:\d+>' => 'category/view',
                '/category/update/<id:\d+>' => 'category/update',
                '/category/delete/<id:\d+>' => 'category/delete',
                '/category/delete-ajax/<id:\d+>' => 'category/delete-ajax',
                '/category/save/<id:\d+>' => 'category/save',
                '/product/<id:\d+>' => 'product/view',
                '/product/update/<id:\d+>' => 'product/update',
                '/product/save/<id:\d+>' => 'product/save',
                '/product/delete-ajax/<id:\d+>' => 'product/delete-ajax',
                '/products/<id:\d+>' => 'product/detail',
            ],
        ],
        'StringUtils' => [
            'class' => 'app\components\StringUtils',
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
