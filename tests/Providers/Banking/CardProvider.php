<?php

namespace Tests\Providers\Banking;

use Tests\Providers\BaseProvider;

class CardProvider extends BaseProvider
{
    /**
     * Mock de detalhes de cartão
     *
     * @return object
     */
    public function cardDetails(array $attributes = []): array
    {
        $lastNumbers = fake()->regexify('\d{4}');

        $response = [
            'added_time'             => fake()->unixTime(),
            'contactless_permitted'  => fake()->randomElement([true, false]),
            'expiry_mm_yyyy'         => fake()->dateTimeInInterval('+5 years', '+2 years')->format('m/Y'),
            'id'                     => fake()->regexify('[0-9A-F]{32}'),
            'pan_masked'             => fake()->regexify('\d{6}') . '******' . $lastNumbers,
            'sid'                    => fake()->regexify('[0-9A-F]{64}'),
            'tokenisation_permitted' => fake()->randomElement([true, false]),
            'has_pin'                => fake()->randomElement([true, false]),
        ];

        return array_merge($response, $attributes);
    }
}
