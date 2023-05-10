<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa' => $this->faker->realText(50),
            'cargo' => $this->faker->realText(100),
            'description' => $this->faker->realText(500),
            'date' => $this->faker->dateTimeBetween('-4 months', '-1 week')
        ];
    }
}