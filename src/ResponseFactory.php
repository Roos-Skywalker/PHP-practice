<?php

namespace Framework;

class ResponseFactory
{
    public function body(string $body): Response
    {
        $response = new Response($body, 200);
        return $response;
    }
}