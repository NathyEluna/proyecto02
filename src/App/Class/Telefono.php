<?php
namespace App\Class;

class Telefono
{
    private string $prefijo;
    private string $numero;

    public function __construct(string $numero, string $prefijo = "+34"){
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

    public static function crearTelefonoDesdeString(string $telefono):Telefono{
        $telefonoSinEspacio = trim($telefono);
        $numero = Telefono::obtenerNumeroDesdeUnString($telefonoSinEspacio);
        $prefijo = Telefono::obtenerPrefijoDesdeUnString($telefonoSinEspacio);

        return new Telefono($numero, $prefijo);
    }

    private static function obtenerNumeroDesdeUnString(string $telefono):string{

        //TODO crear la funcion para obtener el numero de un string
        return "telefono";
    }

    private static function obtenerPrefijoDesdeUnString(string $telefono):string{


        return "prefijo";
    }

}//class