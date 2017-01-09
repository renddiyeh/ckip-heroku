<?php

require_once 'ckip.php';

use Silex\Application;
use Silex\Provider\MonologServiceProvider;

$app = new Application();

$app->register(new MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

$app->register(new CKIPServiceProvider());

return $app;
