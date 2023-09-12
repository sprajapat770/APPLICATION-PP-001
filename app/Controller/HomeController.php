<?php

namespace App\Controller;
use Suraj\Framework\Http\Response;

class HomeController
{
    public function index(): Response
    {
        $content = "<h1>hello world</h1>";
        return new Response($content);
    }
}