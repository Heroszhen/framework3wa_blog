<?php
use FastRoute\RouteCollector;

return function(RouteCollector $r) {
    $r->addRoute('GET', '/{id:\d+}',array(new App\Controller\ExempleHomeController(), "index"));
    $r->addRoute('GET', '/',array(new App\Controller\HomeController(), "index",));
    $r->addRoute('POST', '/',array(new App\Controller\HomeController(), "index"));
    $r->addRoute('GET', '/deconnexion',array(new App\Controller\HomeController(), "logout"));
    $r->addRoute('GET', '/admin',array(new App\Controller\AdminController(), "index"));
    $r->addRoute('POST', '/admin/addcategory',array(new App\Controller\AdminController(), "addCategory"));
    $r->addRoute('GET', '/admin/getcategory/{id:\d+}',array(new App\Controller\AdminController(), "getCategory"));
};