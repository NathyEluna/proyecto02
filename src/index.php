<?php

//include_once "View/landing.php";

if(isset($_SERVER["REQUEST_URI"]) && $_SERVER["REQUEST_URI"] === "/users"){
    $usuario = new \Controller\UsuarioController();
    $usuario->index();
}

$rutas["GET"]["users"] = "\Controller\UsuarioController::index";