<?php declare(strict_types=1);
use Suraj\Framework\Http\Request;
use Suraj\Framework\Http\Response;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// request received
$request = Request::createFromGlobals();

//perform some logic
$content =  "<h1>hello world</h1>";

$response = new Response(content: $content, status: 200, header: []);
//send response (string of content)
$response->send();
