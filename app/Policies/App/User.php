<?php

namespace App\Policies\App;

use App\Policies\BasePolicy;

class User extends BasePolicy
{
    /**
     * Política de acesso necessária para registrar
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Política de acesso necessária para logar
     *
     * @return void
     */
    public function login(): void
    {
        //
    }

    /**
     * Política de acesso para listagem de usuários
     * (Apenas gestor pode acessar)
     *
     * @return void
     */
    public function index(): void
    {
        $this->isManagerAccountsUser();
    }

    /**
     * Política de acesso para dados de usuário
     * (Apenas gestor da mesma empresa pode acessar ou próprio usuário logado)
     *
     * @return void
     */
    public function show(string $id): void
    {
        $this->isManagerOrOwnerResource($id);
    }

    /**
     * Política de criação de usuário
     * (Apenas gestor pode acessar)
     *
     * @return void
     */
    public function create(): void
    {
        $this->isManagerAccountsUser();
    }

    /**
     * Política de acesso para modificação de usuário
     * (Apenas gestor da mesma empresa pode acessar ou próprio usuário logado)
     *
     * @return void
     */
    public function update(string $id): void
    {
        $this->isManagerOrOwnerResource($id);
    }
}
