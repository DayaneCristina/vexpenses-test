<?php

namespace App\UseCases\Params\User;

use App\UseCases\Params\BaseParams;

class CreateFirstUserParams extends BaseParams
{
    /**
     * Nome da empresa
     *
     * @var string
     */
    protected string $companyName;

    /**
     * CNPJ da empresa
     *
     * @var string
     */
    protected string $companyDocumentNumber;

    /**
     * Nome do usuário
     *
     * @var string
     */
    protected string $userName;

    /**
     * CPF do usuário
     *
     * @var string
     */
    protected string $userDocumentNumber;

    /**
     * Email
     *
     * @var string
     */
    protected string $email;

    /**
     * Senha
     *
     * @var string
     */
    protected string $password;

    public function __construct(
        string $companyName,
        string $companyDocumentNumber,
        string $userName,
        string $userDocumentNumber,
        string $email,
        string $password
    ) {
        $this->companyName           = $companyName;
        $this->companyDocumentNumber = $companyDocumentNumber;
        $this->userName              = $userName;
        $this->userDocumentNumber    = $userDocumentNumber;
        $this->email                 = $email;
        $this->password              = $password;
    }
}
