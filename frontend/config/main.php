<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'assetManager' => [
            // 强制前端资源使用站点根路径，避免被发布到 /assets 下导致 404
            'appendTimestamp' => true,
            'bundles' => [
                'frontend\assets\AppAsset' => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                ],
                // Use theme jQuery (single source), prevent duplicate jQuery overwriting yiiActiveForm plugin
                'yii\web\JqueryAsset' => [
                     'sourcePath' => '@frontend/web',
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                        
                    'js' => [
                        'js/vendor/jquery-3.5.1.min.js',
                    ],
                ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
