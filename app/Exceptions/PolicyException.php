<?php

namespace App\Exceptions;

use App\Exceptions\BaseException;

/**
 * Exception para nossas políticas internas
 * de validação de dados
 */
class PolicyException extends BaseException
{
    public function __construct(string $message, $code)
    {
        parent::__construct($message, $code);

        $this->setError($message, $code);
    }
}
