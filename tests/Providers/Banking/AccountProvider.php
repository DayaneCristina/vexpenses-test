<?php

namespace Tests\Providers\Banking;

use Tests\Providers\BaseProvider;

class AccountProvider extends BaseProvider
{
    /**
     * Retorna balance
     *
     * @param  array $attributes
     * @return array
     */
    public function balance(array $attributes = []): array
    {
        $response = [
            'id'          => fake()->uuid,
            'balance'     => fake()->randomNumber(3, true),
            'currency'    => 986,
            'status'      => 'active',
        ];

        return array_merge($response, $attributes);
    }

    /**
     * Retorna a conta
     *
     * @param  array $attributes
     * @return array
     */
    public function create(array $attributes = []): array
    {
        $response = [
            'id'          => fake()->uuid,
            'balance'     => fake()->randomNumber(3, true),
            'currency'    => 986,
            'status'      => 'block',
        ];

        return array_merge($response, $attributes);
    }

    /**
     * Retorno da ativação
     *
     * @param  array $attributes
     * @return array
     */
    public function active(array $attributes = []): array
    {
        $response = [
            'id'          => fake()->uuid,
            'balance'     => fake()->randomNumber(3, true),
            'currency'    => 986,
            'status'      => 'active',
        ];

        return array_merge($response, $attributes);
    }

    /**
     * Retorno da desativação
     *
     * @param  array $attributes
     * @return array
     */
    public function block(array $attributes = []): array
    {
        $response = [
            'id'          => fake()->uuid,
            'balance'     => fake()->randomNumber(3, true),
            'currency'    => 986,
            'status'      => 'block',
        ];

        return array_merge($response, $attributes);
    }

    /**
     * Retorno da desativação
     *
     * @param  array $attributes
     * @return array
     */
    public function pix(array $attributes = []): array
    {
        $response = [
            'emv'                        => '2w33213213312br.gov.bcb.pix0121banking3@email.com21312323Sao PauloADDASASFJGOJDJ',
            'id'                         => fake()->uuid,
            'transaction_identification' => fake()->uuid,
        ];

        return array_merge($response, $attributes);
    }
}
