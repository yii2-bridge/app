<?php
require(__DIR__ . '/../../vendor/autoload.php');

$env = new \janisto\environment\Environment(__DIR__ . '/../../config', 'test');
$env->setup();
return $env->web;