<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'external_id' => fake()->uuid,
            'account_id'  => Account::factory(),
            'status'      => fake()->randomElement(['BLOCK', 'ACTIVE']),
        ];
    }

    /**
     * Bloqueado
     *
     * @return static
     */
    public function block()
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'BLOCK',
        ]);
    }

    /**
     * Ativo
     *
     * @return static
     */
    public function active()
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'ACTIVE',
        ]);
    }
}
