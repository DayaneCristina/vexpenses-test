<?php

namespace App\Policies\App;

use App\Policies\BasePolicy;

class HealthCheck extends BasePolicy
{
    /**
     * Política de acesso ao healthcheck
     *
     * @return void
     */
    public function healthCheck(): void
    {
        //
    }
}
