<?php

namespace Framework;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class ResponseFactory
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('../app/views');
        $this->twig = new \Twig\Environment($loader, ['debug' => true]);
    }

    /**
     * @param string $template
     * @param array<string> $parameters
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function view(string $template, array $parameters = []): Response
    {
        return new Response($this->twig->render($template, $parameters), 200);
    }

    public function notFound(): Response
    {
        return new Response($this->twig->render('404.html.twig'),404);
    }

    public function redirect(string $url): Response {
        $response = new Response();
        $response->responseCode = 302;
        $response->header = "Location:" . $url;
        return $response;
    }

    public function internalError(string $message): Response {
        $response = new Response();
        $response->responseCode = 500;
        return $response;
    }
}
