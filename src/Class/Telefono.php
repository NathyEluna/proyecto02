<?php

namespace Class;

class Telefono
{
    private string $prefijo;
    private string $numero;

    public function __construct(string $prefijo, string $numero){
        $this->prefijo = $prefijo;
        $this->numero = $numero;
    }

    public function getPrefijo(): string
    {
        return $this->prefijo;
    }

    public function setPrefijo(string $prefijo): void
    {
        $this->prefijo = $prefijo;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }//construct

    public function comprobarPrefijo():bool{
        //TODO crear la funcion para comprobar el prefijo.
        return true;
    }

    public function obtenerTelefonoFormateado():string{
        //TODO crear la funcion para obtener el telefono formateado.
        $telefono = "123";
        return $telefono;
    }

}//class