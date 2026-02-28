<?php

namespace Framework;

use App\ServiceProvider;

class Kernel
{
    private Router $router;
    private ServiceContainer $container;
    private ConfigManager $config;
    public function __construct(array $config)
    {
        $this->container = new ServiceContainer();
        $responseFactory = new ResponseFactory();

        $this->configManager = new ConfigManager($config);
        $viewsPath = $this->configManager->get('VIEWS_PATH');

        $this->container->set(ResponseFactory::class, $responseFactory);
        $this->router = new Router($responseFactory);

        $dbName = $this->configManager->get('APP_DB');
        $database = new Database(__DIR__ . '/../' . $dbName);
        $this->container->set(Database::class, $database);
    }

    public function registerRoutes(RouteProviderInterface $routeProvider): void
    {
        $routeProvider->register($this->router, $this->container);
    }

    public function registerServices(ServiceProviderInterface $serviceProvider): void
    {
        $serviceProvider->register($this->container);
    }

    public function handle(Request $request): Response
    {
        return $this->router->dispatch($request);
    }

    public function getDatabase(): Database {
        return $this->container->get(Database::class);
    }
}
