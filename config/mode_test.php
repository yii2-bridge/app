<?php
$params = require __DIR__ . '/params.php';

$db = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2bridge_test',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];

return [
    'yiiDebug' => true,
    'yiiEnv' => 'test',
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