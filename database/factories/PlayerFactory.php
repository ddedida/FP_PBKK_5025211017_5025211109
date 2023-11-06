<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
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
            'playername' => $this->faker->name(),
            'position' => $this->faker->randomElement(['back', 'striker', 'midfield']),
            'nasionality' => $this->faker->state(),
            'datebirth' => $this->faker->date(),
            'age' => $this->faker->numberBetween(20,39),
            'height'  => $this->faker->numberBetween(160,200),
            'backnumber' => $this->faker->numberBetween(0,100),
            'appearance' => $this->faker->randomNumber(),
            'goal' => $this->faker->randomNumber(),
            'asist' => $this->faker->randomNumber(),
            'cleansheet' => $this->faker->randomNumber()
        ];
    }
}
