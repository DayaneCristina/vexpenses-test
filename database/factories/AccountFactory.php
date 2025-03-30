<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'external_id' => null,
            'user_id'     => User::factory(),
            'status'      => fake()->randomElement(['BLOCK', 'ACTIVE']),
        ];
    }

    /**
     * Com id externo
     *
     * @return static
     */
    public function registered()
    {
        return $this->state(fn (array $attributes) => [
            'external_id' => fake()->uuid,
        ]);
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
