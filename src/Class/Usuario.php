<?php
namespace Class;
include_once "Enum/TipoUsuario.php";
use Class\Enum\TipoUsuario;
use DateTime;
class Usuario
{
    private string $username;
    private string $password;
    private string $dni;
    private string $email;
    private DateTime $fechaNac;
    private string $name;
    private string $surname;
    private string $direccion;
    public array $telefono;
    public array $reservas;
    private string $tarjertaPago;
    private float $calificacion;
    private TipoUsuario $tipoUser;
    public array $datosAdicionales;

    //Métodos de la clase Usuario

    public function __construct(){
        //$this->reservas = [];
        $this->reservas = array();
        $this->telefono = array();
        $this->datosAdicionales = array();
        $this->calificacion = 3;
        $this->tipoUser = TipoUsuario::USER;
    }//construct

    public function getUsername(): string{
        return $this->username;
    }//getUsername

    public function setUsername(string $username):Usuario{
        $this->username = $username;
        return $this;
    }//setUsername

    public function getPassword(): string
    {
        return $this->password;
    }//getPassword

    public function setPassword(string $password):Usuario{
        $this->password = $password;
        return $this;
    }//setPassword

    public function getDni(): string{
        return $this->dni;
    }//getDni

    public function setDni(string $dni):Usuario{
        $this->dni = $dni;
        return $this;
    }//setDni

    public function getFechaNac():\DateTime{
        return $this->fechaNac;
    }//getFechaNac

    public function setFechaNac(\DateTime $fechaNac):Usuario{
        $this->fechaNac = $fechaNac;
        return $this;
    }//setFechaNac

    public function getEmail():string{
        return $this->email;
    }//getEmail

    public function setEmail(string $email):Usuario{
        $this->email = $email;
        return $this;
    }//setEmail

    public function getName():string{
        return $this->name;
    }//getName

    public function setName(string $name):Usuario{
        $this->name = $name;
        return $this;
    }//setName

    public function getSurname():string{
        return $this->surname;
    }//getSurname

    public function setSurname(string $surname):Usuario{
        $this->surname = $surname;
        return $this;
    }//setSurname

    public function getDireccion():string{
        return $this->direccion;
    }//getDireccion

    public function setDireccion(string $direccion):Usuario{
        $this->direccion = $direccion;
        return $this;
    }//setDireccion

    public function getTelefono():array{
        return $this->telefono;
    }//getTelefono

    public function setTelefono(array $telefono):Usuario{
        $this->telefono = $telefono;
        return $this;
    }//setTelefono

    public function getReservas():array{
        return $this->reservas;
    }//getReservas

    public function setReservas(array $reservas):Usuario{
        $this->reservas = $reservas;
        return $this;
    }//setReservas

    public function getTarjertaPago(): string
    {
        return $this->tarjertaPago;
    }//getTarjertaPago

    public function setTarjertaPago(string $tarjertaPago): Usuario
    {
        $this->tarjertaPago = $tarjertaPago;
        return $this;
    }

    public function getCalificacion(): float{
        return $this->calificacion;
    }//getCalificacion

    public function setCalificacion(float $calificacion): Usuario{
        $this->calificacion = $calificacion;
        return $this;
    }//setCalificacion

    public function getTipoUser(): TipoUsuario{
        return $this->tipoUser;
    }//getTipoUser

    public function setTipoUser(TipoUsuario $tipoUser): Usuario{
        $this->tipoUser = $tipoUser;
        return $this;
    }//setTipoUser

    public function getDatosAdicionales(): array{
        return $this->datosAdicionales;
    }//getDatosAdicionales

    public function setDatosAdicionales(array $datosAdicionales): Usuario{
        $this->datosAdicionales = $datosAdicionales;
        return $this;
    }//setDatosAdicionales

    //Espacio para funciones definidas por el progamador
    public function calcularCalificacion():float{
        //TODO Pensar como califcicar a una persona dentro de la app.
        return 0.0;
    }
}//class