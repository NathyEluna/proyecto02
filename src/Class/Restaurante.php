<?php

namespace Class;
use Class\Cliente;
class Restaurante extends Cliente{
    private int $mesas;
    private string $menu;
    private int $mesasDisponibles;
    private float $precioMenu;

    //Constructor
    public function __construct(string $uuid){
        parent::__construct($uuid);
    }

    //Getters y Setters
    public function getMesas():int{
        return $this->mesas;
    }

    public function setMesas(int $mesas):Restaurante{
        $this->mesas = $mesas;
        return $this;
    }

    public function getMenu():string{
        return $this->menu;
    }

    public function setMenu(string $menu):Restaurante{
        $this->menu = $menu;
        return $this;
    }

    public function getMesasDisponibles():int{
        return $this->mesasDisponibles;
    }

    public function setMesasDisponibles(int $mesasDisponibles):Restaurante{
        $this->mesasDisponibles = $mesasDisponibles;
        return $this;
    }

    public function getPrecioMenu():float{
        return $this->precioMenu;
    }

    public function setPrecioMenu(float $precioMenu):Restaurante{
        $this->precioMenu = $precioMenu;
        return $this;
    }

    //Metodos
    function comprobarDisponibilidad(): bool
    {
        // TODO: Implement comprobarDisponibilidad() method.
        return false;
    }
}//class