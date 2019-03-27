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
    'defaultRoute' => 'index', // 设置默认首页
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
        // 配置sentry日志收集
        'sentry' => [
            'class' => 'mito\sentry\Component',
            'dsn' => 'https://402bb2239c354b46b87bca06ca366999:4a06fd45290e46f5867e0eb25302ad7c@sentry.io/1412540', // private DSN
//            'publicDsn' => 'https://402bb2239c354b46b87bca06ca366999@sentry.io/1412540', // 收集js错误时候打开
            'environment' => 'staging', // if not set, the default is `production`
            'jsNotifier' => true, // to collect JS errors. Default value is `false`
            'jsOptions' => [ // raven-js config parameter
                'whitelistUrls' => [ // collect JS errors from these urls
                    // 收集所有的URL的
//                    'http://staging.my-product.com',
//                    'https://my-product.com',
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            // 新增sentry配置
            'targets' => [
                [
                    'class' => 'mito\sentry\Target',
                    'levels' => ['error', 'warning'],
                    'except' => [
                        'yii\web\HttpException:404', // 除了404异常不收集
                    ],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
