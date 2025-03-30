<?php

namespace Database\Factories;

use Faker\Provider\pt_BR\Company as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'            => fake()->company(),
            'document_number' => app(Faker::class)->cnpj(false),
        ];
    }
}
