<?php
 
declare(strict_types=1);

namespace Suraj\Framework\Http;

class Kernel 
{
    public function handle(Request $request): Response
    {
        $content = "<h1>hello world</h1>";
        return new Response($content);
    }
}