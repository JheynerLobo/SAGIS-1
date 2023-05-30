<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GraduateImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asset_url' => $this->faker->imageUrl
        ];
    }
}