<?php

namespace App\Controllers;

use App\Models\Repositories\TaskRepository;
use App\Models\Task;
use DateTime;
use Framework\Response;
use Framework\ResponseFactory;

class TaskController
{
    private ResponseFactory $responseFactory;

    private TaskRepository $taskRepository;

    public function __construct(ResponseFactory $responseFactory, TaskRepository $taskRepository)
    {
        $this->responseFactory = $responseFactory;
        $this->taskRepository = $taskRepository;
    }
    public function index(): Response
    {
        $tasks = $this->taskRepository->all();
        return $this->responseFactory->view('index.html.twig', ['tasks' => $tasks]);
    }

    public function create(): Response
    {
        return $this->responseFactory->view('./Tasks/create.html.twig');
    }

    public function show(Request $request): Response
    {
        $taskId = (int)$request->get('id');
        $task = $this->taskRepository->find($taskId);
        if ($task === null) {
            return $this->responseFactory->notFound();
        }
        return $this->responseFactory->view('./Tasks/show.html.twig', ['task' => $task]);
    }

    public function store(Request $request): Response {
        $title = $request->get('title');
        $description = $request->get('description');
        $priority = $request->get('priority');
        $status = $request->get('status');
        $createdAt = DateTime::createFromFormat('Y-m-d H:i:s', (int)$request->get('createdAt'));

        $errors = array();

        // Check if data is valid.
        if ($title === null || === '') {
            $errors['title'] = 'Title is required';
        }

        if ($description === null || === '') {
            $errors['description'] = 'Description is required';
        }

        if (!is_numeric($priority)) {
            $errors[] = 'Priority must be numeric';
        }

        if (!is_numeric($status)) {
            $errors[] = 'Status must be numeric';
        }

        if (!$createdAt) {
            $createdAt = date('%s');
        } else {
            $task->createdAt = $createdAt->getTimestamp();
        }

        if (!empty($errors)) {
            return $this->responseFactory->view('tasks/create.html.twig', ['errors' => $errors]);
            // Rework to implode errors array.
        }

        // If all data is valid add to database.
        $task = new Task();
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->priority = (int)$request->get('priority');
        $task->status = (int)$request->get('status');

        $task = $this->taskRepository->insert($task);
        if ($task === null) {
            return $this->responseFactory->internalError();
        }
        return $this->responseFactory->redirect('/tasks/' . $task->id);
    }
}
