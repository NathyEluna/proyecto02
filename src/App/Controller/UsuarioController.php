<?php

namespace App\Controller;
include_once "InterfaceController.php";

use App\Class\Usuario;
use App\Controller\InterfaceController;
use App\Exceptions\DeleteUserException;
use App\Exceptions\EditUserException;
use App\Exceptions\ReadUserException;
use App\Model\UsuarioModel;
use Ramsey\Uuid\Uuid;

class UsuarioController implements InterfaceController
{
    //GET /users
    public function index(){
        include_once __DIR__."/../View/Users/indexUser.php";
    }

    //GET /users/create
    public function create(){
        include_once __DIR__."/../View/Users/createUser.php";
    }

    //POST /users
    public function store(){
        //Guardaria en la base de datos el usuario
        //Validación del usuario.
        $errores=Usuario::filtrarDatosUsuario($_POST);
        if (is_array($errores)){
            include_once __DIR__."/../View/Users/errorUser.php";
        }else{
            $usuario = Usuario::crearUsuarioAPartirDeUnArray($_POST);
        }

        //Guardar el usuario en la BBDD
        $usuario->save();

        //Creación del usuario
        echo json_decode($usuario);
    }

    //GET /users/{id_usuario}/edit
    public function edit($id){
        //Mostraria un formulario con los datos del usuario
        echo "Formulario para editar los datos del usuario $id.";
    }

    //PUT /users/{id_usuario}
    public function update($id){
        //Guardaria los datos modificados del usuario
        $usuario = UsuarioModel::leerUsuario($id);

        //Leer de un fichero de datos los valores de PUT
        //No existe $_PUT

        //Filtraremos esos datos

        //Almacenar los cambios en la base de datos
        try{
            //UsuarioModel::editarUsuario($usuario);
            $usuario->edit();
        }catch(EditUserException $e){
            $e->getMessage();
        }//catch
    }//update

    //GET /users/{id_usuario}
    public function show($id){
        //Mostraria los datos de un solo usuario
        if(!Uuid::uuid4($id)){
            //Mostrar un error id en formato invalido.
        }else{
            try{
                UsuarioModel::leerUsuario($id);
            }catch(ReadUserException $e){
                $e->getMessage();
            }//catch
        }//else
    }//show

    //DELETE /users/{id_usuario}
    public function destroy($id){
        //Borrar los datos de un usuario
        try{
            UsuarioModel::borrarUsuario($id);
            echo "Borrado correcto.";
        }catch(DeleteUserException $e){
            echo $e->getMessage();
        }//catch
    }//destroy
}//class