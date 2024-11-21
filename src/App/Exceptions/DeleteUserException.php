<?php


namespace App\Exceptions;

class DeleteUserException extends \Exception
{
    public function __construct(string $message = "Error al borrar usuario", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}