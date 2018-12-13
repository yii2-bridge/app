<?php
require_once(dirname(__DIR__) . '/vendor/autoload.php');

$modeFile = dirname(__DIR__) . '/config/mode.php';
$mode = 'stage';
if (file_exists($modeFile)) {
    $mode = trim(file_get_contents($modeFile));
}

$env = new \janisto\environment\Environment(dirname(__DIR__) . '/config', $mode);
$env->setup();
(new yii\web\Application($env->web))->run();