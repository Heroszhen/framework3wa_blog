<?php
use FastRoute\RouteCollector;

return function(RouteCollector $r) {
    $r->addRoute('GET', '/{id:\d+}',array(new App\Controller\ExempleHomeController(), "index"));
    $r->addRoute('GET', '/',array(new App\Controller\HomeController(), "index",));
    $r->addRoute('POST', '/',array(new App\Controller\HomeController(), "index"));
    $r->addRoute('GET', '/admin',array(new App\Controller\AdminController(), "index"));
};