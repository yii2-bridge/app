<?php
$params = require __DIR__ . '/params.php';

$db = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2bridge_prod',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];

return [
    'yiiDebug' => false,
    'yiiEnv' => 'prod',
    'web' => [
        'components' => [
            'log' => [
                'traceLevel' => 0,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'db' => $db,
            'urlManager' => [
                'normalizer' => [
                    'class' => 'yii\web\UrlNormalizer',
                    'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_PERMANENT
                ]
            ]
        ],
        'params' => $params,
    ],
    'console' => [
        'components' => [
            'db' => $db,
        ],
        'params' => $params,
    ]
];