<?php

namespace App\Exceptions;

use Exception;

class InvalidTokenException extends Exception
{
    protected $message = 'The provided token is invalid.';
}
