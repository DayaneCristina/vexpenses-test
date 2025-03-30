<?php

namespace App\Policies\App;

use App\Policies\BasePolicy;

class Card extends BasePolicy
{
    /**
     * Política de acesso necessária para registrar um cartão
     * (Apenas gestor da mesma empresa pode acessar ou próprio usuário logado)
     *
     * @return void
     */
    public function show(string $userId): void
    {
        $this->isManagerOrOwnerResource($userId);
    }

    /**
     * Política de acesso necessária para registrar um cartão
     * (Apenas gestor da mesma empresa pode acessar ou próprio usuário logado)
     *
     * @return void
     */
    public function register(string $userId): void
    {
        $this->isManagerOrOwnerResource($userId);
    }
}
