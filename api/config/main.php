<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute'=>'index',
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => 'Dk7BQ6_hk9YRPMdkaaK6FFwIpa123456',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'text/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
            'timeout'=>3600,
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
            'enablePrettyUrl' => true,      //path模式
            //'enableStrictParsing' => true,  //启用严格解析,必须有规则才会生效
            'showScriptName' => false,      //隐藏入口文件
            'suffix'=>'.asp',               //后缀

            'rules' => [
                '<action>&<controller>_<gid:\d+>' => '<controller>/<action>',
            ],

            /*'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'wechat',
                    'extraPatterns' => [
                        'GET valid' => 'valid',
                    ],
                ],
            ],*/

            /*//为user控制器增加一个URL规则
            'rule'=>[
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'user',
                ]
            ]*/
        ],

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii_2.0.11_new',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix'=>'shop_'
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.126.com',
                'username' => 'zhaoguangleixxx@126.com',
                'password' => 'xxxxxxxx',
                'port' => '25',
                'encryption' => 'tls',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['zhaoguangleixxx@126.com'=>'totti']
            ],
        ],

        'smser' => [
            // 中国云信
            'class' => 'daixianceng\smser\CloudSmser',
            'username' => 'username',
            'password' => 'password',
            'useFileTransport' => false

            /*// 云片网
            'class' => 'daixianceng\smser\YunpianSmser',
            'apikey' => '9b11127a9701975c734b8aee81ee3526', // 请替换成您的apikey
            'useFileTransport' => false*/
        ]
    ],

    //手动加载vendor包
    'aliases'=>[
        '@bower'=>'@vendor/bower-asset',
        '@rmrevin/yii/fontawesome'=>'@vendor/rmrevin/yii2-fontawesome'
    ],

    'params' => $params,
];
