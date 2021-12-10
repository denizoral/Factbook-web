<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_content' => $this->faker->sentence,
            'post_author' => $this->faker->numberBetween($min=1, $max=30),
        ];
    }
}
