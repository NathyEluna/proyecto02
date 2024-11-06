<?php

namespace App\Class;

use App\Class\Cliente;

class Hotel extends Cliente
{
    private int $habitaciones;
    public array $servicios;
    private int $categoria;
    private int $habitacionesDisponibles;
    private float $precio;

    //Constructor
    public function __construct(string $uuid)
    {
        parent::__construct($uuid);
        $this->servicios = array();
    }

    //Getters y Setters
    public function getHabitaciones(): int
    {
        return $this->habitaciones;
    }

    public function setHabitaciones(int $habitaciones): Hotel
    {
        $this->habitaciones = $habitaciones;

        return $this;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): Hotel
    {
        $this->precio = $precio;

        return $this;
    }

    public function getHabitacionesDisponibles(): int
    {
        return $this->habitacionesDisponibles;
    }

    public function setHabitacionesDisponibles(int $habitacionesDisponibles): Hotel
    {
        $this->habitacionesDisponibles = $habitacionesDisponibles;

        return $this;
    }

    public function getCategoria(): int
    {
        return $this->categoria;
    }

    public function setCategoria(int $categoria): Hotel
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getServicios(): array
    {
        return $this->servicios;
    }

    public function setServicios(array $servicios): Hotel
    {
        $this->servicios = $servicios;

        return $this;
    }

    //Metodos y funciones
    function comprobarDisponibilidad(): bool
    {
        // TODO: Implement comprobarDisponibilidad() method.
        return false;
    }//comprobar disponibilidad
}//class