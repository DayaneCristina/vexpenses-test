<?php

namespace App\UseCases\User;

use Throwable;
use App\UseCases\BaseUseCase;
use App\Repositories\Token\Create as create_token;

class Login extends BaseUseCase
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * Token de acesso
     *
     * @var string
     */
    protected string $token;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Criação de token de acesso
     *
     * @return void
     */
    protected function createToken(): void
    {
        $this->token = (new create_token($this->id))->handle();
    }

    /**
     * Cria um usuário MANAGER e a empresa
     */
    public function handle()
    {
        try {
            $this->createToken();
        } catch (Throwable $th) {
            $this->defaultErrorHandling(
                $th,
                [
                    'id' => $this->id,
                ]
            );
        }

        return [
            'token' => $this->token,
        ];
    }
}
