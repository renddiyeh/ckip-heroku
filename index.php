<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/CKIPClient.php';

header('Content-Type: application/json');

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

define('CKIP_SERVER', '140.109.19.104');
define('CKIP_PORT', 1501);
define('CKIP_USERNAME', getenv('CKIP_USERNAME'));
define('CKIP_PASSWORD', getenv('CKIP_PASSWORD'));
$ckip_client_obj = new CKIPClient(
   CKIP_SERVER,
   CKIP_PORT,
   CKIP_USERNAME,
   CKIP_PASSWORD
);

if (isset($_GET['q'])) {
  $raw_text = $_GET['q'];
} elseif (isset($_POST['q'])) {
  $raw_text = $_POST['q'];
} else {
  echo json_encode([ 'msg' => 'use ?q= to query' ]);
  die();
}

$ckip_client_obj->send($raw_text);

$data = [
  'result' => $ckip_client_obj->getTerm(),
];

echo json_encode($data);
