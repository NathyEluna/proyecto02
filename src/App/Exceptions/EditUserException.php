<?php

namespace App\Exceptions;

class EditUserException extends \Exception
{
    public function __construct(string $message = "Error al editar el usuario", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}