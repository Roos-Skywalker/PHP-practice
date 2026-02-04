<?php

namespace Framework;

class Route
{
    private string $method;
    private string $path;
    public string $return;

    public function __construct(string $method, string $path, string $return)
    {
        $this->method = $method;
        $this->path = $path;
        $this->return = $return;
    }

    public function matches($method, $path): bool
    {
        return $this->method === $method && $this->path === $path;
    }
}