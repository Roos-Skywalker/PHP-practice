<?php

namespace Framework;

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
     */
    public function set(string $id, object $instance): void
    {
        $this->instance[$id] = $instance;
    }

    /**
     * @template T of object
     * @param class-string $id
     * @return T
     */
    public function get(string $id): object
    {
        return $this->instance[$id];
    }
}