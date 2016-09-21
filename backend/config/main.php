<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
      'world' => [
           'class' => 'backend\modules\worlds\world\Module',
       ],
       'category' => [
            'class' => 'backend\modules\worlds\category\Module',
        ],
        'rate' => [
           'class' => 'backend\modules\worlds\rate\Module',
       ],
       'coverimg' => [
            'class' => 'backend\modules\worlds\coverimg\Module',
        ],
        'status' => [
           'class' => 'backend\modules\worlds\status\Module',
       ],
       'member' => [
            'class' => 'backend\modules\member\Module',
        ],
       'clip' => [
            'class' => 'backend\modules\clip\Module',
        ],
        'article' => [
           'class' => 'backend\modules\article\Module',
       ],

    ],
    'components' => [
      'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@backend/themes/adminlte/views'
             ],
         ],
    ],
    // 'reCaptcha' => [
    //     'name' => 'reCaptcha',
    //     'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
    //     'siteKey' => 'your siteKey',
    //     'secret' => 'your secret key',
    //   ],
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'mailer' => [
          'class' => 'yii\swiftmailer\Mailer',
               //'viewPath' => '@frontend\runtime\mail',
               'useFileTransport' => false,
               'transport' => [
                   'class' => 'Swift_SmtpTransport',
                   'host' => 'smtp.gmail.com',    //smtp.mandrillapp.com //smtp.gmail.com
                   'username' => 'sakeerin.kh@gmail.com',
                   'password' => '0884065505',
                   'port' => '465',
                   'encryption' => 'ssl',
               ],
           ],
        //
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'rules' => [
        //
        //     ],
        // ],
<<<<<<< HEAD


'authClientCollection' => [
   'class' => 'yii\authclient\Collection',
    'clients' => [
       'firebase' => [
         'class' => 'yii\authclient\clients\Firebase',
         'clientId' => 'facebook_client_id',
          'clientSecret' => 'facebook_client_secret',
        ],],],

=======
>>>>>>> eef3f56475d53cfbadd0337d6f63c04358583003
    ],
    'params' => $params,
];
