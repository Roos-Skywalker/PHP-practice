<?php

require __DIR__ . '/../vendor/autoload.php';

use App\RouteProvider;
use App\ServiceProvider;
use Framework\Kernel;
use Framework\Request;

// Use phpinfo(); for a nice debug and show global PHP variables.
$kernel = new Kernel();
$serviceProvider = new ServiceProvider();
$routeProvider = new RouteProvider();

$kernel->registerServices($serviceProvider);
$kernel->registerRoutes($routeProvider);

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //This variable ONLY contains the path.
if (!is_string($urlPath)) {
    $urlPath = '/';
}
$request = new Request($_SERVER['REQUEST_METHOD'], $urlPath, $_GET, $_POST);
$response = $kernel->handle($request);
$response->echo();

$config