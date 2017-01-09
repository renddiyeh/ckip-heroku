<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$app = require __DIR__ . '/../src/app.php';

$app->get('/', function (Request $request) use ($app) {

  if (!$request->query->has('q')) {
    $error = [
      'message' => 'No query founded.',
      'usage' => '?q=SENTANCE_TO_PARSE',
    ];
    return $app->json($error, 404);
  }
  if (!isset($app['CKIP'])) {
    $error = [
      'message' => 'Cannot intitialize CKIP serivice, please check ENV setting.',
    ];
    return $app->json($error, 500);
  }

  $text = $request->query->get('q');
  $ckip = $app['CKIP'];

  $ckip->send($text);

  $data = [ 'result' => $ckip->getTerm() ];
  return $app->json($data);
});

$app->run();
