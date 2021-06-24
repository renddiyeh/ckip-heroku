<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/fukuball/ckip-client-php/src/CKIPClient.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

$ckip = new CKIPClient(
  $_ENV['CKIP_SERVER'],
  $_ENV['CKIP_PORT'],
  $_ENV['CKIP_USERNAME'],
  $_ENV['CKIP_PASSWORD']
);

return $ckip;