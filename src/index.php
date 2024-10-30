<?php
include_once "Router/Router.php";
include_once "Controller/UsuarioController.php";
use Router\Router;
use Controller\UsuarioController;

$router = new Router();

//Mostraría una landing page
$router->addRoute("GET", "/", function(){
    include_once "View/landing.php";
});
$router->addRoute("GET", "/about", function(){
    include_once "View/about.php";
});

//Rutas enlazadas a controladores, logica de la aplicacion
$router->addRoute("GET", "/users", [UsuarioController::class, "index"]);
$router->addRoute("GET", "/users/create", [UsuarioController::class, "create"]);
$router->addRoute("POST", "/users", [UsuarioController::class, "store"]);
$router->addRoute("GET", "/users/{id}/edit", [UsuarioController::class, "edit"]);
$router->addRoute("PUT", "/users/{id}", [UsuarioController::class, "update"]);
$router->addRoute("GET", "/users/{id}", [UsuarioController::class, "show"]);
$router->addRoute("DELETE", "/users/{id}", [UsuarioController::class, "destroy"]);

$router->resolver($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);