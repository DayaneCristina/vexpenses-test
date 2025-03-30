<?php

namespace App\UseCases\User;

use Throwable;
use App\UseCases\BaseUseCase;
use App\UseCases\Params\User\UpdateParams;
use App\Domains\User\Update as UpdateDomain;
use App\Repositories\User\Update as UpdateRepository;

class Update extends BaseUseCase
{
    /**
     * @var UpdateParams
     */
    protected UpdateParams $params;

    /**
     * Usuário
     *
     * @var array
     */
    protected array $user;

    public function __construct(
        UpdateParams $params
    ) {
        $this->params = $params;
    }

    /**
     * Valida o usuário
     *
     * @return UpdateDomain
     */
    protected function validateUser(): UpdateDomain
    {
        return (new UpdateDomain(
            $this->params->id,
            $this->params->companyId,
            $this->params->name,
            $this->params->email,
            $this->params->password,
            $this->params->type
        ))->handle();
    }

    /**
     * Modifica o usuário
     *
     * @param UpdateDomain $domain
     *
     * @return void
     */
    protected function updateUser(UpdateDomain $domain): void
    {
        $this->user = (new UpdateRepository($domain))->handle();
    }

    /**
     * Modifica um usuário
     */
    public function handle()
    {
        try {
            $userDomain = $this->validateUser();
            $this->updateUser($userDomain);
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
