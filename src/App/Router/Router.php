<?php

namespace App\Router;
use Ramsey\Uuid\Uuid;

class Router
{
    private array $rutas;

    public function __construct(){
        $this->rutas=array();
    }

    public function addRoute(string $metodohttp, string $url, array|callable $accion){
        $this->rutas[strtoupper($metodohttp)][$url]=$accion;
    }

    public function resolver(string $metodohttp, string $url){
        //Logica para crear una instancia y llamar al metodo de la clase
        $uriExplotada = explode( "/", $url);

        if (isset($this->rutas[$metodohttp][$this->cambiarIdUri($url)])){
            $accion=$this->rutas[$metodohttp][$this->cambiarIdUri($url)];
        }else{
            return include_once DIRECTORIO_VISTAS."404.php";
        }

        $accion=$this->rutas[$metodohttp][$this->cambiarIdUri($url)];

        if(is_callable($accion)){
            //Tenemos que ejecutar una funcion anonima para mostrar una vista.
            call_user_func($accion);
        }elseif(count($uriExplotada)>2){
            [$clase, $metodo] = $accion;
            $instancia = new $clase();
            call_user_func_array([$instancia, $metodo], [$uriExplotada[2]]);
        }else{
            [$clase, $metodo] = $accion;
            $instancia = new $clase();
            call_user_func([$instancia, $metodo]);
        }//else
    }//resolver

    private function cambiarIdUri(string $uri):string{
        $uriArray = explode("/", $uri);

        if(count($uriArray)>2 && Uuid::isValid($uriArray[2])){
            $uriArray[2] = "{id}";
        }

        return implode("/", $uriArray);
    }//cambiar id uri
};