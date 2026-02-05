<?php

namespace App\Controllers;

use Framework\Response;

class HomeController
{
    public function index(): Response
    {
        return new Response('Welcome to my home page');
    }

    public function about(): Response
    {
        return new Response('Taskey is awesome!');
    }
}
