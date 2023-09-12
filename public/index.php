<?php declare(strict_types=1);
use Suraj\Framework\Http\Request;
use Suraj\Framework\Http\Kernel;


define('BASE_PATH', dirname(__DIR__));
require_once dirname(__DIR__) . '/vendor/autoload.php';


// request received
$request = Request::createFromGlobals();

//perform some logic
$kernel = new Kernel();
$response = $kernel->handle($request);
//send response (string of content)
$response->send();
