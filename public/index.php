<?php

// Autoload dependencies and classes
require __DIR__ . '/../vendor/autoload.php';

use App\RouteProvider;
use App\ServiceProvider;
use Framework\Kernel;
use Framework\Request;

// Use phpinfo(); for a nice debug and show global PHP variables.
// Initialize the Kernel with configuration
$config = array(
    'APP_ENV' => 'development',
    'VIEWS_PATH' => 'app/views'
);

$kernel = new Kernel($config);

// Declare variables that contain an new instance of each class.
$serviceProvider = new ServiceProvider();
$routeProvider = new RouteProvider();
// Tell the kernel to use its functions to call on the variables containing the classes to be loaded.
$kernel->registerServices($serviceProvider);
$kernel->registerRoutes($routeProvider);

// Extract the path from the URL
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //This variable ONLY contains the path.
if (!is_string($urlPath)) {
    $urlPath = '/';
}

// Create the Request object
$request = new Request($_SERVER['REQUEST_METHOD'], $urlPath, $_GET, $_POST);

// Handle the request and get the response
$response = $kernel->handle($request);

// Send the response to the client
$response->echo();
