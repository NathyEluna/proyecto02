<?php
namespace App\Class;
use JsonSerializable;
use Respect\Validation\Rules\Json;

class Telefono implements JsonSerializable
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

    //Espacio para las funciones definidas por el programados.
    public static function comprobarPrefijo(string $prefijo):bool{
        return isset($prefijos[$prefijo])?true:false;
    }

    public function obtenerTelefonoFormateado():string{
        //TODO crear la funcion para obtener el telefono formateado.
        return "telefono";
    }

    public static function crearTelefonoDesdeString(string $telefono):?Telefono{
        $telefonoSinEspacios = trim($telefono);
        $numero = Telefono::obtenerNumeroDesdeUnString($telefonoSinEspacios);
        $prefijo = Telefono::obtenerPrefijoDesdeUnString($telefonoSinEspacios);

        if($prefijo == null && $numero == null){
            return null;
        }elseif($numero == null){
            return null;
        }elseif($prefijo == null){
            return new Telefono($numero);
        }else{
            return new Telefono($numero, $prefijo);
        }
    }//crear telefono desde string

    public static function crearTelefonosDesdeArray(array $telefonos):array{
        $arrayObjetosTelefono= [];

        foreach($telefonos as $telefono){
            $arrayObjetosTelefono[] = new Telefono($telefono["phonenumber"], $telefono["phoneprefix"]);
        }
        return $arrayObjetosTelefono;
    }

    private static function obtenerNumeroDesdeUnString(string $telefono):?string{
        $telefonoSinEspacios = trim($telefono);

        if(strlen($telefonoSinEspacios) < 9){
            return null;
        }elseif (strlen($telefonoSinEspacios) === 9){
            return $telefonoSinEspacios;
        }else{
            return substr($telefonoSinEspacios, -9);
        }//else
    }//obtener numede desde un string

    private static function obtenerPrefijoDesdeUnString(string $telefono):?string{
        if(strlen($telefono) > 9){
            $telefonoSinEspacios = trim($telefono);
            $posicionDondeEmpiezaTelefono = strlen($telefonoSinEspacios)-9;
            $prefijo = substr($telefonoSinEspacios, 0, $posicionDondeEmpiezaTelefono);

            $prefijoSinSimbolos = "";

            for($i = 0; $i < strlen($prefijo); $i++){
                if(is_numeric($prefijo[$i])){
                    $prefijoSinSimbolos.= $prefijo[$i];
                }//if
            }//for

            return $prefijoSinSimbolos;
        }else{
            return null;
        }//else
    }//obtener prefijo desde string

    public function jsonSerialize(): array
    {
        return [
            "prefijo"=>$this->prefijo,
            "numero"=>$this->numero
        ];
    }
}//class