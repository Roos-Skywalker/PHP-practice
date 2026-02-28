<?php

namespace App\Models\Repositories;

use App\Models\Task;
use Framework\Database;

class TaskRepository implements TaskRepositoryInterface
{
    /** @var array<int, mixed> */
    private array $tempTasks = array(
        array(
            "id" => 1,
            "title" => "Form the Fellowship",
            "description" => "Assemble representatives of the Free Peoples in Rivendell",
            "priority" => 3,
            "status" => 4,
            "progress" => 100,
            "created_at" => 1008710400,
            "completed_at" => 1008720400),
        array(
            "id" => 2,
            "title" => "Cross the Misty Mountains",
            "description" => "Find a safe passage through or around the mountains",
            "priority" => 2,
            "status" => 1,
            "progress" => 50,
            "created_at" => 1008720400,
            "completed_at" => null),
        array(
            "id" => 3,
            "title" => "Enter Moria",
            "description" => "Take the risky path through the Mines of Moria",
            "priority" => 2,
            "status" => 3,
            "progress" => 0,
            "created_at" => 1008740400,
            "completed_at" => null)
    );

    private Database $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    /**
     * @return array<Task>
     */
    private function fromDbRow(mixed $row): Task
    {
        $task = new Task();
        $task->id = $row->task_id;
        $task->name = $row->title;
        $task->description = $row->description;
        $task->priority = $row->priority;
        $task->status = $row->status;
        $task->progress = $row->progress;
        $task->created_at = $row->created_at;
        $task->completed_at = $row->completed_at;
        return $task;
    }

    /**
     * @return array<Task>
     */
    public function all(): array {
        $tasks = array();
        $statement = $this->database->run("SELECT * FROM tasks")->fetchAll();
        forEach($statement as $row) {
            $task = new Task();
            $task->id = $row->task_id;
            $task->name = $row->title;
            $task->description = $row->description;
            $task->priority = $row->priority;
            $task->status = $row->status;
            $task->progress = $row->progress;
            $task->created_at = $row->created_at;
            $task->completed_at = $row->completed_at;
            $tasks[] = $task;
        }
        return $tasks;
    }

    public function find(int $id): ?Task {
        $task = new Task();

        forEach($this->tempTasks as $tempTask) {
            if ($tempTask["id"] == $id) {
                $task = $tempTask['id'];
                $task->name = $tempTask["name"];
                $task->title = $tempTask["title"];
                $task->description = $tempTask["description"];
                $task->priority = $tempTask["priority"];
                $task->status = $tempTask["status"];
                $task->progress = $tempTask["progress"];
                $task->createdAt = $tempTask["created_at"];
                $task->completedAt = $tempTask["completed_at"];
                return $task;
            }
        }
        return null;
    }
    public function find(int $id): ?Task {
        $task = $this->database->run('SELECT * FROM tasks WHERE task_id = :something',
            ['something' => $id])->fetch();

        if (!$row) {
            return null;
        }
    }
}