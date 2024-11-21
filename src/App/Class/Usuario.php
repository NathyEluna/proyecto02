<?php
namespace App\Class;
include_once "Enum/TipoUsuario.php";
use App\Class\Enum\TipoUsuario;
use App\Model\UsuarioModel;
use DateTime;
use Ramsey\Uuid\Uuid;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;
use JsonSerializable;

class Usuario implements JsonSerializable
{
    private string $uuid;
    private string $username;
    private string $password;
    private string $dni;
    private string $email;
    private DateTime $fechaNac;
    private string $name;
    private string $surname;
    private string $direccion;
    public ?array $telefono;
    public ?array $reservas;
    private ?string $tarjertaPago;
    private float $calificacion;
    public ?array $datosAdicionales;
    private TipoUsuario $tipoUser;
    //Métodos de la clase Usuario

    public function __construct(){
        //$this->reservas = [];
        $this->reservas = array();
        $this->telefono = array();
        $this->datosAdicionales = null;
        $this->tarjertaPago = null;
        $this->calificacion = 3;
        $this->tipoUser = TipoUsuario::USER;
    }//construct

    public function getUuid(): string{
        return $this->uuid;
    }//getUuid

    public function setUuid(string $uuid):Usuario{
        $this->uuid = $uuid;
        return $this;
    }//setUuid

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
        $this->password = password_hash($password, PASSWORD_DEFAULT);
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

    public function getTelefono():?array{
        return $this->telefono;
    }//getTelefono

    public function setTelefono(array $telefono):Usuario{
        $this->telefono = $telefono;
        return $this;
    }//setTelefono

    public function getReservas():?array{
        return $this->reservas;
    }//getReservas

    public function setReservas(array $reservas):Usuario{
        $this->reservas = $reservas;
        return $this;
    }//setReservas

    public function getTarjertaPago():?string{
        return $this->tarjertaPago;
    }//getTarjertaPago

    public function setTarjertaPago(string $tarjertaPago):Usuario{
        $this->tarjertaPago = $tarjertaPago;
        return $this;
    }

    public function getCalificacion():float{
        return $this->calificacion;
    }//getCalificacion

    public function setCalificacion(float $calificacion):Usuario{
        $this->calificacion = $calificacion;
        return $this;
    }//setCalificacion

    public function getTipoUser(): TipoUsuario{
        return $this->tipoUser;
    }//getTipoUser

    public function setTipoUser(TipoUsuario $tipoUser):Usuario{
        $this->tipoUser = $tipoUser;
        return $this;
    }//setTipoUser

    public function getDatosAdicionales():?array{
        return $this->datosAdicionales;
    }//getDatosAdicionales

    public function setDatosAdicionales(string|array $datosAdicionales):Usuario{
        if(is_string($datosAdicionales)){
            //Nos ha llegado una cadena JSON
            $this->datosAdicionales=json_decode($datosAdicionales, true);
        }else{
            //Nos ha llegado un array con los datos adicionales de un usuario.
            $this->datosAdicionales = $datosAdicionales;
        }
        return $this;
    }//setDatosAdicionales

    //Espacio para funciones definidas por el progamador
    public function jsonSerialize(): array{
        return [
            'useruuid'=>$this->uuid,
            'usernick'=>$this->username,
            'username'=>$this->name,
            'usersurname'=>$this->surname,
            'useremail'=>$this->email,
            'useradress'=>$this->direccion,
            'userdni'=>$this->dni,
            'usercard'=>$this->tarjertaPago,
            'userdata'=>json_encode($this->datosAdicionales),
            'usermark'=>$this->calificacion,
            'userphones'=>$this->telefono
        ];
    }

    public function calcularCalificacion():float{
        //TODO Pensar como califcicar a una persona dentro de la app.
        return 0.0;
    }

    public static function filtrarDatosUsuario(array $datosUsuario):false|array{

        try{
            Validator::key("usernick", Validator::stringType()->notEmpty()->length(3, null))
                ->key("userdni", Validator::stringType())
                ->key("username", Validator::stringType())
                ->key("usersurname", Validator::stringType())
                ->key("userpass", Validator::stringType()->length(8, null))
                ->key("useremail", Validator::email())
                ->key("userbirthdate", Validator::date("d/m/Y")->minAge(18, "d/m/Y"))//en minuscula es dos digitos y en mayuscula es 4 digitos.
                ->key("useraddress", Validator::stringType())
                ->key("userphone", Validator::phone())
                ->key("useraltphone", Validator::optional(Validator::phone()), mandatory: false)
                ->key("userdata", Validator::optional(Validator::json()), mandatory: false)
                ->assert($datosUsuario);
        }catch(NestedValidationException $exception){
            return $exception->getMessages();
        }//catch

        return false;
    }

    public static function crearUsuarioAPartirDeUnArray(array $datosUsuarios):Usuario{
        $usuario = new Usuario();
        $usuario->setUuid($datosUsuarios["useruuid"]??Uuid::uuid4());
        $usuario->setUsername($datosUsuarios["usernick"]??"Sin nick");
        $usuario->setDni($datosUsuarios["userdni"]??"00000000A");
        $usuario->setName($datosUsuarios["username"]??"Sin nombre");
        $usuario->setSurname($datosUsuarios["usersurname"]??"Sin apellido");
        //Además de almacenar el password lo encriptamos
        $usuario->setPassword(password_hash($datosUsuarios["userpass"], PASSWORD_DEFAULT)??"Sin contraseña");
        $usuario->setEmail($datosUsuarios["useremail"]??"Sin email");
        $usuario->setFechaNac(DateTime::createFromFormat("d/m/Y", $datosUsuarios["userbirthdate"])??"Sin fecha de nacimiento");
        $usuario->setDireccion($datosUsuarios["useraddress"]??"Sin dirección");
        $usuario->setDatosAdicionales($datosUsuarios["userdata"]??"Sin datos");
        $usuario->setCalificacion($datosUsuarios["usermark"]??0.0);
        $usuario->tarjertaPago($datosUsuarios["usercard"]??"Sin tarjeta");

        $telefonos = [];

        if(isset($datosUsuarios["userphone"])){
            $telefono = Telefono::crearTelefonoDesdeString(($datosUsuarios["userphone"]));
            $telefonos[] = $telefono;
        }

        if(isset($datosUsuarios["useraltphone"])){
            $telefono = Telefono::crearTelefonoDesdeString(($datosUsuarios["useraltphone"]));
            $telefonos[] = $telefono;
        }
        $usuario->setTelefono($telefonos);

        return $usuario;
    }

    public function save(){
        UsuarioModel::guardarUsuario($this);
    }

    public function edit(){
        UsuarioModel::editarUsuario($this);
    }

    public function delete(){
        UsuarioModel::borrarUsuario($this);
    }
}//class