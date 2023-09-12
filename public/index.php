<?php declare(strict_types=1);
use Suraj\Framework\Http\Request;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// request received
$request = Request::createFromGlobals();

//perform some logic
dd($request);
//send response (string of content)

echo "hello world";