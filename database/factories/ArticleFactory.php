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
            'text_article' => $this->faker->paragraphs(3, true),
            'writer' => $this->faker->name(),
        ];
    }
}
