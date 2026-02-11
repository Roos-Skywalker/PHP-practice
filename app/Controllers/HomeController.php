<?php

namespace App\Controllers;

use Framework\Response;
use Framework\ResponseFactory;

class HomeController
{
    private ResponseFactory $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }
    public function index(): Response
    {
        $response = $this->responseFactory->body("Home page");
        return $response;
//        return new Response('Welcome to my home page');
    }

    public function about(): Response
    {
        return $this->responseFactory->body('Taskey is awesome!');
    }
}
