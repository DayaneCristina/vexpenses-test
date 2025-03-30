<?php

namespace App\Integrations\Banking\Account;

use App\Integrations\Banking\Gateway;

class Create extends Gateway
{
    /**
     * Nome
     *
     * @var string
     */
    protected string $name;

    /**
     * CPF
     *
     * @var string
     */
    protected string $documentNumber;

    /**
     * Email
     *
     * @var string
     */
    protected string $email;

    public function __construct(string $name, string $documentNumber, string $email)
    {
        $this->name           = $name;
        $this->documentNumber = $documentNumber;
        $this->email          = $email;
    }

    /**
     * Constroi a url da request
     *
     * @return string
     */
    protected function requestUrl(): string
    {
        return 'accounts';
    }

    /**
     * Cria de uma conta
     *
     * @return array
     */
    public function handle(): array
    {
        $url = $this->requestUrl();

        $request = $this->sendRequest(
            method: 'post',
            url:    $url,
            action: 'CREATE_ACCOUNT',
            params: [
                'name'            => $this->name,
                'document_number' => $this->documentNumber,
                'email'           => $this->email,
            ]
        );

        return $this->formatDetailsResponse($request);
    }
}
