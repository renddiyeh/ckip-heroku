<?php

use Dotenv\Dotenv;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

require_once '../vendor/fukuball/ckip-client-php/src/CKIPClient.php';

class CKIPServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
      try {
        $dotenv = new Dotenv(__DIR__ . '/../');
        $dotenv->load();
        $dotenv->required([
          'CKIP_SERVER',
          'CKIP_PORT',
          'CKIP_USERNAME',
          'CKIP_PASSWORD',
        ]);
      } catch (Exception $e) {
        if (
          !getenv('CKIP_SERVER')
          || !getenv('CKIP_PORT')
          || !getenv('CKIP_USERNAME')
          || !getenv('CKIP_PASSWORD')
        ) return;
      }

      $app['CKIP'] = new CKIPClient(
        getenv('CKIP_SERVER'),
        getenv('CKIP_PORT'),
        getenv('CKIP_USERNAME'),
        getenv('CKIP_PASSWORD')
      );
    }
}
