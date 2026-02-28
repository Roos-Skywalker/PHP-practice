<?php

namespace App\Models\Repositories;

use app\Models\Task;

interface TaskRepositoryInterface
{
    public function all(): array;

    public function find(int $id): ?Task;
}