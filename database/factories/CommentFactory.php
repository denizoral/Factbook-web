<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_content' => $this->faker->sentence,
            'comment_author' => $this->faker->numberBetween($min=1, $max=30),
            //'post_author' => $this->faker->numberBetween($min=1, $max=30),
        ];
    }
}
