<?php

namespace App\Controller;
include_once "InterfaceController.php";
use App\Controller\InterfaceController;

class ClienteController implements InterfaceController
{
    //GET /clients
    public function index(){
        include_once "./View/Users/indexUser.php";
        echo "";
    }

    //GET /clients/create
    public function create(){
        //Aqui mostrariamos el formulario de registro
        echo "Formulario de registro de cliente.";
    }

    //POST /clients
    public function store(){
        //Guardaria en la base de datos el cliente
        echo "Funcion para guardar un cliente.";
    }

    //GET /clients/{id_cliente}/edit
    public function edit($id){
        //Mostraria un formulario con los datos del cliente
        echo "Formulario para editar los datos del cliente $id.";
    }

    //PUT /clients/{id_cliente}
    public function update($id){
        //Guardaria los datos modificados del cliente
        echo "Funcion para actualizar los datos en la BD del cliente $id.";
    }

    //GET /clients/{id_cliente}
    public function show($id){
        //Mostraria los datos de un solo cliente
        echo "Mostrar los datos de un cliente $id.";
    }

    //DELETE /clients/{id_cliente}
    public function destroy($id){
        //Borrar los datos de un cliente
        echo "Funcion para borrar los datos del cliente $id.";

    }
}