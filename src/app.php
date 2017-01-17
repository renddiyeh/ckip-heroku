<?php

require_once 'ckip.php';

use Silex\Application;
use Silex\Provider\MonologServiceProvider;
use JDesrosiers\Silex\Provider\CorsServiceProvider;

$app = new Application();

$app->register(new MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

$app->register(new CorsServiceProvider(), array(
    'cors.allowOrigin' => '*',
));

$app->register(new CKIPServiceProvider());

$app->after($app['cors']);

return $app;
