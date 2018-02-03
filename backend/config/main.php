<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        //RBAC权限控制
        'rbac' =>  [
            'class' => 'johnitvn\rbacplus\Module'
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            //此扩展使用于 kartik-v/yii2-grid ，故在此之前必须使用 gridview module
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        //URL美化
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        //RBAC权限控制
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

    ],

    //设置语言
    'language'=>'zh-CN',
    //不使用母版页
    'layout' => 0,
    //修改默认路由
    'defaultRoute'=>'index/index',

    'params' => $params,
];
