<?php

namespace App\Controller;
include_once "InterfaceController.php";
use App\Controller\InterfaceController;

class ReservasController implements InterfaceController
{
    //GET /bookings
    public function index(){
        include_once "./View/Users/indexUser.php";
        echo "";
    }

    //GET /bookings/create
    public function create(){
        //Aqui mostrariamos el formulario de registro
        echo "Formulario de registro de reserva.";
    }

    //POST /bookings
    public function store(){
        //Guardaria en la base de datos la reserva
        echo "Funcion para guardar una reserva.";
    }

    //GET /bookings/{id_cliente}/edit
    public function edit($id){
        //Mostraria un formulario con los datos de la reserva
        echo "Formulario para editar los datos de la reserva $id.";
    }

    //PUT /bookings/{id_cliente}
    public function update($id){
        //Guardaria los datos modificados de la reserva
        echo "Funcion para actualizar los datos en la BD de la reserva $id.";
    }

    //GET /bookings/{id_cliente}
    public function show($id){
        //Mostraria los datos de una solo reserva
        echo "Mostrar los datos de la reserva $id.";
    }

    //DELETE /bookings/{id_cliente}
    public function destroy($id){
        //Borrar los datos de una reserva
        echo "Funcion para borrar los datos de la reserva $id.";

    }
}