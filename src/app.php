<?php

require_once 'ckip.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

$app->register(new JDesrosiers\Silex\Provider\CorsServiceProvider(), array(
    'cors.allowOrigin' => '*',
));

$app->register(new CKIPServiceProvider());

$app->after($app['cors']);

return $app;
