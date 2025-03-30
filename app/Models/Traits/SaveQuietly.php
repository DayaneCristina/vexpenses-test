<?php

namespace App\Models\Traits;

trait SaveQuietly
{
    /**
     * Permitir que uma model seja salva sem disparar os gatilhos do observer
     */
    public function saveQuietly(array $options = [])
    {
        return static::withoutEvents(fn () => $this->save($options));
    }
}
