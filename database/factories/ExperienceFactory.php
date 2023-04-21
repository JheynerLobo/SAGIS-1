<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->realText(50),
            'description' => $this->faker->realText(500),
            'date' => $this->faker->dateTimeBetween('-4 months', '-1 week')
        ];
    }
}