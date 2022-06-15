<?php

namespace Database\Factories;

use App\Repositories\AcademicLevelRepository;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => 'Programa ' . $this->faker->word
        ];
    }
}
