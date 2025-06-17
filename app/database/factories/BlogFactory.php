<?php

namespace Database\Factories;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->realText(10),
            'content' => $this->faker->realText(10),
        ];
    }
}
