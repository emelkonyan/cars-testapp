<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    /*** Include files */
    include('../bootstrap.php');

    /*** Routing */
    /**
     * Very basic routing - every route is in a single controller
     * TODO: fix the routes to call a particular controller methods
     */
    $routes['login'] = 'login';
    $routes['register'] = 'register';
    $routes['dashboard'] = 'dashboard';
    $routes['logout'] = 'logout';
    $routes['addlib'] = 'addlib';
    $routes['removelib'] = 'removelib';

    $route = @$_GET['path'];

    if(!$route) {
        $controller_name = 'home';
    } else if(!in_array($route, $routes)) {
        $controller_name = 'page404';
    } else {
        $controller_name = $routes[$route];
    }

    $controller = new $controller_name;
    /** TODO: prepare method is a single point ot entry, should be designed better */
    $controller->prepare();
    $controller->display();