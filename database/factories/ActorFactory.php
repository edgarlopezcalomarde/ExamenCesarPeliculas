<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ActorFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->randomNumber()
        ];
    }
}
