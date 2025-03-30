<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Faker\Provider\pt_BR\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'              => fake()->name(),
            'type'              => fake()->randomElement(['USER', 'VIRTUAL', 'MANAGER']),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'document_number'   => app(Person::class)->cpf(false),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
            'company_id'        => Company::factory(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Gestor
     *
     * @return static
     */
    public function manager()
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'MANAGER',
        ]);
    }

    /**
     * User
     *
     * @return static
     */
    public function user()
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'USER',
        ]);
    }
}
