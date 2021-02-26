<?php

namespace App\Exceptions;

use Throwable;

class PskAuthErrorException extends ApiException
{
    public function __construct($message = 'Invalid token', $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
