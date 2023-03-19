<?php

namespace App\Models\Exceptions;

use Exception;

/**
 * Class CouponException
 */
class CouponException extends Exception
{

    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}