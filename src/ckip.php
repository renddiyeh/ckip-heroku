<?php

use Dotenv\Dotenv;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

require_once '../vendor/fukuball/ckip-client-php/src/CKIPClient.php';

class CKIPServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
      $dotenv = new Dotenv(__DIR__ . '/../');
      $dotenv->load();

      $app['CKIP'] = new CKIPClient(
         $_ENV['CKIP_SERVER'],
         $_ENV['CKIP_PORT'],
         $_ENV['CKIP_USERNAME'],
         $_ENV['CKIP_PASSWORD']
      );
    }
}
