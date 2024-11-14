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

        echo $conexion->getAttribute(PDO::ATTR_CONNECTION_STATUS);

        //Creación de la consulta SQL
        $sql = "INSERT INTO USER(
                 UUID, USERNAME, PASSWORD, DNI, EMAIL, FECHANAC, NAME, SURNAME,
                 DIRECCION, CALIFICACION, TARJETA_PAGO, DATOS_ADICIONALES, TIPO) 
                VALUES(
                :uuid, :username, :password, :dni, :email, STR_TO_DATE(:fechanac, '%d/%m/%Y'), :name, :surname,
                :direccion, :calificacion, :tarjeta_pago, :datos_adicionales, :tipo)";

        //Para preparar a busca e ver se n tem nenhum codigo maliciono nas buscas, como um sql injection. fazer isso sempre.
        $sentenciaPreparada = $conexion->prepare($sql);

        //Enlazado de parametros dentro de la consulta
        $sentenciaPreparada->bindValue("uuid", $usuario->getUuid());
        $sentenciaPreparada->bindValue("username", $usuario->getUsername());
        $sentenciaPreparada->bindValue("password", $usuario->getPassword());
        $sentenciaPreparada->bindValue("dni", $usuario->getDni());
        $sentenciaPreparada->bindValue("email", $usuario->getEmail());
        $sentenciaPreparada->bindValue("fechanac", $usuario->getFechaNac()->format("d/m/Y"));
        $sentenciaPreparada->bindValue("name", $usuario->getName());
        $sentenciaPreparada->bindValue("surname", $usuario->getSurname());
        $sentenciaPreparada->bindValue("direccion", $usuario->getDireccion());
        $sentenciaPreparada->bindValue("calificacion", $usuario->getCalificacion());
        $sentenciaPreparada->bindValue("tarjeta_pago", $usuario->getTarjertaPago());
        $sentenciaPreparada->bindValue("datos_adicionales", $usuario->getDatosAdicionales());
        $sentenciaPreparada->bindValue("tipo", $usuario->getTipoUser()->name);

        //La ejecucion de la consulta contra la base de datos
    }
}//class