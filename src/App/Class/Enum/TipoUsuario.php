<?php

namespace App\Class\Enum;

enum TipoUsuario
{
    case ADMIN;
    case USER;
    case SUPERUSER;
    case GUEST;
    case GOD;

    public static function convertirStringATipoUsuario(?string $tipo):?TipoUsuario{
        if($tipo == null){
            return null;
        }else{
            return match($tipo){
                "admin"=>TipoUsuario::ADMIN,
                "user"=>TipoUsuario::USER,
                "superuser"=>TipoUsuario::SUPERUSER,
                "guest"=>TipoUsuario::GUEST,
                "god"=>TipoUsuario::GOD,
                "default"=>null
            };//return
        }//else
    }//convertir string a tipo usuario
}//class
