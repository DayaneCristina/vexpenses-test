<?php

namespace App\Policies\App;

use App\Policies\BasePolicy;

class Company extends BasePolicy
{
    /**
     * Política de acesso para visualização de empresa
     *
     * @return void
     */
    public function show(): void
    {
        //
    }

    /**
     * Política de acesso para modificação de empresa
     * (Apenas gestor pode acessar)
     *
     * @return void
     */
    public function update(): void
    {
        $this->isManagerAccountsUser();
    }
}
