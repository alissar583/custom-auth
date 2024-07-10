<?php
namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    protected $message = 'The user associated with the token was not found.';
}