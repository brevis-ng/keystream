<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'url' => $this->faker->unique()->url(),
            'poster' => $this->faker->unique()->imageUrl(640, 480, 'animals'),
        ];
    }
}
