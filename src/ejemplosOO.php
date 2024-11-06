<?php
include_once "Class/Usuario.php";
include_once "Class/Enum/TipoUsuario.php";
include_once "Class/Telefono.php";

use App\Class\Usuario;
use App\Class\Enum\TipoUsuario;
use App\Class\Telefono;

echo "Esto son ejemplos de orientado a objetos en PHP";

$usuario = new Usuario();

$arrayReservas = $usuario->getReservas();
$arrayReservas[] = "hola";

$usuario->setReservas($arrayReservas);

$usuario->reservas[] = "adios";

echo "<br>";
print_r($usuario->reservas);

$usuario->setUsername("charlie")
    ->setName("Carlos")
    ->setSurname("González Martinez")
    ->setDni("12345678M");

$usuario->setTipoUser(TipoUsuario::ADMIN);

$telefono = new Telefono("+34", "654876234");
$usuario->telefono[] = $telefono;

echo "<br>";
print_r($usuario->telefono);