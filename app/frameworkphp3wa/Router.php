<?php

namespace Frameworkphp3wa;

use App\Controller\Home;
use App\Controller\Security;
use FastRoute;

class Router{
    public function setRoutes($twig) 
    {
        $_GET["twig"] = $twig;
        $routes = include dirname(__DIR__).'/routes.php';
        return FastRoute\simpleDispatcher($routes);
    }

    public function getRouter($twig,$dispatcher){
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        
        $routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($uri));
        if($routeInfo[0] == FastRoute\Dispatcher::FOUND) {
            //var_dump($routeInfo[1]);
            if(is_array($routeInfo[1])){
                //$response = call_user_func_array(array($routeInfo[1][0], $routeInfo[1][1]),$routeInfo[1][2]);
                //echo $twig->render($response[0], ["parameters"=>$response[1]]); 
                call_user_func_array(array($routeInfo[1][0], $routeInfo[1][1]),$routeInfo[1][2]);
            }
            else call_user_func_array($routeInfo[1], $routeInfo[2]); 
        } elseif ($routeInfo[0] == FastRoute\Dispatcher::NOT_FOUND) {
            header('HTTP/1.0 404 Not Found');
            $security = new Security();
            $response = $security->index();
            echo $twig->render($response[0], ["parameters"=>$response[1]]); 
        }
    }
}