<?php

namespace Framework;

class ResponseFactory
{
    private \Twig\Environment $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $this->twig = new \Twig\Environment($loader);
    }
    public function body(string $body): Response
    {
        $newBody = "<div style=color:green;>" . $body . "</div>";
        $response = new Response($newBody, 200);
        return $response;
    }

    public function view(string $template, $parameters): Response
    {
        $response = new Response($this->twig->render($template, $parameters), 200);
        return $response;
    }

    public function notFound(): Response
    {
        $response = new Response("Not Found", 404);
        return $response;
    }
}
