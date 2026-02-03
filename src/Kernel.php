<?php

namespace Framework;

class Kernel
{
    public function __construct()
    {
    }

    public function handle(Request $request): Response
    {
        $queryParameterString = implode(',', $request->queryParameters); //Turns a string array into a single string with , to separate.
        $response = new Response(body: "$queryParameterString, $request->path"); //Double quotes let you place variables.
        return $response;
    }
}
