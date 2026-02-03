<?php

require __DIR__ . '/../vendor/autoload.php';
use Framework\Kernel;
use Framework\Request;
use Framework\Response;
// Use phpinfo(); for a nice debug and show global PHP variables.


echo "Hello, PHP!";

$kernel = new Kernel();
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //This variable ONLY contains the path.
if (!is_string($urlPath)) {
    $urlPath = '/';
}
$request = new Request($_SERVER['REQUEST_METHOD'], $urlPath, $_GET, $_POST);
$response = $kernel->handle($request);
$response->echo();
