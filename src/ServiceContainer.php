<?php

namespace Framework;
use Exception;

class ServiceContainer
{
    /**
     * @var array<class-string, object>
     */
    private array $instance = [];

    /**
     * @template T of object
     * @param class-string<T> $id
     * @param T $instance
     * @return void
     * @throws Exception
     */
    public function set(string $id, object $instance): void
    {
        if (isset($this->instance[$id])) {
            throw new Exception("Service container already exists: $id");
        }
        $this->instance[$id] = $instance;
    }

    /**
     * @template T of object
     * @param class-string $id
     * @return T
     * @throws Exception
     */
    public function get(string $id): object
    {
        if (!isset($this->instance[$id])) {
            throw new Exception("Service container does not exist: $id");
        }
        return $this->instance[$id];
    }
}