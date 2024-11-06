<?php
namespace App\Class;

class Telefono
{
    private string $prefijo;
    private string $numero;

    public function __construct(string $prefijo, string $numero){
        $this->prefijo = $prefijo;
        $this->numero = $numero;
    }

    public function getPrefijo():string{
        return $this->prefijo;
    }

    public function setPrefijo(string $prefijo):Telefono{
        $this->prefijo = $prefijo;

        return $this;
    }

    public function getNumero():string{
        return $this->numero;
    }

    public function setNumero(string $numero):Telefono{
        $this->numero = $numero;

        return $this;
    }//construct

    public function comprobarPrefijo():bool{
        //TODO crear la funcion para comprobar el prefijo.
        return true;
    }

    public function obtenerTelefonoFormateado():string{
        //TODO crear la funcion para obtener el telefono formateado.
        return "telefono";
    }

}//class