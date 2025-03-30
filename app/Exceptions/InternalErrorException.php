<?php

namespace App\Exceptions;

use App\Exceptions\BaseException;

/**
 * Exception para nossos erros internos
 */
class InternalErrorException extends BaseException
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);

        $this->setError($message, $code);
    }
}
