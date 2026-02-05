<?php

namespace App\Controllers;

use Framework\Response;

class TaskController
{
    public function index(): Response
    {
        return new Response('Welcome to my home page');
    }

    public function create(): Response
    {
        return new Response('Create a new task');
    }
}