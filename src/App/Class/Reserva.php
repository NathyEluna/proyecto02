<?php

namespace App\Class;

use App\Class\Cliente;
use App\Class\Usuario;
use App\Class\Enum\MetodoPago;
use DateTime;

class Reserva{
    private string $uuid;
    private Usuario $usuario;
    private DateTime $fecha;
    private int $unidades;
    private float $coste;
    private Cliente $cliente;
    private MetodoPago $metodoPago;
    private int $numCambios;

    //Constructor
    public function __construct(string $uuid){
        $this->uuid = $uuid;
    }

    //Getters y Setters
    public function getUuid():string{
        return $this->uuid;
    }

    public function setUuid(string $uuid):Reserva{
        $this->uuid = $uuid;
        return $this;
    }

    public function getUsuario():Usuario{
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario):Reserva{
        $this->usuario = $usuario;
        return $this;
    }

    public function getFecha():DateTime{
        return $this->fecha;
    }

    public function setFecha(DateTime $fecha):Reserva{
        $this->fecha = $fecha;
        return $this;
    }

    public function getCliente():Cliente{
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente):Reserva{
        $this->cliente = $cliente;
        return $this;
    }

    public function getMetodoPago():MetodoPago{
        return $this->metodoPago;
    }

    public function setMetodoPago(MetodoPago $metodoPago):Reserva{
        $this->metodoPago = $metodoPago;
        return $this;
    }

    public function getNumCambios():int{
        return $this->numCambios;
    }

    public function setNumCambios(int $numCambios):Reserva{
        $this->numCambios = $numCambios;
        return $this;
    }

    public function getUnidades():int{
        return $this->unidades;
    }

    public function setUnidades(int $unidades):Reserva{
        $this->unidades = $unidades;
        return $this;
    }

    public function getCoste():float{
        return $this->coste;
    }

    public function setCoste(float $coste):Reserva{
        $this->coste = $coste;
        return $this;
    }

    //Metodos
    public function modificarReserva():bool{
        return false;
    }//modificar reserva
}//class