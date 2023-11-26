<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coach_name' => fake()->name($gender = 'male'),
            'date_of_birth' => fake()->date(),
            'team_id' => rand(1, 20),
            'country_id' => rand(1, 246)
        ];
    }
}
