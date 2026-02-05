<?php

namespace Framework;

class Kernel
{
    private Router $router;
    public function __construct()
    {
        $this->router = new Router();
    }

    public function registerRoutes(RouteProviderInterface $routeProvider): void
    {
        $routeProvider->register($this->router);
    }

    public function handle(Request $request): Response
    {
//        $queryParameterString = implode(',', $request->queryParameters); //Turns a string array into a single string with , to separate.
//        $response = new Response(body: "$queryParameterString, $request->path"); //Double quotes let you place variables.
        return $this->router->dispatch($request);
//        return $response;
    }
}
