<?php

namespace Framework;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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

    /**
     * @param string $template
     * @param array<string> $parameters
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function view(string $template, array $parameters): Response
    {
        return new Response($this->twig->render($template, $parameters), 200);
    }

    public function notFound(): Response
    {
        $response = new Response("Not Found", 404);
        return $response;
    }
}
