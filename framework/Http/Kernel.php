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
            $routes = include BASE_PATH . '/routes/web.php';
            foreach($routes as $route){
                $routeCollector->addRoute(...$route);
            }
            // $routeCollector->addRoute('GET','/', function(){
            //     $content = "<h1>hello world</h1>";
            //     return new Response($content);
            // });

            // $routeCollector->addRoute('GET','/posts/{id:\d+}', function($routeParams){
            //     $content = "<h1>hello world {$routeParams['id']}</h1>";
            //     return new Response($content);
            // });
        });

        //dispatch a uri, to obtain the route info
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo()
        );

        [$status, [$controller, $method], $vars] = $routeInfo;
        //call the handler, provided by the route info, in order to create a Response
        $response = (new $controller())->$method($vars);

        return $response;
    }
}