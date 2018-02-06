<?php

// Composer Autoloader
require  __DIR__ . '/vendor/autoload.php';

// Load Environment
if (file_exists(__DIR__ . '/.env')) {
  $dotenv = new \Dotenv\Dotenv(__DIR__);
  $dotenv->load();
}

if( $corePath = getenv('CORE_PATH') ) {

    // Load Ubiweb Core
    require $corePath . '/bootstrap.php';

    // Instantiate App
    $app = new Ubiweb\Site(__DIR__);
    $app->run();

} else {
    echo "Core path is not defined.";
}
