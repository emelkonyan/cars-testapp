<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    /*** Include files */
    include('../bootstrap.php');

    /*** Routing */
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
    $controller->prepare();
    $controller->display();