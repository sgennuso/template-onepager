<?php

// Composer Autoloader
require  __DIR__ . '/vendor/autoload.php';

// Load Environment
if (!isset($_SERVER['CORE_PATH'])) {
  $dotenv = new \Dotenv\Dotenv(__DIR__);
  $dotenv->load();
}
$corePath = getenv('CORE_PATH');

// Load Ubiweb Core
require $corePath . '/bootstrap.php';

// Instantiate App
$app = new Ubiweb\Site(__DIR__);

// Only Needed for demo
// require __DIR__ . '/app/routes.php';

$app->run();
