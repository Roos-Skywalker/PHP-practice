<?php

namespace App\Models;

class Task
{
    public int $id;
    public string $title;
    public string $description;
    public int $priority;
    public int $status;
    public int $progress;
    public int $createdAt;
    public int $completedAt;

    public function __construct() {
        $this->id = 0;
        $this->title = '';
        $this->description = '';
        $this->priority = 0;
        $this->status = 0;
        $this->progress = 0;
        $this->createdAt = 0;
        $this->completedAt = 0;
    }
}