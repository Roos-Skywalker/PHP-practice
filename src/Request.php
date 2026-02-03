<?php

namespace Framework;

class Request
{
    public string $method;

    public string $path;

    /** @var array<string> */
    public array $queryParameters;

    /** @var array<string> */
    public array $postParameters;

    /**
     * @param string $method
     * @param string $path
     * @param array<string> $queryParameters
     * @param array<string> $postParameters
     */
    public function __construct(string $method, string $path, array $queryParameters, array $postParameters)
    {
        $this->method = $method;
        $this->path = $path;
        $this->queryParameters = $queryParameters;
        $this->postParameters = $postParameters;
    }
}
