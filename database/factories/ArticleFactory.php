<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'image' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'writer' => $this->faker->name(),
            'text_content' => $this->faker->paragraphs(10, true),
        ];
    }
}
