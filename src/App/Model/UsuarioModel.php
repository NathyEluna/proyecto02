<?php

namespace App\Model;
use App\Class\Usuario;
use PDO;
use PDOException;

class UsuarioModel{

    private static function conectarABD():?PDO{
        try{
            $conexion = new PDO("mysql:host=".NOMBRE_CONTAINER_DATABASE."; dbname=".NOMBRE_DATABASE, USUARIO_DATABASE, PASS_DATABASE);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Fallo de conexión".$e->getMessage();
        }

        return null;
    }
    public static function guardarUsuario(Usuario $usuario){
        //Conexión a la base de datos
        $conexion = UsuarioModel::conectarABD();

        //Creación de la consulta SQL

        //Enlazado de parametros dentro de la consulta

        //La ejecucion de la consulta contra la base de datos
    }
}//class