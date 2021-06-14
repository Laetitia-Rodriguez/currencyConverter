<?php

// Composer dependencies
require __DIR__.'/../vendor/autoload.php';

$baseURL = $_SERVER['BASE_URI'];


// Controllers
require __DIR__.'/../app/Controllers/MainController.php';



// Altorouter is a composer dependency for router
$router = new AltoRouter();

// Basepath
$router->setBasePath($_SERVER['BASE_URI']);

// Routes

// Template for the homepage with the convert form
$router->map(
    'GET', 
    '/', 
    ["controller" => "MainController",
    "method" => "home"],
    'main-home'
);

$match = $router->match();

if ($match) {
    $methodToCall = $match ["target"]["method"];
    $controllerToCall = 'Convertisseur\Controllers\\' . $match ["target"]["controller"];
    $controller = new $controllerToCall($router);
    $controller->$methodToCall ( $match['params'] );
}

else {
    exit("404");
}

        