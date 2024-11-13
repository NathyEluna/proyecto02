<?php
include_once "environment.php";
include_once "vendor/autoload.php";
use App\Router\Router;
use App\Controller\UsuarioController;
use App\Controller\ClienteController;
use App\Controller\ReservasController;

$router = new Router();

//Mostraría una landing page
$router->addRoute("GET", "/", function(){
    include_once DIRECTORIO_VISTAS."landing.php";
});
$router->addRoute("GET", "/about", function(){
    include_once DIRECTORIO_VISTAS."about.php";
});

$router->addRoute('get','/login',function(){
    include_once DIRECTORIO_VISTAS . "login.php";
});

$router->addRoute('get','/services',function(){
    include_once DIRECTORIO_VISTAS . "services.php";
});

$router->addRoute('get','/contact',function(){
    include_once DIRECTORIO_VISTAS."contacto.php";
});

//Rutas enlazadas a controladores, logica de la aplicacion
//Usuarios
$router->addRoute("GET", "/users", [UsuarioController::class, "index"]);
$router->addRoute("GET", "/users/create", [UsuarioController::class, "create"]);
$router->addRoute("POST", "/users", [UsuarioController::class, "store"]);
$router->addRoute("GET", "/users/{id}/edit", [UsuarioController::class, "edit"]);
$router->addRoute("PUT", "/users/{id}", [UsuarioController::class, "update"]);
$router->addRoute("GET", "/users/{id}", [UsuarioController::class, "show"]);
$router->addRoute("DELETE", "/users/{id}", [UsuarioController::class, "destroy"]);

//Clientes
$router->addRoute("GET", "/clients", [ClienteController::class, "index"]);
$router->addRoute("GET", "/clients/create", [ClienteController::class, "create"]);
$router->addRoute("POST", "/clients", [ClienteController::class, "store"]);
$router->addRoute("GET", "/clients/{id}/edit", [ClienteController::class, "edit"]);
$router->addRoute("PUT", "/clients/{id}", [ClienteController::class, "update"]);
$router->addRoute("GET", "/clients/{id}", [ClienteController::class, "show"]);
$router->addRoute("DELETE", "/clients/{id}", [ClienteController::class, "destroy"]);

//Reservas
$router->addRoute("GET", "/bookings", [ReservasController::class, "index"]);
$router->addRoute("GET", "/bookings/create", [ReservasController::class, "create"]);
$router->addRoute("POST", "/bookings", [ReservasController::class, "store"]);
$router->addRoute("GET", "/bookings/{id}/edit", [ReservasController::class, "edit"]);
$router->addRoute("PUT", "/bookings/{id}", [ReservasController::class, "update"]);
$router->addRoute("GET", "/bookings/{id}", [ReservasController::class, "show"]);
$router->addRoute("DELETE", "/bookings/{id}", [ReservasController::class, "destroy"]);

$router->resolver($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);