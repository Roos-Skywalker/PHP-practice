<?php

namespace App;

use Framework\RouteProviderInterface;
use Framework\Router;
use Framework\ServiceContainer;
use App\Controllers\HomeController;
use App\Controllers\TaskController;

class RouteProvider implements RouteProviderInterface
{
    public function register(Router $router, ServiceContainer $container): void
    {
        $homeController = $container->get(HomeController::class);
        $router->addRoute("GET", "/", [$homeController, "index"]);
        $router->addRoute("GET", "/about", [$homeController, "about"]);

        $taskController = $container->get(TaskController::class);
        $router->addRoute("GET", "/task", [$taskController, "index"]);
        $router->addRoute("GET", "/task/create", [$taskController, "create"]);
    }
}
