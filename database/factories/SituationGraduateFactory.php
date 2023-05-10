<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SituationsGraduatesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'anio_graduation' => $this->faker->anio_graduation,
            'graduados' => $this->faker->graduados,
            'anio_actual' => $this->faker->anio_actual,
            'independientes' => $this->faker->independientes,
            'dependientes' => $this->faker->dependientes,
            'desempleados' => $this->faker->desempleados,
            'trabajando' =>this->faker->trabajando
        ];
    }
}