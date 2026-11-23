<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
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
        'date'              => fake()->date('Y-m-d'),
        'title'             => fake()->sentence(4),
        'short_description' => fake()->sentence(10),
        'description'       => fake()->paragraph(8),
        'preview_image'     => fake()->randomElement(['preview.jpg', 'preview_2.jpg']),
        'full_image'        => fake()->randomElement(['full.jpeg', 'full_2.jpeg']),
        ];
    }
}
