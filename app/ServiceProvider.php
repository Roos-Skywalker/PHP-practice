<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use Framework\ServiceContainer;
use Framework\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(ServiceContainer $container): void
    {
        $homeController = new HomeController();
        $container->set(HomeController::class, $homeController);
        $taskController = new TaskController();
        $container->set(TaskController::class, $taskController);
    }
}