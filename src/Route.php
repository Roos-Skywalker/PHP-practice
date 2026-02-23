<?php

namespace Framework;

class Route
{
    private string $method;
    private string $path;

    public string $routeParameters;

    /**
     * @var callable
     */
    public $callback;

    public function __construct(string $method, string $path, callable $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }

    public function matches(string $method, string $path): bool
    {
//        return $this->method === $method && $this->path === $path;
        $pattern = ';^$'; . $this->path .'/?$';';
        if (preg_match($pattern, $path $matches)) {
            $this->routeParameters = $matches;
            return true;
        }
        return false;
}
