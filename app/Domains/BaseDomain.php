<?php

namespace App\Domains;

use App\Traits\Instancer;

abstract class BaseDomain
{
    use Instancer;

    /**
     * Obter uma propriedade da classe
     *
     * @param string $prop
     *
     * @return mixed
     */
    public function __get(string $prop): mixed
    {
        return $this->{$prop};
    }
}
