<?php
 
declare(strict_types=1);

namespace Suraj\Framework\Http;
use function FastRoute\simpleDispatcher;
use FastRoute\RouteCollector;

class Kernel 
{
    public function handle(Request $request): Response
    {
        

        //create a dispatcher

        $dispatcher = simpleDispatcher(function(RouteCollector $routeCollector) {
            $routeCollector->addRoute('GET','/', function(){
                $content = "<h1>hello world</h1>";
                return new Response($content);
            });

            $routeCollector->addRoute('GET','/posts/{id:\d+}', function($routeParams){
                $content = "<h1>hello world {$routeParams['id']}</h1>";
                return new Response($content);
            });
        });

        //dispatch a uri, to obtain the route info

        $routeInfo = $dispatcher->dispatch(
            $request->server['REQUEST_METHOD'],
            $request->server['REQUEST_URI']
        );

        [$server, $handler, $vars] = $routeInfo;
        //call the handler, provided by the route info, in order to create a Response

        return $handler($vars);
    }
}