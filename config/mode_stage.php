<?php
$params = require __DIR__ . '/params.php';

$db = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2bridge_stage',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
];

return [
    'yiiDebug' => true,
    'yiiEnv' => 'stage',
    'web' => [
        'components' => [
            'log' => [
                'traceLevel' => 3,
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
                    'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY
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