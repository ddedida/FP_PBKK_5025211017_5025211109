<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            
            'clubName' => $this->faker->word(),
            'city' => $this->faker->city(),
            'played' => $this->faker->randomDigitNotZero(),
            'won' => $this->faker->randomDigit(),
            'lose' => $this->faker->randomDigit(),
            'draw' => $this->faker->randomDigit(),
            'ga' => $this->faker->numberBetween(0,25),
            'gf' => $this->faker->numberBetween(0, 25),
            'gd' => $this->faker->numberBetween(0, 25),
            'point' => $this->faker->numberBetween(0,40),
            'position' => $this->faker->unique()->numberBetween(0,25),
            'since' => $this->faker->date()
        ];
    }
}
