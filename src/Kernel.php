<?php

namespace Framework;

use App\ServiceProvider;

class Kernel
{
    private Router $router;
    private serviceContainer $container;
    public function __construct()
    {
        $this->router = new Router();
        $this->container = new ServiceContainer();
    }

    public function registerRoutes(RouteProviderInterface $routeProvider): void
    {
        $routeProvider->register($this->router);
    }

    public function registerServices(ServiceProviderInterface $serviceProvider): void
    {
        $serviceProvider->register($this->container);
    }

    public function handle(Request $request): Response
    {
//        $queryParameterString = implode(',', $request->queryParameters); //Turns a string array into a single string with , to separate.
//        $response = new Response(body: "$queryParameterString, $request->path"); //Double quotes let you place variables.
        return $this->router->dispatch($request);
//        return $response;
    }
}
