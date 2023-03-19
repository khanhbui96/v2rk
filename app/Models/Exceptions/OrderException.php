<?php

namespace App\Models\Exceptions;

use Exception;

/**
 * Class OrderException
 */
class OrderException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
