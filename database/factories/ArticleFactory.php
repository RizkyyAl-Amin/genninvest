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
            'paragraf_1' => $this->faker->paragraphs(2, true),
            'paragraf_2' => $this->faker->paragraphs(3, true),
            'paragraf_3' => $this->faker->paragraphs(4, true),
            'paragraf_4' => $this->faker->paragraphs(3, true),
        ];
    }
}
