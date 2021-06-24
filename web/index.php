<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$ckip = require_once __DIR__ . '/../src/ckip.php';

$app->options('/{routes:.+}', function ($request, $response) {
  return $response;
});

$app->add(function ($request, $handler) {
  $response = $handler->handle($request);
  return $response
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
});

$app->get('/', function (Request $request, Response $response) use ($ckip) {
  $params = $request->getQueryParams();
  if (!isset($params['q'])) {
    $error = [
      'message' => 'No query founded.',
      'usage' => '?q=SENTANCE_TO_PARSE',
    ];
    $payload = json_encode($error);
    $response->getBody()->write($payload);
    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(404);
  }
  $text = $params['q'];

  $ckip->send($text);

  $data = [ 'result' => $ckip->getTerm() ];
  $payload = json_encode($data);
  $response->getBody()->write($payload);
  return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
