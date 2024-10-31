<?php

namespace Controller;

interface InterfaceController
{
    //GET /bookings
    public function index();

    //GET /bookings/create
    public function create();

    //POST /bookings
    public function store();

    //GET /bookings/{id_cliente}/edit
    public function edit($id);

    //PUT /bookings/{id_cliente}
    public function update($id);

    //GET /bookings/{id_cliente}
    public function show($id);

    //DELETE /bookings/{id_cliente}
    public function destroy($id);
}