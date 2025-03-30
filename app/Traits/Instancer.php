<?php

namespace App\Traits;

trait Instancer
{
    /**
     * Método para criar uma nova instância de uma classe
     *
     * @param string $className
     * @param mixed ...$parameters
     *
     * @return mixed
     */
    public function instance(string $className, ...$parameters): mixed
    {
        return new $className(...$parameters);
    }
}
