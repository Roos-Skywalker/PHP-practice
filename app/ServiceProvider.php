<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use App\Models\Repositories\TaskRepository;
use Framework\Database;
use Framework\ResponseFactory;
use Framework\ServiceContainer;
use Framework\ServiceProviderInterface;
use Exception;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(ServiceContainer $container): void
    {
        $responseFactory = $container->get(ResponseFactory::class);

        $database = $container->get(Database::class);

        $homeController = new HomeController($responseFactory);
        $container->set(HomeController::class, $homeController);

        $taskController = new TaskController($responseFactory);
        $container->set(TaskController::class, $taskController);

        $taskRepository = new TaskRepository($responseFactory);
        $container->set(TaskRepository::class, $taskRepository);
    }
}
