<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-5 years', '-5 months');
        return [
            'start_date' => $startDate,
            'salary' => $this->faker->randomNumber(9),
            'end_date' => $this->faker->dateTimeBetween($startDate, $startDate->format('Y-m-d H:i:s').' +1 year')
        ];
    }
}
