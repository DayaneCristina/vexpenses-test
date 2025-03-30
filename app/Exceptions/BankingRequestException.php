<?php

namespace App\Exceptions;

use Exception;

/**
 * Exception para erros em requisições à BaaS
 */
class BankingRequestException extends Exception
{
    /**
     * Resposta da requisição de erro da BaaS
     */
    public array $response;

    /**
     * Status code da requisição
     */
    public int $statusCode;

    public function __construct(string $message, array $response, int $statusCode)
    {
        parent::__construct($message);

        $this->response   = $response;
        $this->statusCode = $statusCode;
    }
}
