<?php

namespace Database\Factories;

use App\Models\VacancyApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VacancyApplication>
 */
class VacancyApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'expected_salary' => fake()->numberBetween(4_500, 175_000),
        ];
    }
}
