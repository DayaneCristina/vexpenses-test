<?php

namespace App\UseCases\User;

use Throwable;
use App\UseCases\BaseUseCase;
use App\UseCases\Params\User\CreateParams;
use App\Domains\User\Create as CreateDomain;
use App\Repositories\User\Create as CreateRepository;

class Create extends BaseUseCase
{
    /**
     * @var CreateParams
     */
    protected CreateParams $params;

    /**
     * Usuário
     *
     * @var array
     */
    protected array $user;

    public function __construct(
        CreateParams $params
    ) {
        $this->params = $params;
    }

    /**
     * Valida o usuário
     *
     * @return CreateDomain
     */
    protected function validateUser(): CreateDomain
    {
        return (new CreateDomain(
            $this->params->companyId,
            $this->params->name,
            $this->params->documentNumber,
            $this->params->email,
            $this->params->password,
            $this->params->type
        ))->handle();
    }

    /**
     * Cria o usuário
     *
     * @param CreateDomain $domain
     *
     * @return void
     */
    protected function createUser(CreateDomain $domain): void
    {
        $this->user = (new CreateRepository($domain))->handle();
    }

    /**
     * Cria um usuário
     */
    public function handle()
    {
        try {
            $userDomain = $this->validateUser();
            $this->createUser($userDomain);
        } catch (Throwable $th) {
            $this->defaultErrorHandling(
                $th,
                [
                    'params' => $this->params->toArray(),
                ]
            );
        }

        return $this->user;
    }
}
