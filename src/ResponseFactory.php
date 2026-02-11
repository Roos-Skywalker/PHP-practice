<?php

namespace Framework;

class ResponseFactory
{
    public function body(string $body): Response
    {
        $newBody = "<div style=color:green;>" . $body . "</div>";
        $response = new Response($newBody, 200);
        return $response;
    }

    public function notFound(): Response
    {
        $response = new Response("Not Found", 404);
        return $response;
    }
}
