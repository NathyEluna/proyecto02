<?php

namespace App\Model;
use App\Class\Usuario;
use App\Exceptions\DeleteUserException;
use App\Exceptions\ReadUserException;
use \PDO;
use PDOException;

class UsuarioModel{

    private static function conectarABD():?PDO{
        try{
            $conexion = new PDO("mysql:host=".NOMBRE_CONTAINER_DATABASE.";dbname=".NOMBRE_DATABASE, USUARIO_DATABASE, PASS_DATABASE);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }catch(PDOException $e){
            echo "Fallo de conexión".$e->getMessage();
        }

        return null;
    }
    public static function guardarUsuario(Usuario $usuario){
        //Conexión a la base de datos
        $conexion = UsuarioModel::conectarABD();

        //echo $conexion->getAttribute(PDO::ATTR_CONNECTION_STATUS);

        //Creación de la consulta SQL
        $sql = "INSERT INTO USER(
                 USERUUID, USERNICK, USERPASS, USERDNI, USEREMAIL, USERBIRTHDATE, USERNAME, USERSURNAME,
                 USERADDRESS, USERMARK, USERCARD, USERDATA, USERTYPE) 
                VALUES(
                :uuid, :username, :password, :dni, :email, STR_TO_DATE(:fechanac, '%d/%m/%Y'), :name, :surname,
                :direccion, :calificacion, :tarjeta_pago, :datos_adicionales, :tipo)";

        $sqlTelefono = "INSERT INTO TELEFONO(PHONEPREFIX, PHONENUMBER, USERUUID)
                        VALUES (:prefijo, :numero, :uuid_user)";

        //Para preparar a busca e ver se n tem nenhum codigo maliciono nas buscas, como um sql injection. fazer isso sempre.
        $sentenciaPreparada = $conexion->prepare($sql);
        $sentenciaPreparadaTelefono = $conexion->prepare($sqlTelefono);

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
        //Necesitamos guardar el usuario antes de guardar el telefono para que la FK funcione.
        $sentenciaPreparada->execute();

        //Realizamos un bucle para guardar todos los telefonos asociados.
        foreach($usuario->getTelefono() as $telefono){
            $sentenciaPreparadaTelefono->bindValue("prefijo", $telefono->getPrefijo());
            $sentenciaPreparadaTelefono->bindValue("numero", $telefono->getNumero());
            $sentenciaPreparadaTelefono->bindValue("uuid_user", $usuario->getUuid());
            $sentenciaPreparadaTelefono->execute();
        };

    }//guardar usuario

    public static function borrarUsuario(string $uuidUsuario):bool{
        $conexion = UsuarioModel::conectarABD();

        $sql = "DELETE FROM USER WHERE USERUUID=?";

        $sentenciaPreparada = $conexion->prepare($sql);
        $sentenciaPreparada->bindValue(1, $uuidUsuario);
        $sentenciaPreparada->execute();

        //Gestionar los errores de ejecucion.
        if($sentenciaPreparada->rowCount()==0){
            throw new DeleteUserException();
        }else{
            return true;
        }//else
    }//borrar usuario

    public static function leerUsuario($uuidUsuario):?Usuario{
        //Crear una conexion con la base de datos
        $conexion = UsuarioModel::conectarABD();

        //Crear una variable con la sentencia sql que queremos ejecutar.
        $sql = "SELECT USERUUID, USERNAME, USERSURNAME, USERPASS, USEREMAIL, 
        USERADDRESS, DATE_FORMAT(USERBIRTHDATE, '%d/%m/%Y') AS USERBIRTHDATE, 
        USERNICK, USERCARD, USERDATE, USERTYPE, USERMARK FROM USER WHERE USERUUID=:uuid";

        //Preparar la sentencia a ejecutar
        $sentenciaPreparada = $conexion->prepare($sql);

        //Hacer la asignacion de los parametros de la sql al valor
        $sentenciaPreparada->bindValue("uuid", $uuidUsuario);

        //Ejecutar la consulta con los parametros ya cambiados en la base de datos
        $sentenciaPreparada->execute();

        if($sentenciaPreparada->rowCount()===0){
            //Se ha producido un erro
            throw new ReadUserException();
        }else{
            //Ler de la base de datos un usuario
            $datosUsuario = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
            return Usuario::crearUsuarioAPartirDeUnArray($datosUsuario);
        }//else
    }//leer usuario
}//class